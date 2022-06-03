<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreStorageRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage as StorageFile;
use App\Models\Storage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
        $is_mobile = is_numeric(strpos($ua, "mobile"));

        return view('index', [
            'is_mobile' => $is_mobile,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreStorageRequest  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Lấy data
        $data = $request->all();
        $content = $data['content'];
        $name = $data['name'];
        $file_image = $data['file_image'] ?? null;
        $type = empty($data['type']) ? "other" : "mlem";
        $image = "";

        // Validate input
        if (empty($content) && empty($file_image)) {
            return redirect()->back();
        }
        if (isset($content)) {
            $image = getimagesize($content);
        }

        // Nếu upload ảnh bằng form
        if (isset($data['file_image'])) {
            $image_name = StorageFile::disk('public')->putFile("src/$type", $file_image);
            Storage::query()->create([
                'content' => "public/" . $image_name,
                'type' => $type,
                'name' => $name
            ]);
            return redirect()->route('index');
        }

        // Nếu không upload ảnh
        if ($image === false) {
            Storage::query()->create([
                'content' => $content,
                'type' => $type,
                'name' => $name
            ]);
            return redirect()->route('index');
        }

        // Nếu upload ảnh bằng input text
        $image_name = "";
        if ($image['mime'] === "image/png") {
            $image_name = "public/src/$type/" . uniqid('', true) . '.png';
        }
        if ($image['mime'] === "image/jpeg") {
            $image_name = "public/src/$type/" . uniqid('', true) . '.jpg';
        }
        if ($image['mime'] === "image/webp") {
            $image_name = "public/src/$type/" . uniqid('', true) . '.webp';
        }
        StorageFile::put($image_name, file_get_contents($content));
        Storage::query()->create([
            'content' => $image_name,
            'type' => $type,
            'name' => $name
        ]);
        return redirect()->route('index');

    }

    public function login()
    {
        return view('login');
    }

    public function show()
    {

    }
}
