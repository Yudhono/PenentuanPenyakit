@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'Management Penyakit')

@section('css')

<link href="{{ asset('/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/css/jquery.dataTables_themeroller.css') }}" rel="stylesheet" type="text/css"/>

@endsection

@section('main-content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">All Data</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
  <table id="example" class="table table-bordered table-hover dataTable">
      <thead>
          <tr>
              <th>id</th>
              <th>nama penyakit</th>
              <th>deskripsi</th>
              <th>action</th>
          </tr>
      </thead>
      <tfoot>
          <tr>
            <th>id</th>
            <th>nama penyakit</th>
            <th>deskripsi</th>
            <th>action</th>
          </tr>
      </tfoot>
      <tbody>
        @foreach($penyakits as $penyakit)
          <tr>
              <td>{{ $penyakit->id }}</td>
              <td>{{ $penyakit->nama_penyakit }}</td>
              <td>{{ substr(strip_tags($penyakit->deskripsi), 0, 50) }}{{ strlen(strip_tags($penyakit->deskripsi)) > 50 ? "..." : "" }}</td>
              <td>
                {!! Form::open(['route' => ['penyakitDelete', $penyakit->id], 'method' => 'DELETE']) !!}
                <a href="{{ route('penyakitLihat', $penyakit->id) }}" class="btn btn-primary btn-sm">View</a>
                <a href="{{ route('penyakitEdit', $penyakit->id) }}" class="btn btn-success btn-sm">Edit</a>
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
</div>
@endsection

@section('js')
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.js') }}"></script>

<script>
$(function () {
  $('#example').DataTable()

})
</script>

@endsection
