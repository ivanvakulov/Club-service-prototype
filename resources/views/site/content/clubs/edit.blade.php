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


                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'club.destroy', $club->id_club ] ]) }}
                {{ Form::submit('Видалити', ['class' => 'btn btn-small btn-danger right']) }}
                {{ Form::close() }}

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('main') }}">Головна</a></li>
                <li><a href="{{ route('club.index') }}">Клуби</a></li>
                <li class="active">Редагувати клуб {{ $club->id_club }}</li>
            </ol>

        </div>
        <div id="page-inner">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-content">
                            <!-- if there are creation errors, they will show here -->
                            {{ HTML::ul($errors->all()) }}

                            {{ Form::model($club, array('route' => array('club.update', $club->id_club), 'method' => 'PUT')) }}


                            <div class="form-group">
                                {{ Form::label('club_name', 'Назва') }}
                                {{ Form::text('club_name', null, array('class' => 'form-control')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('number_of_workers', 'Кількість співробітників') }}
                                {{ Form::text('number_of_workers', null, array('class' => 'form-control')) }}
                            </div>


                            <div class="form-group">
                                {{ Form::label('manager_passport', 'Номер менеджера') }}
                                {{ Form::select('manager_passport', $managers , Input::old('manager_passport'), array('class' => 'form-control')) }}
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
