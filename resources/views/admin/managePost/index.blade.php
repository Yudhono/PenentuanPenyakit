@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'Management Post')

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
              <th>Judul</th>
              <th>Kategori</th>
              <th>Konten</th>
              <th>Gambar</th>
              <th>Penulis</th>
              <th>Ditulis Pada</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tfoot>
          <tr>
            <th>id</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Konten</th>
            <th>Gambar</th>
            <th>Penulis</th>
            <th>Ditulis Pada</th>
            <th>Aksi</th>
          </tr>
      </tfoot>
      <tbody>
        @foreach($nama as $nam)
          <tr>
              <td>{{ $nam['idnya_posts'] }}</td>
              <td>{{ $nam['title'] }}</td>
              <td>{{ $nam['nama_category'] }}</td>
              <td>{{ substr(strip_tags($nam['body']), 0, 50) }}{{ strlen(strip_tags($nam['body'])) > 50 ? "..." : "" }}</td>
              <td><img src="{{ asset('/images/posts/'.$nam['image'])  }}" style="max-height:100px;max-width:100px;margin-top:5px;"></td>
              <td>{{ $nam['created_by'] }}</td>
              <td>{{ $nam['updated_at'] }}</td>
              <td>
                {!! Form::open(['route' => ['postDelete', $nam['idnya_posts']], 'method' => 'DELETE']) !!}
                <a href="{{ route('postLihat', $nam['idnya_posts']) }}" class="btn btn-primary btn-sm">View</a>
                <a href="{{ route('postEdit', $nam['idnya_posts']) }}" class="btn btn-success btn-sm">Edit</a>
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
