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
                Телефон менеджера {{  $phone->manager_passport}}


                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'phone.destroy', $phone->mobile ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('phone.index') }}">телефои</a></li>
                <li class="active">Інформація про телефон менеджера {{  $phone->manager_passport}}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::model($phone, array('route' => array('phone.update', $phone->mobile), 'method' => 'PUT')) }}


                            <div class="form-group">
                                {{ Form::label('manager_passport', 'Номер менеджера') }}

                                {{ Form::select('manager_passport', $managers , Input::old('manager_passport'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('mobile', 'Мобільний') }}
                                {{ Form::text('mobile', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('home', 'Домашній') }}
                                {{ Form::text('home', null, array('class' => 'form-control')) }}
                            </div>



                            {{ Form::submit('Редагувати', array('class' => 'btn btn-primary')) }}

                            {{ Form::close() }}







                        </div>
                    </div>

                    <footer><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p></footer>
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
