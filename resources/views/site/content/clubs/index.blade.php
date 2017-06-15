
<div id="page-wrapper" >
    <div class="header">
        <h1 class="page-header">
            {{ $title }}
        </h1>

        <div class="breadcrumb">
            <li><a  href="{{ URL::to('club/create') }}">Додати клуб</a>
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
                                    <th>Назва</th>
                                    <th>Кількість працівників</th>
                                    <th>Прибуток (грн.)</th>
                                    <th>Паспорт менеджера</th>
                                    <th>Управління</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clubs as $club)
                                    <tr class="gradeA">
                                        <td>{{$club->id_club}}</td>
                                        <td>{{$club->club_name}}</td>
                                        <td>{{$club->number_of_workers}}</td>
                                        <td>{{$club->income}}</td>
                                        <td><a href="{{ URL::to('manager/' . $club->manager_passport)  }}">{{$club->manager_passport}}</a></td>
                                        <td>
                                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                            <a class="btn btn-small btn-success" href="{{ URL::to('club/' . $club->id_club)  }}"><i class="fa fa-eye"></i></a>
                                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                            <a class="btn btn-small btn-info" href="{{ URL::to('club/' . $club->id_club . '/edit') }}"><i class="fa fa-edit"></i></a>

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
