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
                                <h2 style="margin-top:0px">Data Transaksi Destinasi</h2>
                            </div>
                            {{-- <div class="col-sm-2">
                                                                <a type="button" class="btn btn-primary float-right"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModal"><i
                                                                                class="fa fa-plus-square"
                                                                                style="padding-right:10px;"></i>Tambah
                                                                        Data</a>
                                                        </div>
                                                        <div class="col-sm-5">
                                                                <form method="GET" action="/pengunjung">
                                                                        <div class="form-group" style="">
                                                                                <input type="text" name="cari"
                                                                                        class="form-control"
                                                                                        style="width :45%; display: unset;"
                                                                                        placeholder="Search..." value="{{ request('cari') }}"
                            required>
                            <select class="form-control" id="cbstatus" name="filter" required
                                style="width :25%; display: unset;">
                                <option value="" selected disabled>-
                                    Filter -</option>
                                <option value="kode" @if (request('filter')=='kode' ) selected="selected" @endif>Kode
                                </option>
                                <option value="destinasi" @if (request('filter')=='destinasi' ) selected="selected"
                                    @endif>
                                    Destinasi</option>
                            </select>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            <a href="/transaksi"><button type="button" class="btn btn-success"><i
                                        class="fa fa-refresh"></i></button></a>
                        </div>
                        </form>
                    </div> --}}
                </div>
            </div>


            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Id Transaksi</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datapengunjung as $pengunjung)
                        <tr class="data-row" id="detail-item" data-item-id="{{ $pengunjung->id }}">
                            <td class="">{{ $pengunjung->nama }}</td>
                            <td class="">
                                {{ $pengunjung->email }}</td>
                            <td class="">
                                {{ $pengunjung->telepon }}</td>
                            <td class="id_trx">{{ $pengunjung->id_transaksi }}</td>
                            {{-- <td><button type="button"
                                                                                        class="btn btn-warning btn-sm"
                                                                                        id="edit-item">Edit</button>
                                                                                <a href="/transaksi/{{ $pengunjung->id }}/delete"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin mau hapus data?')">Hapus</a>
                            </td> --}}
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
                <form action="/transaksi/create" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="tbkode">Kode</label>
                        <input name="kode" type="text" class="form-control" id="tbkode" placeholder="Masukkan Kode"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="tbdestinasi">Destinasi </label>
                        <input name="destinasi" type="text" class="form-control" id="tbndestinasi"
                            placeholder="Masukkan Destinasi" required>
                    </div>
                    <div class="form-group">
                        <label for="tbdurasi">Durasi (Hari)</label>
                        <input name="durasi" type="number" class="form-control" id="tbdurasi"
                            placeholder="Masukkan Durasi" required>
                    </div>
                    <div class="form-group">
                        <label for="tbinap">Inap (Malam)</label>
                        <input name="inap" type="number" class="form-control" id="tbinap" placeholder="Masukkan Inap"
                            required>
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
                <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="tbkode">Paket Destinasi</label>
                    <input name="kode" type="text" class="form-control" id="modalpaket">
                </div>
                <div class="form-group col-md-4">
                    <label for="tbdestinasi">Harga Bus Medium </label>
                    <input name="destinasi" type="text" class="form-control" id="modalbus" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="tbdestinasi">Harga Bus Big</label>
                    <input name="destinasi" type="text" class="form-control" id="modalbus1" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="tbdestinasi">Harga Bus SBig </label>
                    <input name="destinasi" type="text" class="form-control" id="modalbus2" readonly>
                </div>
                <div class="form-group">
                    <label for="tbdurasi">Nama Hotel</label>
                    <input name="durasi" type="text" class="form-control" id="modalhotel" readonly>
                </div>
                <div class="form-group">
                    <label for="tbinap">Makan (Kali)</label>
                    <input name="inap" type="text" class="form-control" id="modalmakan" readonly>
                </div>
                <div class="form-group">
                    <label for="tbjmlhtl">Budget Makan (Ribu)</label>
                    <input name="jml_hotel" type="number" class="form-control" id="modalbudgetmakan" readonly>
                </div>
                <div class="form-group">
                    <label for="tbjmlhtl">Snack (Kali)</label>
                    <input name="jml_hotel" type="number" class="form-control" id="modalsnack" readonly>
                </div>
                <div class="form-group">
                    <label for="tbjmlhtl">Budget Snack (Ribu)</label>
                    <input name="jml_hotel" type="number" class="form-control" id="modalbudgetsnack" readonly>
                </div>
                <div class="form-group">
                    <label for="tbjmlhtl">Jumlah Pendamping (Orang)</label>
                    <input name="jml_hotel" type="number" class="form-control" id="modaljumlahpendamping" readonly>
                </div>
                <div class="form-group">
                    <label for="tbjmlhtl">Jumlah Peserta (Orang)</label>
                    <input name="jml_hotel" type="number" class="form-control" id="modaljumlahpeserta" readonly>
                </div>
                <div class="form-group">
                    <label for="tbjmlhtl">Hasil Hitung (Rp.)</label>
                    <input name="jml_hotel" type="number" class="form-control" id="modalhasilhitung" readonly>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
