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
                <li><a href="{{ route('phone.index') }}">Телефони</a></li>
                <li class="active">Додати телефон</li>
            </ol>
        </div>

            <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-content">

                        <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::open(array('url' => 'phone')) }}

                        <div class="form-group">
                            {{ Form::label('manager_passport', 'Номер менеджера') }}

                            {{ Form::select('manager_passport', $managers , Input::old('manager_passport'), array('class' => 'form-control')) }}
                        </div>

                        <div class="input-field col s12">
                            {{ Form::label('mobile', 'Мобільний') }}
                            {{ Form::text('mobile', Input::old('mobile'), array('class' => 'form-control')) }}
                        </div>

                        <div class="input-field col s12">
                            {{ Form::label('home', 'Домашній') }}
                            {{ Form::text('home', Input::old('home'), array('class' => 'form-control')) }}
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

