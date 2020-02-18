@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'Update a Content')

@section('css')

	{!! Html::style('css/parsley.css') !!}
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code',
			menubar: false
		});
	</script>

@endsection

@section('main-content')

<div class="row">
		{!! Form::model($gejala, ['route' => ['gejalaUpdate', $gejala->id], 'files' => true, 'method' => 'POST']) !!}
		<div class="col-md-8">
			{{ Form::label('deskripsi_gejala', 'Deskripsi Gejala:') }}
			{{ Form::text('deskripsi_gejala', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

			{{ Form::label('jenis_binatang', 'Jenis Binatang:') }}
				<select class="form-control" name="jenis_binatang">
          <option value="unggas">Unggas</option>
					<option value="ruminansia">Ruminansia</option>
				</select>
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($gejala->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($gejala->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
            {!! Html::linkRoute('gejalaLihat', 'Cancel', array($gejala->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					</div>
				</div>

			</div>
		</div>
		{!! Form::close() !!}
	</div>

@endsection

@section('js')

	{!! Html::script('js/parsley.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>

@endsection
