<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            {{ $title }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="/">Головна сторінка</a></li>
        </ol>
    </div>
    <div id="page-inner">


        <div class="row">
            <a class="a-my" href="{{ route('club.index') }}">
            <div class="col-xs-12 col-sm-6 col-md-3" >

                <div class="card horizontal cardIcon waves-effect waves-dark">
                    <div class="card-image">
                        <i class="fa fa-home fa-fw"></i>
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h3>{{ $counts['clubs'] }}</h3>
                        </div>
                        <div class="card-action">
                            <strong> Клубів</strong>
                        </div>
                    </div>
                </div>

            </div>
            </a>
            <a class="a-my" href="{{ route('menuposition.index') }}">
            <div class="col-xs-12 col-sm-6 col-md-3">

                <div class="card horizontal cardIcon waves-effect waves-dark">
                    <div class="card-image blue">
                        <i class="fa fa-cutlery"></i>
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h3>{{ $counts['menupositions'] }}</h3>
                        </div>
                        <div class="card-action">
                            <strong> Позицій меню</strong>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a class="a-my" href="{{ route('order.index') }}">
                <div class="col-xs-12 col-sm-6 col-md-3">

                    <div class="card horizontal cardIcon waves-effect waves-dark">
                        <div class="card-image orange">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h3>{{ $counts['orders'] }}</h3>
                            </div>
                            <div class="card-action">
                                <strong> Замовлень</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="a-my" href="{{ route('phone.index') }}">
            <div class="col-xs-12 col-sm-6 col-md-3">

                <div class="card horizontal cardIcon waves-effect waves-dark">
                    <div class="card-image pink">
                        <i class="fa fa-phone fa-5x"></i>
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h3>{{ $counts['phones'] }}</h3>
                        </div>
                        <div class="card-action">
                            <strong> Телефонів</strong>
                        </div>
                    </div>
                </div>

            </div>
            </a>
            <a class="a-my" href="{{ route('manager.index') }}">
            <div class="col-xs-12 col-sm-6 col-md-3">

                <div class="card horizontal cardIcon waves-effect waves-dark">
                    <div class="card-image red">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h3>{{ $counts['managers'] }}</h3>
                        </div>
                        <div class="card-action">
                            <strong> Менеджерів</strong>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a class="a-my" href="{{ route('steward.index') }}">
            <div class="col-xs-12 col-sm-6 col-md-3">

                <div class="card horizontal cardIcon waves-effect waves-dark">
                    <div class="card-image purple">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h3>{{ $counts['stewards'] }}</h3>
                        </div>
                        <div class="card-action">
                            <strong> Офіціантів</strong>
                        </div>
                    </div>
                </div>

            </div>
            </a>
            <a class="a-my" href="{{ route('event.index') }}">
                <div class="col-xs-12 col-sm-6 col-md-3">

                    <div class="card horizontal cardIcon waves-effect waves-dark">
                        <div class="card-image black">
                            <i class="fa fa-headphones"></i>
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h3>{{ $counts['events'] }}</h3>
                            </div>
                            <div class="card-action">
                                <strong> Заходів</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="a-my" href="{{ route('position.index') }}">
                <div class="col-xs-12 col-sm-6 col-md-3">

                    <div class="card horizontal cardIcon waves-effect waves-dark">
                        <div class="card-image grey">
                            <i class="fa fa-barcode"></i>
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h3>{{ $counts['positions'] }}</h3>
                            </div>
                            <div class="card-action">
                                <strong> Позицій у замовленнях</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- /. ROW  -->


        </div>
        <!-- /. ROW  -->


        <footer><p>All right reserved.</p>


        </footer>
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->