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
                <h2>Coba penentuan penyakit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="#"> Back</a>
            </div>
        </div>
    </div>


    {!! Form::open(array('route' => 'proses','method'=>'POST')) !!}
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gejala:</strong>
                <br/>
                @foreach($gejalas as $gejala)
                    <label>{{ Form::checkbox('gejala_id[]', $gejala->deskripsi_gejala, false, array('class' => 'name')) }}
                    {{ substr(strip_tags($gejala->deskripsi_gejala), 0, 100) }}</label>
                <br/>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
</div>
@endsection

@section('js')
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.js') }}"></script>
{!! Html::script('js/select2.min.js') !!}
@endsection
