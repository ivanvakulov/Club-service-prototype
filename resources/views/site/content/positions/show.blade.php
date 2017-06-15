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
                <br>
                @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер')
                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'position.destroy', $position->id_order_position ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}
                <a href="{{ URL::to('position/' . $position->id_order_position . '/edit') }}">
                    <div class="btn btn-small btn-info right" >Редагувати</div></a>
                    @endif
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('position.index') }}">Позиції в замовленнях</a></li>
                <li class="active">Інформація про позицію в замовленні {{ $position->id_order_position }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <p>
                                <strong>ID:</strong> {{ $position->id_order_position }}<br>
                                <strong>Кількість:</strong> {{ $position->position_count }}<br>
                                <strong>Номер замовлення:</strong><a href="{{ URL::to('order/' . $position->id_order)  }}">{{$position->id_order}}</a><br>
                                <strong>Номер позиції меню:</strong> <a href="{{ URL::to('menuposition/' . $position->id_menu_position)  }}">{{$position->id_menu_position}}</a><br>
                                <strong>Загальна ціна:</strong> {{ $position->result_price }}<br>
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
