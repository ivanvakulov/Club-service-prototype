@extends('layouts.site')

@section('css')
    @include('layouts.asset.css')
@endsection

@section('header')
    @include('site.header')
@endsection


@section('content')

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Номер паспорту','Кількість замовлень'],
                    @foreach($orders as $key => $value)
                ['{{$key}}', {{$value}}],
                @endforeach

            ]);

            var options = {
                title: "Відсоток замовлень на кожного офіціанта",
                titleTextStyle: {
                    fontSize: 32
                },
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Клуб", "Заходів", { role: "style" } ],
                    @foreach($id_clubs as $key => $value)
                ["{{$key}}", {{$value}}, "#03038b"],
                @endforeach
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Кількість заходів у кожному клубі",
                titleTextStyle: {
                    fontSize: 32
                },
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Вік', 'Менеджерів'],
                    @foreach($managers as $key => $value)
                ["{{$key}}", {{$value}}],
                @endforeach
            ]);

            var options = {
                title: "Вік менеджерів",
                titleTextStyle: {
                    fontSize: 32
                },
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
                hAxis: {title: 'Вік',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Клуб", "Заходів", { role: "style" } ],
                    @foreach($ordersSt as $key => $value)
                ["{{$key}}", {{$value}}, "#03038b"],
                @endforeach
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Загальна сума продаж кожного офіціанта",
                titleTextStyle: {
                    fontSize: 32
                },
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values_s"));
            chart.draw(view, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Номер клубу','Кількість офіціантів'],
                    @foreach($last as $key => $value)
                ['{{$key}}', {{$value}}],
                @endforeach

            ]);

            var options = {
                title: "Відсоток офіціантів, що працюють в клубі",
                titleTextStyle: {
                    fontSize: 32
                },
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };

            var chart = new google.visualization.PieChart(document.getElementById('last'));

            chart.draw(data, options);
        }
    </script>
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Статистика
            </h1>
            <ol class="breadcrumb">
                <li><a href="/">Головна</a></li>
                <li><a href="{{route('statistic')}}">Статистика</a></li>
            </ol>

        </div>
        <div id="page-inner">
            <div class="row">

                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="card-content">
                            <div id="piechart" style="height: 500px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="card-content">
                            <div id="columnchart_values" style="height: 500px"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="card-content">
                            <div id="chart_div" style="width: 100%; height: 500px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="card-content" style="max-height: 540px;">
                            <div class="card-content">
                                <div id="columnchart_values_s" style="height: 500px; max-height: 540px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="card-content" style="max-height: 540px;">
                            <div class="card-content">
                                <div id="last" style="height: 500px; max-height: 540px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('js')
    @include('layouts.asset.jsfortable')
@endsection
