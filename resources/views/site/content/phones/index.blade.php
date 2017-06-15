
<div id="page-wrapper" >
    <div class="header">
        <h1 class="page-header">
            {{ $title }}
        </h1>

        <div class="breadcrumb">
            <li><a  href="{{ URL::to('phone/create') }}">Додати телефон</a>
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
                                    <th>Номер менеджера</th>
                                    <th>Мобільний</th>
                                    <th>Домашній</th>
                                    <th>Управління</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($phones as $phone)
                                <tr class="gradeA">
                                    <td><a href="{{ URL::to('manager/' . $phone->manager_passport)  }}">{{$phone->manager_passport}}</a></td>
                                    <td>{{$phone->mobile}}</td>
                                    <td>{{$phone->home}}</td>
                                    <td>
                                        <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                                        <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                        <a class="btn btn-small btn-success" href="{{ URL::to('phone/' . $phone->mobile)  }}"><i class="fa fa-eye"></i></a>
                                        <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                        <a class="btn btn-small btn-info" href="{{ URL::to('phone/' . $phone->mobile . '/edit') }}"><i class="fa fa-edit"></i></a>

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



        <footer><p>All right reserved. Template by: <a href="https://webthemez.com/admin-template/">WebThemez.com</a></p></footer>
    </div>
    <!-- /. PAGE INNER  -->
</div>
