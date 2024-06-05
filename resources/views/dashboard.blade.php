@extends('home')
@section('content')

        <div class="row g-3">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <label class="form-check-label d-flex align-item-center" for="flexSwitchCheckChecked">
                            <strong>Temperature</strong>
                        </label>
                        <div style="min-height: 40px"></div>
                    </div>
                    <div class="card-body m-1 d-flex align-items-center justify-content-between" style="min-height: 110px">
                        <div class="row d-flex justify-content-between" style="width: 100vw">
                            <div class="col-9 d-flex align-items-center">
                                <strong>Temperature</strong>
                                <span class="material-symbols-outlined d-flex align-items-center justify-content-center" style="font-size:50px; width: 50px; height: 50px"" >
                                device_thermostat
                                </span>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <p class="d-flex align-items-center justify-content-center" style="font-size:  30px; color: red; margin: 0"><strong id="temp_label">0</strong> <strong>&deg;C</strong> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <label class="form-check-label d-flex align-item-center" for="flexSwitchCheckChecked">
                            <strong>Humidity</strong>
                    </label>
                        <div style="min-height: 40px"></div>
                    </div>
                    <div class="card-body m-1 d-flex align-items-center justify-content-between" style="min-height: 110px">
                        <div class="row d-flex justify-content-between" style="width: 100vw">
                            <div class="col-9 d-flex align-items-center">
                                <strong>Humidity</strong>
                                <span class="material-symbols-outlined d-flex align-items-center justify-content-center" style="font-size:50px; width: 50px; height: 50px"" >
                                humidity_percentage
                                </span>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <p class="d-flex align-items-center justify-content-center" style="font-size:  30px; color: blue; margin: 0"><strong id="humi_label">0</strong> <strong>%</strong> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <label class="form-check-label d-flex align-item-center" for="flexSwitchCheckChecked">
                            <strong>Change password GATE</strong>
                        </label>
                        <div style="min-height: 40px"></div>
                    </div>
                    <div class="card-body m-1 d-flex flex-column">
                        <strong class="my-1">INPUT GATE PASSWORD</strong>
                        <div class="row">
                            <div class="col-8 col-xl-9">
                                <input type="password" class="form-control my-1" id="pass" placeholder="Password" maxlength="4" >
                            </div>
                            <div class="col-4 col-xl-3">
                                <button class="btn btn-primary my-1 btnPass">Change</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <label class="form-check-label d-flex align-item-center" for="flexSwitchCheckChecked">
{{--                            <span class="material-symbols-outlined" id="light1">--}}
{{--                            </span>--}}
                            LED 1</label>
                        <div class="form-check form-switch" >
                            <input class="form-check-input"  style="font-size:  30px" type="checkbox" role="switch" id="btnLight1">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <strong>LED1</strong>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <span class="material-symbols-outlined d-flex align-items-center justify-content-center" id="light1" style="font-size:50px; width: 50px; height: 50px">
                                    light_off
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <label class="form-check-label d-flex align-item-center" for="flexSwitchCheckChecked">
{{--                            <span class="material-symbols-outlined" id="light2">--}}
{{--                            </span>--}}
                            LED 2</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" style="font-size:  30px" type="checkbox" role="switch" id="btnLight2">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <strong>LED 2</strong>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <span class="material-symbols-outlined d-flex align-items-center justify-content-center" id="light2" style="font-size:50px; width: 50px; height: 50px">
                                    light_off
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <label class="form-check-label d-flex align-item-center" for="flexSwitchCheckChecked">
{{--                            <span class="material-symbols-outlined" id="light3">--}}
{{--                            </span>--}}
                            LED 3</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" style="font-size:  30px" type="checkbox" role="switch" id="btnLight3">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <strong>LED 3</strong>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <span class="material-symbols-outlined d-flex align-items-center justify-content-center" id="light3" style="font-size:50px; width: 50px; height: 50px">
                                    light_off
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <label class="form-check-label d-flex align-item-center" for="flexSwitchCheckChecked">
{{--                            <span class="material-symbols-outlined" id="light4">--}}
{{--                            </span>--}}
                            LED 4</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" style="font-size:  30px" type="checkbox" role="switch" id="btnLight4">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <strong>LED 4</strong>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <span class="material-symbols-outlined d-flex align-items-center justify-content-center" id="light4" style="font-size:50px; width: 50px; height: 50px">
                                    light_off
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <label class="form-check-label d-flex align-item-center" for="flexSwitchCheckChecked">
{{--                            <span class="material-symbols-outlined" id="fan">--}}
{{--                            </span>--}}
                            FAN
                        </label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="btnFan" style="font-size:  30px">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <strong>FAN</strong>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <span class="material-symbols-outlined d-flex align-items-center justify-content-center" id="fan" style="font-size:50px; width: 50px; height: 50px">
                                    mode_fan_off
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <label class="form-check-label d-flex align-item-center" for="flexSwitchCheckChecked">
{{--                            <span class="material-symbols-outlined" id="detector">--}}
{{--                                detector--}}
{{--                            </span>--}}
                            Detect Object</label>
                        <div style="min-height: 40px"></div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="row">
                            <div class="col-9">
                                <strong>Detection</strong>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <span class="material-symbols-outlined d-flex align-items-center justify-content-center" id="detector" style="font-size:50px; width: 50px; height: 50px">
                                    detector
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
@endsection


