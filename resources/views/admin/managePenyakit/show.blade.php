@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'View a Content')

@section('main-content')

	<div class="row">
		<div class="col-md-8">
			<h5>Nama Penyakit:<h5>
			<p class="lead">{{ $penyakit->nama_penyakit }}</p>

			<h5>Deskripsi Penyakit: <h5>
			<p class="lead">{!! $penyakit->deskripsi !!}</p>
			<br>
			<h5>Gejala: <h5>
				@foreach($penyakit_has_gejala as $key => $value)
						<p>{{$key = $key + 1}}. {{ $value->deskripsi_gejala }}</p><br>
				@endforeach
		</div>

		<div class="col-md-4">
			<div class="well">

				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($penyakit->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j, Y h:ia', strtotime($penyakit->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('penyakitEdit', 'Edit', array($penyakit->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
            {!! Form::open(['route' => ['penyakitDelete', $penyakit->id], 'method' => 'DELETE']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

            {!! Form::close() !!}
					</div>
				</div>

				<div class="row" style="margin-top:10px;">
					<div class="col-md-12">
						{{ Html::linkRoute('penyakitIndeks', '<< See All Posts', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection
