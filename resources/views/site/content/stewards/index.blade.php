
<div id="page-wrapper" >
    <div class="header">
        <h1 class="page-header">
            {{ $title }}
        </h1>

        <div class="breadcrumb">
            <li><a  href="{{ URL::to('steward/create') }}">Додати офіціанта</a>
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
                                    <th>Номер паспорта</th>
                                    <th>Номер клубу</th>
                                    <th>Прізвище</th>
                                    <th>Ім'я</th>
                                    <th>Дата народження</th>
                                    <th>Email</th>
                                    <th>Сума за день</th>
                                    <th>Зарплата</th>
                                    <th>Додаткова зарплата</th>
                                    <th>Старший</th>
                                    @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер' || Illuminate\Support\Facades\Auth::user()->position == 'Старший офіціант')
                                    <th>Управління</th>
                                        @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stewards as $steward)
                                    <tr class="gradeA">
                                        <td>{{$steward->steward_passport}}</td>
                                        <td><a href="{{ URL::to('club/' . $steward->id_club)  }}">{{$steward->id_club}}</a></td>
                                        <td>{{$steward->surname}}</td>
                                        <td>{{$steward->name}}</td>
                                        <td>{{$steward->birth_date}}</td>
                                        <td>{{$steward->email}}</td>
                                        <td>{{$steward->sum_per_day}}</td>
                                        <td>{{$steward->salary}}</td>
                                        <td>{{$steward->extra_salary}}</td>
                                        <td>{{$steward->is_main}}</td>

                                        <td>
                                            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                                            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                            @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер' || Illuminate\Support\Facades\Auth::user()->position == 'Старший офіціант')
                                            <a class="btn btn-small btn-success" href="{{ URL::to('steward/' . $steward->steward_passport)  }}"><i class="fa fa-eye"></i></a>
                                            @endif
                                        @if( Illuminate\Support\Facades\Auth::user()->position == 'Менеджер')
                                            <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                            <a class="btn btn-small btn-info" href="{{ URL::to('steward/' . $steward->steward_passport . '/edit') }}"><i class="fa fa-edit"></i></a>
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



        <footer><p>All right reserved. </p></footer>
    </div>
    <!-- /. PAGE INNER  -->
</div>
