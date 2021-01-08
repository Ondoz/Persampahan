@extends('layouts.admin_layouts')
@section('content')
@include('sweetalert::alert')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Acction</h3>
            </div>
            <div class="box-header">
                <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
                    Add nasabah
                </button>
            </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="nasabah-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Nama Nasabah</th>
              <th>TTL</th>
              <th>Alamat</th>
              <th>Jumlah Saldo</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php $i= 1?>
                @forelse ($nasabah as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td><a href="{{route('nasabah.datatransaksi', ['nasabah' => $item->id])}}">{{ucfirst($item->name)}}</a></td>
                        @if ($item->userdetails != null)
                            <td>{{$item->userdetails->ttl}}</td>
                            <td>{{$item->userdetails->address}}</td>
                        @else
                            <td>-</td>
                            <td>-</td>
                        @endif
                        <td>Rp. {{number_format($item->datatransaksi->sum('saldo'))}}</td>
                        <td>
                            @if ($item->status === 1)
                                Aktif
                            @else
                                Tidak Aktif
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm editnasabah" data-toggle="modal" data-target="#modaledit" data-id="{{ $item->id }}">Edit</button>
                            <a href="{{route('nasabah')}}" type="button" class="btn btn-danger btn-sm deletenasabah" onclick='alert("I am an alert box!");' data-id="{{ $item->id }}">Hapus</a>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td class="text-center" colspan="6">
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
          <h4 class="modal-title">Add Nasabah</h4>
        </div>
        <form action="{{route('nasabah.store')}}"  method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="namaketegori">Nama Nasabah</label>
                    <input type="text" class="form-control"  name="name" placeholder="Nama Nasabah" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Nasabah</label>
                    <input type="text" class="form-control"  name="email" placeholder="Email Nasabah" required>
                </div>
                <div class="form-group">
                    <label for="ttl">TTL Nasabah</label>
                    <input type="date" class="form-control"  name="ttl" placeholder="TTL Nasabah" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Nasabah</label>
                    <input type="text" class="form-control"  name="alamat" placeholder="Alamat Nasabah" required>
                </div>
                <div class="form-group">
                    <div class="form-group" >
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            <option value="">Pilih Atatus</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
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

  <div class="modal fade" id="modaledit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Nasabah</h4>
        </div>
        <form action="{{route('nasabah.update')}}"  method="POST">
            @csrf
            {{-- {{ method_field('PATCH') }} --}}
            <input type="hidden" value="" name="id" id="id">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama">Nama Nasabah</label>
                    <input type="text" class="form-control" id="nama" name="name" placeholder="Nama Nasabah" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Nasabah</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email Nasabah" required>
                </div>
                <div class="form-group">
                    <label for="ttl">TTL Nasabah</label>
                    <input type="date" class="form-control" id="ttl" name="ttl" placeholder="TTL Nasabah" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Nasabah</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Nasabah" required>
                </div>
                <div class="form-group">
                    <div class="form-group" >
                        <label>Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="">Pilih Atatus</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
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
    $(function () {
        $('#nasabah-table').DataTable()
      });

      $('.editnasabah').click( function(){
            var $id = $(this).attr('data-id');
            $.ajax({
            type: "POST",
            url: "{{route('ajax_nasabah')}}",
            data: {
                _token: '{{csrf_token()}}',
                id: $id
            },
            dataType: "JSON",
            success: function (data) {
            console.log(data);
                    $('#id').val(data.id);
                    $('#nama').val(data.name);
                    $('#email').val(data.email);
                    $('#ttl').val(data.userdetails.ttl);
                    $('#alamat').val(data.userdetails.address);
                    $('#status').val(data.status);
                }
            });
        });

        $('.deletenasabah').click(function(){
            var $id = $(this).attr('data-id');

            $.ajax({
                type: "POST",
                url: "{{route('nasabah.delete')}}",
                data: {
                    _token: '{{csrf_token()}}',
                    id: $id
                },
                success: function(e){

                }
            })
        });



</script>
@endsection
