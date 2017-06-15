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
                Позиція в замовленні {{ $position->id_order_position }}


                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'position.destroy', $position->id_order_position ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('position.index') }}">Позиції в замовленнях</a></li>
                <li class="active">Редагувати позицію в замовленні {{ $position->id_order_position }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::model($position, array('route' => array('position.update', $position->id_order_position), 'method' => 'PUT')) }}


                            <div class="form-group">
                                {{ Form::label('position_count', 'Кількість') }}
                                {{ Form::text('position_count', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('id_order', 'Номер замовлення') }}

                                {{ Form::select('id_order', $orders , Input::old('id_order'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('id_menu_position', 'Номер позиції меню') }}

                                {{ Form::select('id_menu_position', $menupositions , Input::old('id_menu_position'), array('class' => 'form-control')) }}
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
