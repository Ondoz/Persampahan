@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tabungan</div>
                <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
                    Add Tabungan
                </button>
            </div>

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
        </div>
    </div>
</div>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tabungan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form action="{{route('tabungan.store')}}"  method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Keterangan sampah" required>
                </div>
                <div id="kredit">
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
