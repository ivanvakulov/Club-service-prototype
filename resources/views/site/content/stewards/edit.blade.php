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
                Офіціант {{ $steward->steward_passport }}


                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'steward.destroy', $steward->steward_passport ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('steward.index') }}">Офіціанти</a></li>
                <li class="active">Редагувати офіціанта {{ $steward->steward_passport }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::model($steward, array('route' => array('steward.update', $steward->steward_passport), 'method' => 'PUT')) }}


                            <div class="form-group">
                                {{ Form::label('steward_passport', 'Номер паспорта') }}
                                {{ Form::text('steward_passport', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('id_club', 'Номер клубу') }}

                                {{ Form::select('id_club', $clubs , Input::old('id_club'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('surname', 'Прізвище') }}
                                {{ Form::text('surname', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('name', 'Ім\'я') }}
                                {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>


                            <div class="form-group">
                                {{ Form::label('birth_date', 'Дата народження') }}
                                {{ Form::date('birth_date', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('emil', 'Email') }}
                                {{ Form::text('email', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('sum_per_day', 'Сума за день') }}
                                {{ Form::text('sum_per_day', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('salary', 'Зарплата (грн.)') }}
                                {{ Form::text('salary', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('is_main', 'Старший') }}
                                {{ Form::select('is_main', array('Ні','Так') , Input::old('is_main'), array('class' => 'form-control')) }}
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
