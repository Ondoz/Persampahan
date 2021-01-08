@extends('layouts.admin_layouts')
@section('content')
@include('sweetalert::alert')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Acction</h3>
            </div>
            <table class="table table-bordered">
                <tr>
                    <td style="width:20%">Nama</td>
                    <td style="width:20%">: {{$data->name}}</td>
                    <td style="width:20%">Alamat</td>
                    <td style="width:20%">: {{$data->userdetails->address}}</td>
                </tr>
                <tr>
                    <td style="width:20%">Email</td>
                    <td style="width:20%">: {{$data->email}}</td>
                    <td style="width:20%">TTL</td>
                    <td style="width:20%">: {{$data->userdetails->ttl}}</td>
                </tr>
            </table>
        <div class="box-header">
            <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
                Add Tabungan
            </button>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <table id="sampah-table" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Keterangan Transaksi</th>
                <th>Debet</th>
                <th>Kredit</th>
                <th>Saldo</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $i= 1;
                    ?>
                @forelse ($arr as $key => $item)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{date('d M Y H:i:s', strtotime($item['tanggal']))}}</td>
                    <td>{{ucfirst($item['keterangan'])}}</td>
                    <td>Rp. {{ number_format($item['debet'],0)}}  </td>
                    <td>Rp. {{ number_format($item['kredit'],0)}}</td>
                    <td>Rp. {{ $item['saldo'] }}</td>
                        <td>
                            <a href="{{route('nasabah.datatransaksi', ['nasabah' => $data->id])}}" type="button" class="btn btn-danger btn-sm deletetransaksi" onclick='alert("I am an alert box!");' data-uuid="{{ $item['uuid'] }}">Hapus</a>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td class="text-center" colspan="7">
                            tidak ada data
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tabungan</h4>
        </div>
        <form action="{{route('nasabah.datatransaksi.store', ['nasabah' => $data->id])}}"  method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Keterangan sampah" required>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control" name="type" id="type" required>
                        <option name="" id="">Type Tabungan</option>
                        <option value="0">Debet</option>
                        @if (count($arr) > 0)
                            <option value="1">Kredit</option>
                        @endif
                    </select>
                </div>
                <div class="debet" id="debet" style="display:none;">
                    <div class="form-group">
                        <label for="type">Jenis Sampah</label>
                        <select class="form-control" name="jenis_sampah" id="jenis_sampah">
                            <option name="" id="">Pilih Jenis Sampah</option>
                            @foreach ($sampah as $item)
                                <option  data-value="{{$item->harga}}" data-satuan="{{$item->satuan}}" value="{{$item->nama}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Harga Satuan </label>
                                <input type="number" class="form-control" name="harga_satuan" placeholder="" id="harga_satuan" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Type Satuan</label>
                                <input type="text" class="form-control" name="type_satuan" placeholder="" id="type_satuan"  readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Berat Sampah </label>
                        <input type="number" class="form-control" name="berat_sampah" placeholder="Berat Sampah" >
                    </div>
                </div>

                <div id="kredit" style="display:none;">
                    <div class="form-group">
                        <label for="">Saldo</label>
                        <input type="number" class="form-control" name="kredit" placeholder="Saldo" >
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection
@section('js')
<script>

    $('#type').on('change', function(){
        var $id = $('#type').val();
        if($id == '0'){
            document.getElementById('debet').style.display = "block";
            document.getElementById('kredit').style.display = "none";
        } else{
            document.getElementById('debet').style.display = "none";
            document.getElementById('kredit').style.display = "block";
        }
    });

    $('#jenis_sampah').on('change', function(){
        var $harga = $('option:selected',this).data("value");
        var $satuan = $('option:selected',this).data("satuan");
        var $id = $('#jenis_sampah').val();
        $('#harga_satuan').val($harga);
        $('#type_satuan').val($satuan);
    });

    $(function () {
        $('#sampah-table').DataTable()
    });

      $('.editsampah').click( function(){
            var $uuid = $(this).attr('data-uuid');
            $.ajax({
            type: "POST",
            url: "{{route('ajax_sampah')}}",
            data: {
                _token: '{{csrf_token()}}',
                uuid: $uuid
            },
            dataType: "JSON",
            success: function (data) {
                    $('#id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#harga').val(data.harga);
                }
            });
        });

        $('.deletetransaksi').click(function(){
            var $uuid = $(this).attr('data-uuid');
            // console.log($id);

            $.ajax({
                type: "POST",
                url: "{{route('ajax_datatransaksi_destroy')}}",
                data: {
                    _token: '{{csrf_token()}}',
                    uuid: $uuid
                },
                success: function(e){

                }
            })
        });

</script>
@endsection
