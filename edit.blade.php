@extends('layout')
@section('left-title')
	Edit Entry
@endsection

@section('content-left')
	{{ Form::open(array('method' => 'PATCH', 'route' => array('peas.update', $model->id))) }}

	@foreach ($columns as $column)
		{{ Form::label($column, $column) }}
		{{ Form::text($column, $model->$column) }}<br />
	@endforeach

	{{ Form::submit('Save', ['name' => 'submit']) }}
	{{ Form::close() }}
@endsection

@section('right-title')
	Add Entry
@endsection

@section('content-right')
    {{ $model->modelCreateForm() }}
@endsection
