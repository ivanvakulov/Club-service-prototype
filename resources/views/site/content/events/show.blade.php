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
                Захід {{ $event->id_event }}
                <br>
                @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер')
                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'event.destroy', $event->id_event ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}
                <a href="{{ URL::to('event/' . $event->id_event . '/edit') }}">
                    <div class="btn btn-small btn-info right" >Редагувати</div></a>
                    @endif
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('event.index') }}">Заходи</a></li>
                <li class="active">Інформація про захід {{ $event->id_event }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <p>
                                <strong>ID:</strong> {{ $event->id_event }}<br>
                                <strong>Номер клубу:</strong><a href="{{ URL::to('club/' . $event->id_club)  }}">{{$event->id_club}}</a><br>
                                <strong>Назва:</strong> {{ $event->event_name }}<br>
                                <strong>Дата:</strong> {{ $event->event_date }}<br>
                                <strong>Артист:</strong> {{ $event->event_artist }}<br>
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
