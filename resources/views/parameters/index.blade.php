@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Parameters</h1>
    @if(Auth::user()->role!='patient')
    <h1 class="pull-right">
       <!-- <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('parameters.create') }}">Add New</a> -->
       @if (!Request::is("/parameters-with-report-ID/*"))
       <a href="/parameters/cetak_pdf/{{$report_id}}" class="btn btn-primary" style="margin-top: -10px;margin-bottom: 5px" target="_blank">Print PDF</a>
       @endif
   </h1>
   @else
   <h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('machines.patient') }}">Home</a>
   </h1>
   @endif
</section>
<div class="content">
        <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
        <div class="row">
        @if (!Request::is("parameters"))
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

        <script>
        window.onload = function () 
        {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                zoomEnabled: true,
                panEnabled: true,
                zoomType: "xy",
                theme: "light2",
                title:{
                    text: "Arterial Pressure Graph"
                },
                axisX:
                {
                    title: "Minutes",
                    minimum: 0,
                    includeZero: true
                    
                },
                axisY:
                {
                    title: "mmHg",
                    min: -500,
                    max: -500,
                   
                },
                data: [
                    {        
                    type: "line",
                    indexLabelFontSize: 16,
                    dataPoints: [
                        @foreach($arterial_press as $data)
                        { y: {{$data }}},
                        @endforeach
                    ]
                }]
            });
            chart.render();
            

            var chart2 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                zoomEnabled: true,
                panEnabled: true,
                zoomType: "xy",
                theme: "light2",
            title:{
                text: "Venous Pressure Graph"
            },
            axisX:
                {
                    title: "Minutes",
                    minimum: 0,
                    includeZero: true
                },
            axisY:{
                title: "mmHg",
                min: -500,
                max: -500,
                // includeZero: false;
                },
            data: [{        
                type: "line",
                indexLabelFontSize: 16,
                dataPoints: [
                    @foreach($venous_press as $data)
                    { y: {{$data }}},
                    @endforeach
                    ]
                },
            ]
            });
            chart2.render();

        }

        </script>
    <div id="chartContainer" style="height: 200px; width: 100%;"></div>
    <div id="chartContainer2" style="height: 200px; width: 100%;"></div>
    @endif  
</div>

        </div>
        
        <div class="box-footer">
                @include('parameters.table')
    </div>

    <div class="text-center">

    </div>
</div>




@endsection

