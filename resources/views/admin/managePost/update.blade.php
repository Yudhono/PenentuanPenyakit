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
		{!! Form::model($post, ['route' => ['postUpdate', $post->id], 'files' => true, 'method' => 'POST']) !!}
		<div class="col-md-8">
			{{ Form::label('title', 'Judul Post:') }}
			{{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('category_id', 'kategori:') }}
				<select id="category_id" class="form-control" name="category_id" value="{{$post->category_id}}">
					<option  disabled selected>{{ $nama }}</option>
					@foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach

				</select>

			{{ Form::label('created_by', 'Penulis:') }}
			{{ Form::text('created_by', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('image', 'Upload Gambar di sini') }}
			{{ Form::file('image', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('body', "Konten Post:", ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('body', null, ['class' => 'form-control']) }}
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
            {!! Html::linkRoute('postIndeks', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
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