<script>
    $(document).ready(function () {
        /**
         * for showing edit item popup
         */

        var id_paket, id_bus, id_hotel, makan, budget_makan, snack, budget_snack, jumlah_pendamping,
            jumlah_peserta, hasil_hitung;
            var harga_medium,harga_big,harga_sbig;
        $(document).on('click', "#detail-item", function () {
            $(this).addClass(
                'detail-item-trigger-clicked'
                ); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.


            var options = {
                'backdrop': 'static'
            };
            $('#modaledit').modal(options)
        })

        // on modal show
        $('#modaledit').on('show.bs.modal', function () {
            var el = $(".detail-item-trigger-clicked"); // See how its usefull right here? 
            var row = el.closest(".data-row");
            var id = el.data('item-id');
            var id_trx = row.children(".id_trx").text();

            $.ajax({
                type: 'get',
                url: 'http://dharmawangsatour.test/transaksi/detail',
                data: {
                    'id': id_trx
                },
                dataType: 'json', //return data will be json
                success: function (data) {
                    console.log(data);
                    // console.log(data.hasil_hitung);        
                    id_paket = data[0].id_paket + ' - ' + data[1].destinasi;
                    harga_medium = data[1].harga_medium;
                    harga_big = data[1].harga_big;
                    harga_sbig = data[1].harga_sbig;
                    id_hotel = data[1].nama_hotel;
                    makan = data[0].makan;
                    budget_makan = data[0].budget_makan;
                    snack = data[0].snack;
                    budget_snack = data[0].budget_snack;
                    jumlah_pendamping = data[0].jumlah_pendamping;
                    jumlah_peserta = data[0].jumlah_peserta;
                    hasil_hitung = data[0].hasil_hitung;
                    $("#modalpaket").val(id_paket);
                    $("#modalbus").val(harga_medium);
                    $("#modalbus1").val(harga_big);
                    $("#modalbus2").val(harga_sbig);
                    $("#modalhotel").val(id_hotel);
                    $("#modalmakan").val(makan);
                    $("#modalbudgetmakan").val(budget_makan);
                    $("#modalsnack").val(snack);
                    $("#modalbudgetsnack").val(budget_snack);
                    $("#modaljumlahpendamping").val(jumlah_pendamping);
                    $("#modaljumlahpeserta").val(jumlah_peserta);
                    $("#modalhasilhitung").val(hasil_hitung);
                },
                error: function () {

                }
            });
            // fill the data in the input fields

            // $("#modalinap").val(inap);
            // $("#modaljmlhtl").val(jml_hotel);

        })

        // on modal hide
        $('#modaledit').on('hide.bs.modal', function () {
            $("#edit-form").removeAttr("action");
            $('.detail-item-trigger-clicked').removeClass('detail-item-trigger-clicked')
            $("#edit-form").trigger("reset");
        })
    })

</script>

@endsection
