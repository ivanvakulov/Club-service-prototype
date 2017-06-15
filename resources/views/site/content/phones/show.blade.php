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

                <br>

                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'phone.destroy', $phone->mobile] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}
                <a href="{{ URL::to('phone/' . $phone->mobile. '/edit') }}">
                    <div class="btn btn-small btn-info right" >Редагувати</div></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('phone.index') }}">Телефон</a></li>
                <li class="active">Інформація про телефон менеджера {{  $phone->manager_passport}}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <p>
                                <strong>Номер манеджера:</strong> <a href="{{ URL::to('manager/' . $phone->manager_passport)  }}">{{$phone->manager_passport}}</a><br>
                                <strong>Мобільний:</strong> {{$phone->mobile}}<br>
                                <strong>Домашній:</strong> {{$phone->home}}<br>
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
