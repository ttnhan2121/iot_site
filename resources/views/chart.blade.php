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

@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let getTemp = "{{ action('App\Http\Controllers\ChartController@getTemp') }}"
            let getHumi = "{{ action('App\Http\Controllers\ChartController@getHumi') }}"
            let temp_value;
            let humi_value;

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
                        console.log('Temperature values:', temp_value); // Optional: log temp_value to verify
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
@section('onMessageArrived')



@endsection
