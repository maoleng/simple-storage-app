<link rel="stylesheet" href="{{asset('css/style.css')}}">
<div class="login-box">
    <h1>STORAGE</h1>
    <form action="process_save.php" method="post">


        <div class="user-box">
            <input type="text" name="content">
            <label>Link</label>
        </div>
        <div class="user-box">
            <input type="text" name="name">
            <label>Name</label>
        </div>
        <label style="display: block">
            <h2 style="color:#03e9f4;display: inline">Is mlem ?</h2>
        </label>

        <input type="checkbox" id="lol-checkbox" name="type">
        <label id="button" for="lol-checkbox" class="switch">
            <div id="knob"></div>
            <div id="subscribe">NO</div>
            <div id="alright"> YES</div>
        </label>
        <button type="submit">

            <span></span>
            <span></span>
            <span></span>
            <span></span>
            STORE
        </button>



    </form>
</div>

<script type="text/javascript">
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
        // true for mobile device
        console.log("mobile device");
    }else{
        // false for not mobile device
        console.log("not mobile device");
    }
</script>
