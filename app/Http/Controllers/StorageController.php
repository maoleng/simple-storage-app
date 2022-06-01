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
        $data = $request->all();

        if (empty($data['content'])) {
            return redirect()->back();
        }

        $content = $data['content'];
        $name = $data['name'];
        $type = empty($data['type']) ? "other" : "mlem";
        $image = getimagesize($content);

        //
        if ($image === false) {
            Storage::query()->create([
                'content' => $content,
                'type' => $type,
                'name' => $name
            ]);
            return redirect()->route('index');
        }

        $image_name = "";
        if ($image['mime'] === "image/png") {
            $image_name = "src/$type/" . uniqid('image_', true) . '.png';
        }
        if ($image['mime'] === "image/jpeg") {
            $image_name = "src/$type/" . uniqid('image_', true) . '.jpg';
        }
        if ($image['mime'] === "image/webp") {
            $image_name = "src/$type/" . uniqid('image_', true) . '.webp';
        }
        Storage::query()->create([
            'content' => $image_name,
            'type' => $type,
            'name' => $name
        ]);
        StorageFile::put($image_name, file_get_contents($content));


        return redirect()->route('index');


    }


}
