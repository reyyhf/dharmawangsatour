<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/dashboard" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                {{-- @if(auth()->user()->role == 'admin') --}}
                <li><a href="/paket" class=""><i class="lnr lnr-database"></i> <span>Paket Destinasi</span></a></li>
                <li><a href="/bus" class=""><i class="lnr lnr-bus"></i> <span>Bus</span></a></li>
                <li><a href="/hotel" class=""><i class="lnr lnr-apartment"></i> <span>Hotel</span></a></li>
                <li><a href="/carousel" class=""><i class="lnr lnr-picture"></i> <span>Carousel</span></a></li>
                <li><a href="/aboutadm" class=""><i class="lnr lnr-picture"></i> <span>Tentang Kami</span></a></li>
                <li><a href="/clients" class=""><i class="lnr lnr-user"></i> <span>Clients</span></a></li>
                <li><a href="/galeriadm" class=""><i class="lnr lnr-camera"></i> <span>Galeri</span></a></li>
                <li><a href="/transaksi" class=""><i class="lnr lnr-cart"></i> <span>Transaksi</span></a></li>
                {{-- @endif --}}
            </ul>
        </nav>
    </div>
</div>

<!-- Javascript -->
<script type="text/javascript" src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
{{-- <script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }}"></script> --}}
<script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/chartist/js/chartist.min.js') }}"></script>
<script src="{{ asset('admin/assets/scripts/klorofil-common.js') }}"></script>