@if(Session::get('islogin'))
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2"></script>
    <script src="https://cdn.jsdelivr.net/npm/luxon@1.27.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.0.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-streaming@2.0.0"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
    <link id="linkGGicon" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>

    </style>
</head>
<body>
<div class="bg-light">
    <div class="row g-2">
        <div class="col-xl-2 d-xl-block d-sm-none d-md-none d-lg-none d-none bg-white shadow vh-100 rounded-end-4 p-3" style="border-radius: 0 20px 20px 0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <h1>Smart Home</h1>
                    </div>
                    <a href="{{action('App\Http\Controllers\DashboardController@getView')}}" class="text-decoration-none text-black">
                        <div class="row my-2 border border-dark p-2 m-1 rounded-4">
                            <div class="d-flex">
                                <span class="material-symbols-outlined">
                                dashboard
                                </span>
                                <span class="ps-3">Dashboard</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{action('App\Http\Controllers\ChartController@getView')}}" class="text-decoration-none text-black">
                        <div class="row my-2 border border-dark p-2 m-1 rounded-4">
                            <div class="d-flex">
                                <span class="material-symbols-outlined">
                                monitoring
                                </span>
                                <span class="ps-3">Chart</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-10">
            <div class="p-3">
                <div class="row">
                    <div class="col d-flex justify-content-between justify-content-xl-end  align-item-center">
                        <button class="bg-transparent border-0 d-xl-none d-lg-block d-md-block d-sm-block d-block" type="button" data-bs-toggle="offcanvas" data-bs-target="#menu_canvas" aria-controls="offcanvasExample">
                                <span class="material-symbols-outlined fs-1 p-2" >
                                    menu
                                </span>
                        </button>
                        <button class="bg-transparent border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#account_canvas" aria-controls="offcanvasExample">
                                <span class="material-symbols-outlined fs-1 p-2" >
                                    account_circle
                                </span>
                        </button>
                    </div>
                </div>
                <div style="height: 800px; overflow-y: auto">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="account_canvas" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <a href="{{action('App\Http\Controllers\LoginController@getLogout')}}" class="text-decoration-none text-black">
            <div class="row my-2 border border-dark p-2 m-1 rounded-4">
                <div class="d-flex">
                        <span class="material-symbols-outlined">
                        logout
                        </span>
                    <span class="ps-3">Log Out</span>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="offcanvas offcanvas-start" tabindex="-1" id="menu_canvas" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <a href="{{action('App\Http\Controllers\DashboardController@getView')}}" class="text-decoration-none text-black">
            <div class="row my-2 border border-dark p-2 m-1 rounded-4">
                <div class="d-flex">
                                <span class="material-symbols-outlined">
                                dashboard
                                </span>
                    <span class="ps-3">Dashboard</span>
                </div>
            </div>
        </a>
        <a href="{{action('App\Http\Controllers\ChartController@getView')}}" class="text-decoration-none text-black">
            <div class="row my-2 border border-dark p-2 m-1 rounded-4">
                <div class="d-flex">
                                <span class="material-symbols-outlined">
                                monitoring
                                </span>
                    <span class="ps-3">Chart</span>
                </div>
            </div>
        </a>
    </div>
</div>
</body>
<script>
    const BOT_TOKEN = '7021119044:AAH4Fx3iOAwm0naxckNgiqG5RtVNBeE_ohI';
    const CHAT_ID = ['1392540174', '5209152359'];
    function sendTele(message) {
        CHAT_ID.forEach(chat_id => {
            fetch('https://api.telegram.org/bot' + BOT_TOKEN + '/sendMessage', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    chat_id: chat_id,
                    text: '----------------\n' + message + '\n----------------'
                })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // console.log('Message sent to Telegram:', data);
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        })
    }
    var clientId = "clientId-" + Math.random().toString(16).substr(2, 8);
    var client = new Paho.MQTT.Client("wss://broker.emqx.io:8084/mqtt", clientId);

    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;

    client.connect({onSuccess:onConnect});

    function onConnect() {
        // console.log("onConnect");
        toastr.success("Kết nối MQTT thành công!")
        client.subscribe("baocao/temp");
        client.subscribe("baocao/humi");
        client.subscribe("baocao/ultra");
        client.subscribe("device/fan");
        client.subscribe("device/lights");
        client.subscribe("device/lightsState");
        client.subscribe("gate/setPass");
        client.subscribe("gate/warning");
        client.subscribe("device/fanState");
    }

    function onConnectionLost(responseObject) {
        if (responseObject.errorCode !== 0) {
            console.log("onConnectionLost:"+responseObject.errorMessage);
            toastr.error("Kết nối MQTT thất bại!");
        }
    }

    function onMessageArrived(message) {
        // console.log("onMessageArrived:"+ message.destinationName + " " +message.payloadString);
        if(message.destinationName === "baocao/temp"){
            $('#temp_label').text(Math.round(parseFloat(message.payloadString)));
        }
        if(message.destinationName === "baocao/humi"){
            $('#humi_label').text(Math.round(parseFloat(message.payloadString)));
        }
        if(message.destinationName === "device/fanState"){
            if(message.payloadString === "true"){
                $("#btnFan").prop( "checked", true);
            }else{
                $("#btnFan").prop( "checked", false);
            }
        }
        if(message.destinationName === "baocao/ultra"){
            if(message.payloadString === "true"){
                $('#detector').text("detector_status");
                sendTele('Phát hiện có vật thể!!!');
                $('#label-dectect').text('Dectected!!!!')
                $('#label-dectect').css('color', "red")
            }else{
                $('#label-dectect').text('Dectecting....')
                $('#label-dectect').css('color', "black")
                $('#detector').text("detector");
            }
        }
        if(message.destinationName === "device/fanState"){
            if(message.payloadString === "true"){
                $('#fan').text("mode_fan");
            }else{
                $('#fan').text("mode_fan_off");
            }
        }
        if(message.destinationName === "gate/warning"){
            if(message.payloadString === "false"){
                sendTele('Có người nhập sai mật khẩu!!!')
                toastr.error("Có người nhập sai mật khẩu!!!");
            }
        }
        if(message.destinationName === "device/lightsState"){
            $data = JSON.parse(message.payloadString);
            $("#btnLight1").prop( "checked", $data.light0 === 1 ? true : false);
            $("#btnLight2").prop( "checked", $data.light1 === 1 ? true : false);
            $("#btnLight3").prop( "checked", $data.light2 === 1 ? true : false);
            $("#btnLight4").prop( "checked", $data.light3 === 1 ? true : false);
            if($data.light0 === 1){
                $('#light1').text("lightbulb")
            }else{
                $('#light1').text("light_off")
            }
            if($data.light1 === 1){
                $('#light2').text("lightbulb")
            }else{
                $('#light2').text("light_off")
            }
            if($data.light2 === 1){
                $('#light3').text("lightbulb")
            }else{
                $('#light3').text("light_off")
            }
            if($data.light3 === 1){
                $('#light4').text("lightbulb")
            }else{
                $('#light4').text("light_off")
            }
        }
    };

</script>
@yield('script')
</html>
@else
    <script>
        window.location.href = "{{ action('App\Http\Controllers\LoginController@getView')}}";
    </script>
@endif


