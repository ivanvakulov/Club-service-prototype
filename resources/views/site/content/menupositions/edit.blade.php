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
                Позиція меню {{ $menuposition->id_menu_position }}


                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'menuposition.destroy', $menuposition->id_menu_position ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('menuposition.index') }}">Позиція меню</a></li>
                <li class="active">Редагувати позицію меню {{ $menuposition->id_menu_position }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::model($menuposition, array('route' => array('menuposition.update', $menuposition->id_menu_position), 'method' => 'PUT')) }}



                            <div class="form-group">
                                {{ Form::label('position_name', 'Назва') }}
                                {{ Form::text('position_name', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('price', 'Ціна') }}
                                {{ Form::text('price', null, array('class' => 'form-control')) }}
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
