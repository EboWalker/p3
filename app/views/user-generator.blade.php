@extends('master')

@section('title')

	Random User Generator

@stop

@section('content')
  
  	<div class='container'>
  
		<a href="/">Home</a>

		<h1>Random User Generator</h1><br/>

			{{Form::open(array('url' => '/user-generator', 'method' => 'POST'));}}
			{{Form::label('users', 'How many users? (Max: 99)');}}
			{{Form::text('users', '5');}}
			<br>	
			Include... 
			<br>
			{{ Form::checkbox('birthday', 'birthday', Input::get('birthday'), array('id'=>'birthday')); }}
			{{ Form::label('birthday', 'Birthdate'); }}
			<br>
			<br>
			{{Form::submit('Generate!');}}
			{{Form::close();}}
			<br/>

	</div>

	
	<div class='container'>
	
		@if (isset($checkbox))
			
			@foreach ($checkbox as $checked)
				
				<b> {{ $checked['name'] }} </b></br>
				<i> {{ $checked['birthday'] }} </i></br>	
				<br/>

			@endforeach
		
		@endif
	
	</div>
	
		
@stop