@extends('vendor.adminlte.layouts.app')

@section('contentheader_title', '')

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
			<h1>Buat Post Baru</h1>
			<hr>
			{!! Form::open(array('route' => 'postInput', 'data-parsley-validate' => '', 'files' => true)) !!}

			{{ Form::label('title', 'Judul Post:') }}
			{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

			{{ Form::label('category_id', 'Pilih Ketegori:') }}
			<select class="form-control" name="category_id">
				@foreach($ids as $aidi)
						<option value="{{ $aidi->id }}">{{ $aidi->name }}</option>
				@endforeach

			</select>

			{{ Form::label('created_by', 'Penulis:') }}
			{{ Form::text('created_by', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

			{{ Form::label('image', 'Upload Gambar di sini') }}
			{{ Form::file('image') }}

			{{ Form::label('body', "Konten Post:") }}
			{{ Form::textarea('body', null, array('class' => 'form-control')) }}

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
