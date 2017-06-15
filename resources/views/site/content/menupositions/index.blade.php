
<div id="page-wrapper" >
    <div class="header">
        <h1 class="page-header">
            {{ $title }}
        </h1>
        @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер')
        <div class="breadcrumb">
            <li><a  href="{{ URL::to('menuposition/create') }}">Додати позицію меню</a>
        </div>
        @endif

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
                                    <th>Назва</th>
                                    <th>Ціна</th>
                                    <th>Управління</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menupositions as $menuposition)
                                    <tr class="gradeA">
                                        <td>{{$menuposition->id_menu_position}}</td>
                                        <td>{{$menuposition->position_name}}</td>
                                        <td>{{$menuposition->price}}</td>
                                        <td>
                                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                            <a class="btn btn-small btn-success" href="{{ URL::to('menuposition/' . $menuposition->id_menu_position)  }}"><i class="fa fa-eye"></i></a>
                                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                            @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер')
                                            <a class="btn btn-small btn-info" href="{{ URL::to('menuposition/' . $menuposition->id_menu_position . '/edit') }}"><i class="fa fa-edit"></i></a>
                                            @endif
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
