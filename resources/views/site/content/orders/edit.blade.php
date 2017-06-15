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
                Замовлення {{ $order->id_order }}

                @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер' || Illuminate\Support\Facades\Auth::user()->position == 'Старший офіціант')
                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'order.destroy', $order->id_order ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}
                @endif
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('order.index') }}">Замовлення</a></li>
                <li class="active">Редагувати замовлення {{ $order->id_order }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::model($order, array('route' => array('order.update', $order->id_order), 'method' => 'PUT')) }}


                            <div class="form-group">
                                {{ Form::label('steward_passport', 'Номер офіціанта') }}

                                {{ Form::select('steward_passport', $stewards , Input::old('steward_passport'), array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('table_number', 'Номер столику') }}
                                {{ Form::text('table_number', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('order_date', 'Дата') }}
                                {{ Form::text('order_date', null, array('class' => 'form-control')) }}
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
