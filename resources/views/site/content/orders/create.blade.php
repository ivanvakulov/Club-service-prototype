@extends('layouts.site')

@section('css')
    @include('layouts.asset.css')
@endsection

@section('header')
    @include('site.header')
@endsection

@section('content')

<div id="page-wrapper" >
    <div class="header">
        <h1 class="page-header">
        {{ $title }}
        </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('order.index') }}">Замовлення</a></li>
                <li class="active">Додати замовлення</li>
            </ol>
        </div>

            <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-content">

                        <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::open(array('url' => 'order')) }}

                        <div class="form-group">
                            {{ Form::label('steward_passport', 'Номер офіціанта') }}

                            {{ Form::select('steward_passport', $stewards , Input::old('steward_passport'), array('class' => 'form-control')) }}
                        </div>

                        <div class="input-field col s12">
                            {{ Form::label('table_number', 'Номер столику') }}
                            {{ Form::text('table_number', Input::old('table_number'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('order_date', 'Дата') }}
                            {{ Form::date('order_date', Input::old('order_date'), array('class' => 'form-control')) }}
                        </div>

                            {{ Form::submit('Додати', array('class' => 'btn btn-primary')) }}

                            {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    @include('layouts.asset.js')
@endsection

