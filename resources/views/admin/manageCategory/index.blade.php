@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'Management Categories')

@section('css')

<link href="{{ asset('/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/css/jquery.dataTables_themeroller.css') }}" rel="stylesheet" type="text/css"/>

@endsection

@section('main-content')

<div class="row">
  <div class="col-md-2">
      <button type="button" class="btn btn-lg btn-block btn-primary btn-h1-spacing" data-toggle="modal" data-target="#modal-default">
        Create New
      </button>
		</div>
    <div class="col-md-12">
			<hr>
		</div>
</div>

<!-- create modal -->
      {!! Form::open(array('route' => 'catInput', 'data-parsley-validate' => '')) !!}
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Buat Kategori Baru</h4>
              </div>
              <div class="modal-body">
          			{{ Form::label('name', 'Nama Kategori:') }}
          			{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                {{ Form::submit('Save', array('class' => 'btn btn-success')) }}
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        {!! Form::close() !!}
<!-- end-modal -->

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
              <th>Nama Category</th>
              <th>action</th>
          </tr>
      </thead>
      <tfoot>
          <tr>
            <th>id</th>
            <th>Nama Category</th>
            <th>action</th>
          </tr>
      </tfoot>
      <tbody>
        @foreach($categories as $category)
          <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->name }}</td>
              <td>
                {!! Form::open(['route' => ['catDelete', $category->id], 'method' => 'DELETE']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                <a href="{{ route('catLihat', $category->id) }}" class="btn btn-primary btn-sm">View</a>
                <a href="{{ route('catEdit', $category->id) }}" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default{{$category->id}}">Edit</a>
                {!! Form::close() !!}
                <!-- edit modal -->
                      {!! Form::model($category, ['route' => ['catUpdate', $category->id], 'method' => 'POST']) !!}
                        <div class="modal fade" id="modal-default{{$category->id}}">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Kategori</h4>
                              </div>
                              <div class="modal-body">
                          			{{ Form::label('name', 'Nama Kategori:') }}
                          			{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                {{ Form::submit('Save', array('class' => 'btn btn-success')) }}
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        {!! Form::close() !!}
                <!-- end-modal -->
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
