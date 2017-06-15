
<div id="page-wrapper" >
    <div class="header">
        <h1 class="page-header">
            {{ $title }}
        </h1>

        <div class="breadcrumb">
            <li><a  href="{{ URL::to('position/create') }}">Додати позицію в замовленні</a>
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
                                    <th>ID</th>
                                    <th>Кількість</th>
                                    <th>Номер замовлення</th>
                                    <th>Номер позиції меню</th>
                                    <th>Загальна ціна</th>
                                    @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер' || Illuminate\Support\Facades\Auth::user()->position == 'Старший офіціант')
                                    <th>Управління</th>
                                        @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($positions as $position)
                                    <tr class="gradeA">
                                        <td>{{$position->id_order_position}}</td>
                                        <td>{{$position->position_count}}</td>
                                        <td><a href="{{ URL::to('order/' . $position->id_order)  }}">{{$position->id_order}}</a></td>
                                        <td><a href="{{ URL::to('menuposition/' . $position->id_menu_position)  }}">{{$position->id_menu_position}}</a></td>
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
