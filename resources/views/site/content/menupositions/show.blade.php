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
                <br>
                @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер')
                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'menuposition.destroy', $menuposition->id_menu_position ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}
                <a href="{{ URL::to('menuposition/' . $menuposition->id_menu_position . '/edit') }}">
                    <div class="btn btn-small btn-info right" >Редагувати</div></a>
                    @endif
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('menuposition.index') }}">Позиції меню</a></li>
                <li class="active">Інформація про позицію меню {{ $menuposition->id_menu_position }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <p>
                                <strong>ID:</strong> {{ $menuposition->id_menu_position }}<br>
                                <strong>Назва:</strong> {{ $menuposition->position_name }}<br>
                                <strong>Ціна (грн):</strong> {{ $menuposition->price }}<br>
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
