@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Reports</h1>
    @if(Auth::user()->role!='patient')
    <h1 class="pull-right">
     <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('reports.create') }}">Add New</a>
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
            @include('reports.table')
        </div>
    </div>
    <div class="text-center">
        
    </div>
</div>
@endsection

