@if ($is_mobile)
    <link rel="stylesheet" href="{{asset('css/style-mobile.css')}}">
@else
    <link rel="stylesheet" href="{{asset('css/style-desktop1.css')}}">
@endif


<div class="login-box">
    <h1>STORAGE APP</h1>
    <form action="{{route('store')}}" method="post">
        @csrf

        <div class="user-box">
            <input type="text" name="content">
            <label>Link</label>
        </div>

        <br><br><br>

        <div class="user-box">
            <input type="text" name="name">
            <label>Name</label>
        </div>

        <br><br><br>


        <label style="display: block">
            <h2 style="color:#03e9f4;display: inline">Is mlem ?</h2>
        </label>

        <input type="checkbox" id="lol-checkbox" name="type">
        <label id="button" for="lol-checkbox" class="switch">
            <div id="knob"></div>
            <div id="subscribe">NO</div>
            <div id="alright"> YES</div>
        </label>
        <div style="
            margin: 0;
            position: absolute;
            top: 80%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        ">
            <button type="submit">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                STORE
            </button>
        </div>


    </form>
</div>