@section('script')
    <script>
        $("#pass").on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        $(".btnPass").click(function (){
            if($("#pass").val().length < 4){
                toastr.error("Mật khẩu phải có 4 ký tự số!!!");
            }else{
                message = new Paho.MQTT.Message($("#pass").val());
                message.destinationName = "gate/setPass";
                client.send(message);
                toastr.success("Đổi mật khẩu thành công!")
            }
        })

        $("#btnLight1").is(":checked") ? $('#light1').text("lightbulb") : $('#light1').text("light_off");
        $("#btnLight2").is(":checked") ? $('#light2').text("lightbulb") : $('#light2').text("light_off");
        $("#btnLight3").is(":checked") ? $('#light3').text("lightbulb") : $('#light3').text("light_off");
        $("#btnLight4").is(":checked") ? $('#light4').text("lightbulb") : $('#light4').text("light_off");
        $("#btnFan").is(":checked") ? $('#fan').text("mode_fan") : $('#fan').text("mode_fan_off");

        $("#btnLight1").change(function(){
            if($("#btnLight1").is(":checked")){
                $('#light1').text("lightbulb");
                message = new Paho.MQTT.Message("b0");
                message.destinationName = "device/lights";
                client.send(message);
            }else{
                $('#light1').text("light_off");
                message = new Paho.MQTT.Message("t0");
                message.destinationName = "device/lights";
                client.send(message);
            }
        });
        $("#btnLight2").change(function(){
            if($("#btnLight2").is(":checked")){
                $('#light2').text("lightbulb");
                message = new Paho.MQTT.Message("b1");
                message.destinationName = "device/lights";
                client.send(message);
            }else{
                $('#light2').text("light_off");
                message = new Paho.MQTT.Message("t1");
                message.destinationName = "device/lights";
                client.send(message);
            }
        });

        $("#btnLight3").change(function(){
            if($("#btnLight3").is(":checked")){
                $('#light3').text("lightbulb");
                message = new Paho.MQTT.Message("b2");
                message.destinationName = "device/lights";
                client.send(message);
            }else{
                $('#light3').text("light_off");
                message = new Paho.MQTT.Message("t2");
                message.destinationName = "device/lights";
                client.send(message);
            }
        });

        $("#btnLight4").change(function(){
            if($("#btnLight4").is(":checked")){
                $('#light4').text("lightbulb");
                message = new Paho.MQTT.Message("b3");
                message.destinationName = "device/lights";
                client.send(message);
            }else{
                $('#light4').text("light_off");
                message = new Paho.MQTT.Message("t3");
                message.destinationName = "device/lights";
                client.send(message);
            }
        });

        $("#btnFan").change(function(){
            if($("#btnFan").is(":checked")){
                $('#fan').text("mode_fan");
                message = new Paho.MQTT.Message("bat");
                message.destinationName = "device/fan";
                client.send(message);
            }else{
                $('#fan').text("mode_fan_off");
                message = new Paho.MQTT.Message("tat");
                message.destinationName = "device/fan";
                client.send(message);
            }
        });

    </script>
@endsection
