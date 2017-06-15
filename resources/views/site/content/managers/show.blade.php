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
                <br>

                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'manager.destroy', $manager->manager_passport ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}
                <a href="{{ URL::to('manager/' . $manager->manager_passport . '/edit') }}">
                    <div class="btn btn-small btn-info right" >Редагувати</div></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('manager.index') }}">Менеджери</a></li>
                <li class="active">Інформація про менеджера {{ $manager->manager_passport }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <p>
                                <strong>Номер паспорту:</strong> {{ $manager->manager_passport }}<br>
                                <strong>Прізвище:</strong> {{ $manager->surname }}<br>
                                <strong>Ім'я:</strong> {{ $manager->name }}<br>
                                <strong>Дата народження:</strong> {{ $manager->birth_date }}<br>
                                <strong>Зарплата (грн.):</strong> {{ $manager->salary }}<br>
                            </p>
                            <div class="clearBoth"><br/></div>

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
