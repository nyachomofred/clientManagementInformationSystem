@extends('beautymail::templates.widgets')

@section('content')

	@include('beautymail::templates.widgets.articleStart')
		
       <h2>Subject: {{$subject}}</h2>
	   <p>{{$messagebody}}</p>
	@include('beautymail::templates.widgets.articleEnd')
@stop