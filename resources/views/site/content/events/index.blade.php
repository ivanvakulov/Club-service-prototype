
<div id="page-wrapper" >
    <div class="header">
        <h1 class="page-header">
            {{ $title }}
        </h1>

        <div class="breadcrumb">
            <li><a  href="{{ URL::to('event/create') }}">Додати захід</a>
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
                                    <th>Номер клубу</th>
                                    <th>Назва</th>
                                    <th>Дата</th>
                                    <th>Артист</th>
                                    <th>Управління</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr class="gradeA">
                                        <td>{{$event->id_event}}</td>
                                        <td><a href="{{ URL::to('club/' . $event->id_club)  }}">{{$event->id_club}}</a></td>
                                        <td>{{$event->event_name}}</td>
                                        <td>{{$event->event_date}}</td>
                                        <td>{{$event->event_artist}}</td>
                                        <td>
                                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                            <a class="btn btn-small btn-success" href="{{ URL::to('event/' . $event->id_event)  }}"><i class="fa fa-eye"></i></a>
                                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                            @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер')
                                            <a class="btn btn-small btn-info" href="{{ URL::to('event/' . $event->id_event . '/edit') }}"><i class="fa fa-edit"></i></a>
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
