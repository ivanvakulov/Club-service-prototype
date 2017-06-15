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
                <li><a href="{{ route('steward.index') }}">Офіціанти</a></li>
                <li class="active">Додати офіціанта</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">

                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::open(array('url' => 'steward')) }}

                            <div class="input-field col s12">
                                {{ Form::label('steward_passport', 'Номер паспорта') }}
                                {{ Form::text('steward_passport', Input::old('steward_passport'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('id_club', 'Номер клубу') }}

                                {{ Form::select('id_club', $clubs , Input::old('id_club'), array('class' => 'form-control')) }}
                            </div>

                            <div class="input-field col s12">
                                {{ Form::label('surname', 'Прізвище') }}
                                {{ Form::text('surname', Input::old('surname'), array('class' => 'form-control')) }}
                            </div>

                            <div class="input-field col s12">
                                {{ Form::label('name', 'Ім\'я') }}
                                {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('birth_date', 'Дата народження') }}
                                {{ Form::date('birth_date', Input::old('birth_date'), array('class' => 'form-control')) }}
                            </div>

                            <div class="input-field col s12">
                                {{ Form::label('email', 'Email') }}
                                {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
                            </div>

                            <div class="input-field col s12">
                                {{ Form::label('sum_per_day', 'Сума за день') }}
                                {{ Form::text('sum_per_day', Input::old('sum_per_day'), array('class' => 'form-control')) }}
                            </div>

                            <div class="input-field col s12">
                                {{ Form::label('salary', 'Зарплата (грн.)') }}
                                {{ Form::text('salary', Input::old('salary'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('is_main', 'Старший') }}
                                {{ Form::select('is_main', array('Ні','Так') , Input::old('is_main'), array('class' => 'form-control')) }}
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

