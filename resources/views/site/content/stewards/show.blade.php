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
                Офіціант {{ $steward->steward_passport }}
                <br>
                @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер')
                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'steward.destroy', $steward->steward_passport ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}
                <a href="{{ URL::to('steward/' . $steward->steward_passport . '/edit') }}">
                    <div class="btn btn-small btn-info right" >Редагувати</div></a>
                    @endif
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('steward.index') }}">Офіціанти</a></li>
                <li class="active">Інформація про офіціанта {{ $steward->steward_passport }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <p>
                                <strong>Номер паспорту:</strong> {{ $steward->steward_passport }}<br>
                                <strong>Номер клубу:</strong><a href="{{ URL::to('club/' . $steward->id_club)  }}">{{$steward->id_club}}</a><br>
                                <strong>Прізвище:</strong> {{ $steward->surname }}<br>
                                <strong>Ім'я:</strong> {{ $steward->name }}<br>
                                <strong>Дата народження:</strong> {{ $steward->birth_date }}<br>
                                <strong>Email:</strong> {{ $steward->email }}<br>
                                <strong>Сума за день:</strong> {{ $steward->sum_per_day }}<br>
                                <strong>Зарплата (грн.):</strong> {{ $steward->salary }}<br>
                                <strong>Додаткова зарплата (грн.):</strong> {{ $steward->extra_salary }}<br>
                                <strong>Старший:</strong> {{ $steward->is_main }}<br>
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
