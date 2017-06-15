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
                Клуб {{ $club->id_club }}
                <br>

                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'club.destroy', $club->id_club ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}
                <a href="{{ URL::to('club/' . $club->id_club . '/edit') }}">
                    <div class="btn btn-small btn-info right" >Редагувати</div></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('club.index') }}">Клуб</a></li>
                <li class="active">Інформація про клуб {{ $club->id_club }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <p>
                                <strong>ID:</strong> {{ $club->id_club }}<br>
                                <strong>Назва:</strong> {{ $club->club_name }}<br>
                                <strong>Кількість працівників:</strong> {{ $club->number_of_workers }}<br>
                                <strong>Прибуток:</strong> {{ $club->income }}<br>
                                <strong>Паспорт менеджера:</strong> <a href="{{ URL::to('manager/' . $club->manager_passport)  }}">{{$club->manager_passport}}</a><br>
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
