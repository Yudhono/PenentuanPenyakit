@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'Management Users and Roles')

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
        <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="pull-left">
                  <h2> Show User</h2>
              </div>
              <div class="pull-right">
                  <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
              </div>
          </div>
        </div>


        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Name:</strong>
                  {{ $user->name }}
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Email:</strong>
                  {{ $user->email }}
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Roles:</strong>
                  @if(!empty($user->getRoleNames()))
                      @foreach($user->getRoleNames() as $v)
                          <label class="badge badge-success">{{ $v }}</label>
                      @endforeach
                  @endif
              </div>
          </div>
        </div>
</div>
</div>
@endsection

@section('js')
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.js') }}"></script>

@endsection
