@extends('home')
@section('content')
        <div class="row">
            <div class="col-xl-6 col-12">
                <strong>
                    <h1>Temperature</h1>
                </strong>
                <canvas id="chartTemp" style="width:100%"></canvas>
            </div>
            <div class="col-xl-6 col-12">
                <strong><h1>Humidity</h1></strong>
                <canvas id="chartHumi" style="width:100%"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-12" style="height: 400px; overflow: auto">
                <table class="table table-success " id="table_temp">
                    <thead>
                    <tr class="table-success">
                        <th>STT</th>
                        <th>Temp Value</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="col-xl-6 col-12" style="height: 400px; overflow: auto">
                <table class="table table-info" id="table_humi" >
                    <thead>
                    <tr class="table-info">
                        <th>STT</th>
                        <th>Humi Value</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-12">
                <strong>
                    <h2>Light</h2>
                </strong>
                <table class="table table-info" id="table_light" >
                    <thead>
                        <tr class="table-info">
                            <th>STT</th>
                            <th>ID Light</th>
                            <th>Light State</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let getTemp = "{{ action('App\Http\Controllers\ChartController@getTemp') }}"
            let getHumi = "{{ action('App\Http\Controllers\ChartController@getHumi') }}"
            let getListTemp = "{{ action('App\Http\Controllers\ChartController@getAllTemp') }}"
            let getListHumi = "{{ action('App\Http\Controllers\ChartController@getAllHumi') }}"
            let getListLight = "{{ action('App\Http\Controllers\ChartController@getLightState') }}"
            let temp_value;
            let humi_value;
            fetchListTemp();
            fetchListHumi();
            fetchListLight();
            function fetchListTemp() {
                fetch(getListTemp)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        populateTempTable(data);
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
            }
            function fetchListHumi() {
                fetch(getListHumi)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        populateHumiTable(data);
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
            }
            function fetchListLight() {
                fetch(getListLight)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        populateLightTable(data);
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
            }
            function populateTempTable(data) {
                $('#table_temp tbody').empty();

                $.each(data, function(index, item) {
                    let row = '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + item.temp_value + '</td>' +
                        '<td>' + item.time_add + '</td>' +
                        '</tr>';
                    $('#table_temp tbody').append(row);
                });
            }
            function populateHumiTable(data) {
                $('#table_humi tbody').empty();

                $.each(data, function(index, item) {
                    let row = '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + item.humi_value + '</td>' +
                        '<td>' + item.time_add + '</td>' +
                        '</tr>';
                    $('#table_humi tbody').append(row);
                });
            }
            function populateLightTable(data) {
                $('#table_light tbody').empty();

                $.each(data, function(index, item) {
                    let row = '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + item.id_light + '</td>' +
                        '<td>' + item.light_state + '</td>' +
                        '<td>' + item.time+ '</td>' +
                        '</tr>';
                    $('#table_light tbody').append(row);
                });
            }
            setInterval(fetchListTemp,10000);
            setInterval(fetchListHumi,10000);
            setInterval(fetchListLight,10000);
            function fetchDataTemp() {
                fetch(getTemp)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        temp_value = data.map(item => item.temp_value);
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
            }

            function fetchDataHumi() {
                fetch(getHumi)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        humi_value = data.map(item => item.humi_value);
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
            }

            setInterval(fetchDataTemp, 5000);
            setInterval(fetchDataHumi, 5000);

            const tempData = {
                datasets: [
                    {
                        label: 'Temperature (deg)',
                        data: [],
                        borderColor: 'rgb(241,13,13)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 1,
                        fill: true,
                        pointStyle: false
                    }
                ]
            };

            const humiData = {
                datasets: [
                    {
                        label: 'Humidity (%)',
                        data: [],
                        borderColor: 'blue',
                        backgroundColor: 'rgba(192, 75, 192, 0.2)',
                        borderWidth: 1,
                        fill: true,
                        pointStyle: false
                    }
                ]
            };

            const tempConfig = {
                type: 'line',
                data: tempData,
                options: {
                    scales: {
                        x: {
                            type: 'realtime',
                            realtime: {
                                duration: 45000,
                                refresh: 1000,
                                onRefresh: function (chart) {
                                    chart.data.datasets.forEach(function (dataset) {
                                        dataset.data.push({
                                            x: Date.now(),
                                            y: temp_value
                                        });
                                    });
                                }
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    },
                }
            };

            const humiConfig = {
                type: 'line',
                data: humiData,
                options: {
                    scales: {
                        x: {
                            type: 'realtime',
                            realtime: {
                                duration: 45000,
                                refresh: 1000,
                                onRefresh: function (chart) {
                                    chart.data.datasets.forEach(function (dataset) {
                                        dataset.data.push({
                                            x: Date.now(),
                                            y: humi_value
                                        });
                                    });
                                }
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    },
                }
            };

            const tempChart = new Chart(document.getElementById('chartTemp'), tempConfig);
            const humiChart = new Chart(document.getElementById('chartHumi'), humiConfig);
        });


    </script>
@endsection
