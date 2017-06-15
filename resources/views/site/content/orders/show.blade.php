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
                Замовлення {{ $order->id_order}}
                <br>
                @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер')

                    @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер' || Illuminate\Support\Facades\Auth::user()->position == 'Старший офіціант')
                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'order.destroy', $order->id_order] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}
                    @endif
                <a href="{{ URL::to('order/' . $order->id_order. '/edit') }}">
                    <div class="btn btn-small btn-info right" >Редагувати</div></a>

                    @endif
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('order.index') }}">Замовлення</a></li>
                <li class="active">Інформація про замовлення {{ $order->id_order}}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <p>
                                <strong>ID:</strong> {{ $order->id_order }}<br>
                                <strong>Номер офіціанта:</strong> <a href="{{ URL::to('steward/' . $order->steward_passport)  }}"> {{ $order->steward_passport }}</a><br>
                                <strong>Номер столу:</strong> {{ $order->table_number }}<br>
                                <strong>Дата:</strong> {{ $order->order_date }}<br>
                                <strong>Сума:</strong> {{ $order->order_sum }}<br>
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
