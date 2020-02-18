@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'View a Content')

@section('main-content')

	<div class="row">
		<div class="col-md-8">

			<h5>Deskripsi gejala: <h5>
			<p class="lead">{!! $gejala->deskripsi_gejala !!}</p>

		</div>

		<div class="col-md-4">
			<div class="well">

				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($gejala->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j, Y h:ia', strtotime($gejala->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('gejalaEdit', 'Edit', array($gejala->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
            {!! Form::open(['route' => ['gejalaDelete', $gejala->id], 'method' => 'DELETE']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}
					</div>
				</div>

				<div class="row" style="margin-top:10px;">
					<div class="col-md-12">
						{{ Html::linkRoute('gejalaIndeks', '<< See All Posts', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection
