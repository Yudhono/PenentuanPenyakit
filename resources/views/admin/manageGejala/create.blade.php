@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', 'manage gejala')

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
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Gejala</h1>
			<hr>
			{!! Form::open(array('route' => 'gejalaInput', 'data-parsley-validate' => '')) !!}

			{{ Form::label('deskripsi_gejala', 'Deskripsi Gejala:') }}
			{{ Form::text('deskripsi_gejala', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

			{{ Form::label('jenis_binatang', 'Jenis Binatang:') }}
				<select class="form-control" name="jenis_binatang">
          <option value="unggas">Unggas</option>
					<option value="ruminansia">Ruminansia</option>
				</select>

				{{ Form::submit('Create New', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection

@section('js')

	{!! Html::script('js/parsley.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>

@endsection
