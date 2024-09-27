<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="/dashboard"><img src="{{ asset('assets/img/logo-dt.png') }}" alt="Klorofil Logo"
                class="img-responsive logo" style="max-height: 40px"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>

        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                            src="{{ asset('admin/assets/img/default.jpg') }}" class="img-circle" alt="Avatar">
                            @if (isset(auth()->user()->name))
                            <span>{{ auth()->user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>                                                                                          
                            @endif
                    <ul class="dropdown-menu">
                        <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                    </ul>
                </li>
                <!-- <li>
                        <a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
                    </li> -->
            </ul>
        </div>
    </div>
</nav>

<script type="text/javascript" src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
{{-- <script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }}"></script> --}}
<script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/chartist/js/chartist.min.js') }}"></script>
<script src="{{ asset('admin/assets/scripts/klorofil-common.js') }}"></script>

