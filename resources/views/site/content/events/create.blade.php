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
                <li><a href="{{ route('event.index') }}">Заходи</a></li>
                <li class="active">Додати захід</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">

                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::open(array('url' => 'event')) }}

                            <div class="form-group">
                                {{ Form::label('id_club', 'Номер клубу') }}

                                {{ Form::select('id_club', $clubs , Input::old('id_club'), array('class' => 'form-control')) }}
                            </div>

                            <div class="input-field col s12">
                                {{ Form::label('event_name', 'Назва') }}
                                {{ Form::text('event_name', Input::old('event_name'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('event_date', 'Дата') }}
                                {{ Form::date('event_date', Input::old('event_date'), array('class' => 'form-control')) }}
                            </div>

                            <div class="input-field col s12">
                                {{ Form::label('event_artist', 'Артист') }}
                                {{ Form::text('event_artist', Input::old('event_artist'), array('class' => 'form-control')) }}
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

