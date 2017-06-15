@extends('layouts.site')

@section('css')
    @include('layouts.asset.css')
@endsection

@section('header')
    @include('site.header')
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Захід {{ $event->id_event }}


                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'event.destroy', $event->id_event ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('event.index') }}">Заходи</a></li>
                <li class="active">Редагувати захід {{ $event->id_event }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::model($event, array('route' => array('event.update', $event->id_event), 'method' => 'PUT')) }}

                            <div class="form-group">
                                {{ Form::label('id_club', 'Номер клубу') }}
                                {{ Form::select('id_club', $clubs , Input::old('id_club'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('event_name', 'Назва') }}
                                {{ Form::text('event_name', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('event_date', 'Дата') }}
                                {{ Form::date('event_date', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('event_artist', 'Артист') }}
                                {{ Form::text('event_artist', null, array('class' => 'form-control')) }}
                            </div>



                            {{ Form::submit('Редагувати', array('class' => 'btn btn-primary')) }}

                            {{ Form::close() }}

                        </div>
                    </div>

                    <footer><p>All right reserved.</p></footer>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
    </div>
    <!-- /. WRAPPER  -->



@endsection

@section('js')
    @include('layouts.asset.js')
@endsection
