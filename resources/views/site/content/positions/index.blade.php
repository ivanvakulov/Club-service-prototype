
<div id="page-wrapper" >
    <div class="header">
        <h1 class="page-header">
            {{ $title }}
        </h1>

        <div class="breadcrumb">
            <li><a  href="{{ URL::to('order') }}">До замовлень</a>
        </div>


    </div>

    <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="card">

                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-table">
                                <thead>
                                <tr>
                                    {{--<th>ID</th>--}}
                                    {{--<th>Номер замовлення</th>--}}
                                    <th>Назва позиції меню</th>
                                    <th>Кількість</th>
                                    <th>Ціна</th>
                                    <th>Загальна ціна</th>
                                    @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер' || Illuminate\Support\Facades\Auth::user()->position == 'Старший офіціант')
                                    <th>Управління</th>
                                        @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($positions as $position)
                                    <tr class="gradeA">
                                        {{--<td>{{$position->id_order_position}}</td>--}}
                                        {{--<td><a href="{{ URL::to('order/' . $position->id_order)  }}">{{$position->id_order}}</a></td>--}}
                                        <td><a href="{{ URL::to('menuposition/' . $position->id_menu_position)  }}">{{$position->position_name}}</a></td>
                                        <td>{{$position->position_count}}</td>
                                        <td>{{$position->price}}</td>
                                        <td>{{$position->result_price}}</td>
                                        @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер' || Illuminate\Support\Facades\Auth::user()->position == 'Старший офіціант')
                                        <td>
                                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                            <a class="btn btn-small btn-success" href="{{ URL::to('position/' . $position->id_order_position)  }}"><i class="fa fa-eye"></i></a>
                                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                            <a class="btn btn-small btn-info" href="{{ URL::to('position/' . $position->id_order_position . '/edit') }}"><i class="fa fa-edit"></i></a>

                                        </td>
                                            @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                {{--<h1 style="float: right" class="page-header">Сума: {{$position->order_sum}}</h1></th>--}}

                            </table>
                            <h1 style="float: right" class="price page-header">Сума: {{ $order->order_sum }}</h1>
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
