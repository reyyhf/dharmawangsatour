@extends('layouts.frontend.masteradmin')

@section('content')
<div class="main-content">
    <div class="container-fluid">
        @if (session('sukses'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle"></i> {{ session('sukses') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="container-fluid" style="margin-top:20px">
                        <div class="row">
                            <div class="col-sm-5">
                                <h2 style="margin-top:0px">Data Galeri</h2>
                            </div>
                            <div class="col-sm-2">
                                <a type="button" class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#exampleModal"><i class="fa fa-plus-square"
                                        style="padding-right:10px;"></i>Tambah
                                    Data</a>
                            </div>
                            <div class="col-sm-5">
                                <form method="GET" action="/galeriadm">
                                    <div class="form-group" style="">
                                        <input type="text" name="cari" class="form-control"
                                            style="width :45%; display: unset;" placeholder="Search..."
                                            value="{{ request('cari') }}" required>
                                        <select class="form-control" id="cbstatus" name="filter" required
                                            style="width :25%; display: unset;">
                                            <option value="" selected disabled>-
                                                Filter -</option>
                                            <option value="kode" @if (request('filter')=='kode' ) selected="selected"
                                                @endif>Kode</option>
                                            <option value="destinasi" @if (request('filter')=='destinasi' )
                                                selected="selected" @endif>
                                                Destinasi</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-search"></i></button>
                                        <a href="/paket"><button type="button" class="btn btn-success"><i
                                                    class="fa fa-refresh"></i></button></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Destinasi</th>
                                    <th>Keterangan</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($datagaleri as $galeri)
                                <tr class="data-row">
                                    <td class="kode">{{ $galeri->kodegl }}</td>
                                    <td class="destinasi">
                                        {{ $galeri->destinasi }}</td>
                                    <td class="keterangan"> 
                                        {{ $galeri->keterangan }}</td>
                                    <td class="gambar">
                                            {{ $galeri->gambar }}</td>
                                    <td><button type="button" class="btn btn-warning btn-sm" id="edit-item"
                                            data-item-id="{{ $galeri->id }}">Edit</button>
                                        <a href="/galeriadm/{{ $galeri->id }}/delete" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin mau hapus data?')">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/galeriadm/create" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="tbkodecl">Kode</label>
                        <input name="kodegl" type="text" class="form-control" id="tbkodegl" placeholder="Masukkan Kode"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="tbketerangan">Destinasi</label>
                        <input name="destinasi" type="text" class="form-control" id="tbdestinasi" placeholder="Masukkan Destinasi"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="tbketerangan">Keterangan</label>
                        <input name="keterangan" type="text" class="form-control" id="tbketerangan" placeholder="Masukkan Keterangan"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="tbgambar">Gambar </label>
                        <input name="gambar" type="file" class="form-control" id="tbgambar"
                            placeholder="Masukkan Gambar" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="edit-form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="tbkode">Kode</label>
                        <input name="kode" type="text" class="form-control" id="modalkode" placeholder="Masukkan Kode"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="modalketerangan">Destinasi</label>
                        <input name="destinasi" type="text" class="form-control" id="modaldestinasi" placeholder="Masukkan Destinasi"
                            >
                    </div>
                    <div class="form-group">
                        <label for="modalketerangan">Keterangan</label>
                        <input name="keterangan" type="text" class="form-control" id="modalketerangan" placeholder="Masukkan Keterangan"
                            >
                    </div>
                    <div class="form-group">
                        <label for="tbgambar">Gambar </label>
                        <input name="gambar" type="file" class="form-control" id="modalgambar"
                            placeholder="Masukkan Gambar">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
<script>
    $(document).ready(function () {
        /**
         * for showing edit item popup
         */

        $(document).on('click', "#edit-item", function () {
            $(this).addClass(
            'edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.


            var options = {
                'backdrop': 'static'
            };
            $('#modaledit').modal(options)
        })

        // on modal show
        $('#modaledit').on('show.bs.modal', function () {
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
            var row = el.closest(".data-row");

            // get the data
            var id = el.data('item-id');
            var kode = row.children(".kode").text();
            var destinasi = row.children(".destinasi").text().trim();
            var keterangan = row.children(".keterangan").text().trim();
            var gambar = row.children(".gambar").text();
            
            //edit action form
            $("#edit-form").attr('action', '/galeriadm/' + id + '/edit');

            // fill the data in the input fields
            $("#modalkode").val(kode);
            $("#modaldestinasi").val(destinasi);
            $("#modalketerangan").val(keterangan);
            // $("#modalgambar").val(gambar);

        })

        // on modal hide
        $('#modaledit').on('hide.bs.modal', function () {
            $("#edit-form").removeAttr("action");
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            $("#edit-form").trigger("reset");
        })
    })

</script>

@endsection
