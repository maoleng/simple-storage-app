<link rel="stylesheet" href="{{asset('css/login.css')}}">

<header>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</header>

<div class="mhn-ui-wrap">
    <div class="mhn-ui-page page-lock">
        <div class="mhn-ui-date-time">
            <div class="mhn-ui-time"></div>
            <div class="mhn-ui-day"></div>
            <div class="mhn-ui-date"></div>
        </div>
        <div class="mhn-lock-wrap">
            <div class="mhn-lock-title" data-title="Draw a pattern to unlock"></div>

            <div class="mhn-lock"></div>
            <div class="frame">
                <button class="custom-btn btn-11">Nhập mã</button>
            </div>
        </div>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{'js/device.js'}}"></script>
<script src="{{'js/login.js'}}"></script>


<form action="{{route('process_login')}}" hidden method="post" id="form-validate">
    @csrf
</form>
