@extends('layouts.admin_layouts')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Acction</h3>
            </div>
            <div class="box-header">
                <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
                    Add Sampah
                </button>
            </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="sampah-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>Satuan</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php $i= 1?>
                @forelse ($sampah as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ucfirst($item->nama)}}</td>
                        <td>Rp. {{$item->harga}}</td>
                        <td>{{$item->satuan}}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm editsampah" data-toggle="modal" data-target="#modaledit" data-uuid="{{ $item->uuid }}">Edit</button>
                            <a href="{{route('sampah')}}" type="button" class="btn btn-danger btn-sm deletesampah" onclick='alert("I am an alert box!");' data-id="{{ $item->id }}">Hapus</a>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td class="text-center" colspan="4">
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
          <h4 class="modal-title">Add Sampah</h4>
        </div>
        <form action="{{route('sampah.store')}}"  method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama">Nama Sampah</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama sampah" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga Sampah</label>
                    <input type="text" class="form-control" name="harga" placeholder="Harga sampah" required>
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
          <h4 class="modal-title">Edit sampah</h4>
        </div>
        <form action="{{route('sampah.update')}}"  method="POST">
            @csrf
            {{-- {{ method_field('PATCH') }} --}}
            <input type="hidden" value="" name="id" id="id">
            <div class="modal-body">
                <div class="form-group">
                    <label for="namaketegori">Nama sampah</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama sampah" required>
                </div>
                <div class="form-group">
                    <label for="namaketegori">Harga Sampah</label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga sampah" required>
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

        $('.deletesampah').click(function(){
            var $id = $(this).attr('data-id');
            // console.log($id);

            $.ajax({
                type: "POST",
                url: "{{route('sampah.delete')}}",
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
