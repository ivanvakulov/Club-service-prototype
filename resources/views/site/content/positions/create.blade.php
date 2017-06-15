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
                <li><a href="{{ route('position.index') }}">Позиції в замовленнях</a></li>
                <li class="active">Додати позицію в замовлення</li>
            </ol>
        </div>

        <div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">

                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::open(array('url' => 'position')) }}

                            <div class="input-field col s12">
                                {{ Form::label('position_count', 'Кількість') }}
                                {{ Form::text('position_count', Input::old('position_count'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('id_order', 'Номер замовлення') }}
                                {{ Form::select('id_order', $orders , Input::old('id_order'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('id_menu_position', 'Номер позиції меню') }}
                                {{ Form::select('id_menu_position', $menupositions , Input::old('id_menu_position'), array('class' => 'form-control')) }}
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

