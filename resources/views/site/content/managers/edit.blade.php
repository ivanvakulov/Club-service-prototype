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
                Менеджер {{ $manager->manager_passport }}


                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'manager.destroy', $manager->manager_passport ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('manager.index') }}">Менеджери</a></li>
                <li class="active">Редагувати менеджера {{ $manager->manager_passport }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::model($manager, array('route' => array('manager.update', $manager->manager_passport), 'method' => 'PUT')) }}


                            <div class="form-group">
                                {{ Form::label('manager_passport', 'Номер паспорта') }}
                                {{ Form::text('manager_passport', null, array('class' => 'form-control')) }}
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
                                {{ Form::label('salary', 'Зарплата (грн.)') }}
                                {{ Form::text('salary', null, array('class' => 'form-control')) }}
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
