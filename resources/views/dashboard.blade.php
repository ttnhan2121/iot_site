@extends('home')
@section('content')

        <div class="row" style="height: 50px">
            <div class="col d-flex justify-content-end align-item-center">
                <span class="material-symbols-outlined fs-1 p-2" >
                account_circle
                </span>
                <label class="toggle-switch">
                    <input type="checkbox" id="check123">
                    <div class="toggle-switch-background">
                        <div class="toggle-switch-handle"></div>
                    </div>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col">content</div>
        </div>
@endsection
@section('script')
    <script>
        $("#check123").change(function(){
            console.log($("#check123").is(":checked"));
        });
    </script>
@endsection
