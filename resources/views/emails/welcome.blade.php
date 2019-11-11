@extends('beautymail::templates.widgets')
<?php
//geting record from sent table
$data=DB::table('sents')->latest('id')->first();
?>
@section('content')

	@include('beautymail::templates.widgets.articleStart')
		@if(!empty($data))
		  {{$data->message}}
		@else

		<h4 class="secondary"><strong>Hello World</strong></h4>
		<p>This is a test</p>

		@endif

	@include('beautymail::templates.widgets.articleEnd')


	

@stop