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
                <li class="active">Змінити пароль</li>
            </ol>
        </div>

            <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-content">
                    <!-- if there are creation errors, they will show here -->
                    {{ HTML::ul($errors->all()) }}

                    {{ Form::model($user, array('route' => array('change'), 'method' => 'PUT')) }}

                    <div class="input-field col s12">
                        {{ Form::label('password', 'Новий пароль') }}
                        {{ Form::password('password', null, array('class' => 'form-control')) }}
                    </div>



                    {{ Form::submit('Зберегти', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}


                    </div>
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

