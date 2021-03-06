@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'Input Penyakit dan Gejalanya')

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
                <h2>Masukkan Penyakit dan Gejala yang Dimiliki</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="#"> Back</a>
            </div>
        </div>
    </div>


    {!! Form::open(array('route' => 'simpan','method'=>'POST')) !!}
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              {{ Form::label('penyakit_id', 'nama penyakit:') }}
      				<select class="form-control" name="penyakit_id">
      					@foreach($penyakits as $penyakit)
                    <option value="{{ $penyakit->id }}">{{ $penyakit->nama_penyakit }}</option>
                @endforeach

      				</select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gejala Unggas:</strong>
                <br/>
                @foreach($unggas as $ung)
                    <label>{{ Form::checkbox('gejala_id[]', $ung->id, false, array('class' => 'name')) }}
                    {{ substr(strip_tags($ung->deskripsi_gejala), 0, 100) }}</label>
                <br/>
                @endforeach
            </div>
            <div class="form-group">
                <strong>Gejala Ruminansia:</strong>
                <br/>
                @foreach($ruminansia as $rum)
                    <label>{{ Form::checkbox('gejala_id[]', $rum->id, false, array('class' => 'name')) }}
                    {{ substr(strip_tags($rum->deskripsi_gejala), 0, 100) }}</label>
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
