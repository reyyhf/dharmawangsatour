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
                                                                <h2 style="margin-top:0px">Data Hotel Destinasi</h2>
                                                        </div>
                                                        <div class="col-sm-2">
                                                                <a type="button" class="btn btn-primary float-right"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModal"><i
                                                                                class="fa fa-plus-square"
                                                                                style="padding-right:10px;"></i>Tambah
                                                                        Data</a>
                                                        </div>
                                                        <div class="col-sm-5">
                                                                <form method="GET" action="/hotel">
                                                                        <div class="form-group" style="">
                                                                                <input type="text" name="cari"
                                                                                        class="form-control"
                                                                                        style="width :45%; display: unset;"
                                                                                        placeholder="Search..." value="{{ request('cari') }}" required>
                                                                                <select class="form-control"
                                                                                        id="cbstatus" name="filter"
                                                                                        required
                                                                                        style="width :25%; display: unset;">
                                                                                        <option value="" selected
                                                                                                disabled>-
                                                                                                Filter -</option>
                                                                                        <option value="kode" @if (request('filter') == 'kode') selected="selected" @endif>Kode</option>
                                                                                        <option value="destinasi" @if (request('filter') == 'destinasi') selected="selected" @endif>
                                                                                                Destinasi</option>
                                                                                </select>
                                                                                <button type="submit"
                                                                                        class="btn btn-primary"><i
                                                                                                class="fa fa-search"></i></button>
                                                                                <a href="/hotel"><button type="button"
                                                                                        class="btn btn-success"><i
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
                                                                        <th>Kota</th>
                                                                        <th>Nama</th>
                                                                        <th>Bintang</th>
                                                                        <th>Jumlah Orang/Kamar</th>
                                                                        <th>Harga Kamar</th>
                                                                        <th>Harga Kamar + Breakfast</th>
                                                                        <th>Aksi</th>
                                                                </tr>
                                                                {{-- <tr>
                                                                    <th colspan="3"></th>
                                                                    <th>2</th>
                                                                    <th>3</th>
                                                                    <th>4</th>
                                                                    <th>5</th>
                                                                    <th>6</th>
                                                                    <th></th>
                                                                </tr> --}}
                                                        </thead>
                                                        <tbody>
                                                                @foreach ($datahotel as $hotel)
                                                                <tr class="data-row">
                                                                        <td class="kota">{{ ucfirst($hotel->kota_hotel) }}</td>
                                                                        <td class="nama">
                                                                                {{ $hotel->nama_hotel }}</td>
                                                                        <td class="bintang">
                                                                                {{ $hotel->bintang }}</td>
                                                                            {{-- @if ($hotel->jumlah_orang==2 && $hotel->harga!=0)
                                                                        <td class="harga">{{ $hotel->harga }}</td>
                                                                            @elseif($hotel->jumlah_orang==2 && $hotel->harga_breakfast!=0)
                                                                        <td class="harga_b">{{ $hotel->harga_breakfast }}</td>
                                                                            @else
                                                                            <td></td>
                                                                            @endif
                                                                            @if ($hotel->jumlah_orang==3 && $hotel->harga!=0)
                                                                        <td class="harga">{{ $hotel->harga }}</td>
                                                                            @elseif($hotel->jumlah_orang==3 && $hotel->harga_breakfast!=0)
                                                                        <td class="harga_b">{{ $hotel->harga_breakfast }}</td>
                                                                            @else
                                                                            <td></td>
                                                                            @endif
                                                                            @if ($hotel->jumlah_orang==4 && $hotel->harga!=0)
                                                                        <td class="harga">{{ $hotel->harga }}</td>
                                                                            @elseif($hotel->jumlah_orang==4 && $hotel->harga_breakfast!=0)
                                                                        <td class="harga_b">{{ $hotel->harga_breakfast }}</td>
                                                                            @else
                                                                            <td></td>
                                                                            @endif
                                                                            @if ($hotel->jumlah_orang==5 && $hotel->harga!=0)
                                                                        <td class="harga">{{ $hotel->harga }}</td>
                                                                            @elseif($hotel->jumlah_orang==5 && $hotel->harga_breakfast!=0)
                                                                        <td class="harga_b">{{ $hotel->harga_breakfast }}</td>
                                                                            @else
                                                                            <td></td>
                                                                            @endif
                                                                            @if ($hotel->jumlah_orang==6 && $hotel->harga!=0)
                                                                        <td class="harga">{{ $hotel->harga }}</td>
                                                                            @elseif($hotel->jumlah_orang==6 && $hotel->harga_breakfast!=0)
                                                                        <td class="harga_b">{{ $hotel->harga_breakfast }}</td>
                                                                            @else
                                                                            <td></td>
                                                                            @endif --}}
                                                                        <td class="harga">{{ $hotel->jumlah_orang }}</td>
                                                                        <td class="harga">{{ $hotel->harga }}</td>
                                                                        <td class="harga_b">{{ $hotel->harga_breakfast }}</td>
                                                                        <td><button type="button"
                                                                                        class="btn btn-warning btn-sm"
                                                                                        id="edit-item"
                                                                                        data-item-id="{{ $hotel->id_detail_hotel }}">Edit</button>
                                                                                <a href="/hotel/{{ $hotel->id_detail_hotel }}/delete"
                                                                                        class="btn btn-danger btn-sm"
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
                                <form action="/hotel/create" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                                <label for="tbkode">Kode</label>
                                                <input name="kode" type="text" class="form-control" id="tbkode"
                                                        placeholder="Masukkan Kode" required>
                                        </div>
                                        <div class="form-group">
                                                <label for="tbdestinasi">Destinasi </label>
                                                <input name="destinasi" type="text" class="form-control"
                                                        id="tbndestinasi" placeholder="Masukkan Destinasi" required>
                                        </div>
                                        <div class="form-group">
                                                <label for="tbdurasi">Durasi (Hari)</label>
                                                <input name="durasi" type="number" class="form-control"
                                                        id="tbdurasi" placeholder="Masukkan Durasi" required>
                                        </div>
                                        <div class="form-group">
                                                <label for="tbinap">Inap (Malam)</label>
                                                <input name="inap" type="number" class="form-control" id="tbinap"
                                                        placeholder="Masukkan Inap" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tbjmlhtl">Jumlah Hotel</label>
                                            <input name="jml_hotel" type="number" class="form-control" id="tbjmlhtl"
                                                    placeholder="Masukkan Jumlah Hotel" required>
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
                                            <input name="kode" type="text" class="form-control" id="modalkode"
                                                    placeholder="Masukkan Kode" required>
                                    </div>
                                    <div class="form-group">
                                            <label for="tbdestinasi">Destinasi </label>
                                            <input name="destinasi" type="text" class="form-control"
                                                    id="modaldestinasi" placeholder="Masukkan Destinasi" required>
                                    </div>
                                    <div class="form-group">
                                            <label for="tbdurasi">Durasi (Hari)</label>
                                            <input name="durasi" type="number" class="form-control"
                                                    id="modaldurasi" placeholder="Masukkan Durasi" required>
                                    </div>
                                    <div class="form-group">
                                            <label for="tbinap">Inap (Malam)</label>
                                            <input name="inap" type="text" class="form-control" id="modalinap"
                                                    placeholder="Masukkan Inap" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tbjmlhtl">Jumlah Hotel</label>
                                        <input name="jml_hotel" type="number" class="form-control" id="modaljmlhtl"
                                                placeholder="Masukkan Jumlah Hotel" required>
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

<script type="text/javascript" src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
<script>
        $(document).ready(function() {
        /**
        * for showing edit item popup
        */

        $(document).on('click', "#edit-item", function() {
        $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
        

        var options = {
        'backdrop': 'static'
        };
        $('#modaledit').modal(options)
        })

        // on modal show
        $('#modaledit').on('show.bs.modal', function() {
        var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
        var row = el.closest(".data-row");

        // get the data
        var id = el.data('item-id');
        var kode = row.children(".kode").text();
        var destinasi = row.children(".destinasi").text().trim();
        var durasi = row.children(".durasi").text();
        var inap = row.children(".inap").text();
        var jml_hotel = row.children(".jml_hotel").text();

        //edit action form
        $("#edit-form").attr('action', '/hotel/'+id+'/edit');

        // fill the data in the input fields
        $("#modalkode").val(kode);
        $("#modaldestinasi").val(destinasi);
        $("#modaldurasi").val(parseInt(durasi));
        $("#modalinap").val(inap);
        $("#modaljmlhtl").val(jml_hotel);

        })

        // on modal hide
        $('#modaledit').on('hide.bs.modal', function() {
        $("#edit-form").removeAttr("action");
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#edit-form").trigger("reset");
        })
        })
</script>

@endsection