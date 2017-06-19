@extends('layouts.site')

@section('css')
    @include('layouts.asset.css')
@endsection

@section('header')
    @include('site.header')
@endsection


@section('content')
<div id="page-wrapper" >
    <div class="header">
        <h1 class="page-header">
            {{ $title }}
        </h1>

        <div class="breadcrumb">
            <li><a  href="{{ URL::to('order/create') }}">Додати замовлення</a>
        </div>


    </div>

    <div id="page-inner" >

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="card">

                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    {{--<th>Номер офіціанта</th>--}}
                                    <th>Номер столу</th>
                                    <th>Дата</th>
                                    <th>Сума</th>
                                    <th>Управління</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr class="gradeA">
                                        <td>{{$order->id_order}}</td>
                                        {{--<td><a href="{{ URL::to('steward/' . $order->steward_passport)  }}">{{$order->steward_passport}}</a></td>--}}
                                        <td>{{$order->table_number}}</td>
                                        <td>{{$order->order_date}}</td>
                                        <td>{{$order->order_sum}}</td>
                                        <td>
                                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                            @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер' || Illuminate\Support\Facades\Auth::user()->position == 'Старший офіціант')
                                                <a class="btn btn-small btn-info" href="{{ URL::to('order/' . $order->id_order . '/edit') }}"><i class="fa fa-edit"></i></a>
                                        @endif
                                        <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                            <a class="btn btn-small btn-success" href="{{ URL::to('order/' . $order->id_order)  }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-small btn-warning" href="{{ URL::to('/position/create/' . $order->id_order) }}"><i class="fa fa-plus-square"></i></a>
                                            <a class="btn btn-small btn-primary" href="{{ URL::to('/position/show/' . $order->id_order)  }}"><i class="fa fa-bars"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>



        <footer><p>All right reserved.</p></footer>
    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection


@section('js')
    @include('layouts.asset.jsfortable')
@endsection
