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
                    Add daerah
                </button>
            </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="daerah-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Slug</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php $i= 1?>
                @forelse ($daerah as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ucfirst($item->name)}}</td>
                        <td>{{$item->slug}}</td>
                        <td>
                            @if ($item->status === 1)
                                Aktif
                            @else
                                Tidak Aktif
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm editdaerah" data-toggle="modal" data-target="#modaledit" data-uuid="{{ $item->uuid }}">Edit</button>
                            <a href="{{route('daerah')}}" type="button" class="btn btn-danger btn-sm deletedaerah" onclick='alert("I am an alert box!");' data-id="{{ $item->id }}">Hapus</a>
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
          <h4 class="modal-title">Add daerah</h4>
        </div>
        <form action="{{route('daerah.store')}}"  method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="namaketegori">Nama Daerah</label>
                    <input type="text" class="form-control" id="namaketegori" name="name" placeholder="Nama Daerah" required>
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
          <h4 class="modal-title">Edit daerah</h4>
        </div>
        <form action="{{route('daerah.update')}}"  method="POST">
            @csrf
            {{-- {{ method_field('PATCH') }} --}}
            <input type="hidden" value="" name="id" id="id">
            <div class="modal-body">
                <div class="form-group">
                    <label for="namaketegori">Nama daerah</label>
                    <input type="text" class="form-control" name="name" id="nama" placeholder="Nama daerah" required>
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
        $('#daerah-table').DataTable()
      });

      $('.editdaerah').click( function(){
            var $uuid = $(this).attr('data-uuid');
            $.ajax({
            type: "POST",
            url: "{{route('ajax_daerahes')}}",
            data: {
                _token: '{{csrf_token()}}',
                uuid: $uuid
            },
            dataType: "JSON",
            success: function (data) {
            console.log(data);

                    $('#id').val(data.id);
                    $('#nama').val(data.name);
                    $('#status').val(data.status);
                }
            });
        });

        $('.deletedaerah').click(function(){
            var $id = $(this).attr('data-id');

            $.ajax({
                type: "POST",
                url: "{{route('daerah.delete')}}",
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
