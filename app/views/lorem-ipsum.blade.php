@extends('master') 

@section('title')

  Lorem Ipsum Generator

@stop

@section('content')
  
  <div class='container'>
  
    <a href="/">Home</a>

      <h1>Lorem Ipsum Generator</h1>

        <h3>How many paragraphs do you want?</h3>

          {{Form::open(array('url' => '/lorem-ipsum', 'method' => 'POST'));}}
          {{Form::label('pNo', 'Paragraphs? (Max 99)');}}
          {{Form::text('pNo', '5' );}}
          </br>
          {{Form::submit('Generate');}}
          {{Form::close();}}
          <br/>

  </div>
  
  <div class='container'>
  
    @if (isset($loremIpsumText))

      <p>{{ $loremIpsumText }}</p>

    @endif

  </div>

@stop