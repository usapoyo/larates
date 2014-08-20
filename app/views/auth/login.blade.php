@extends('layout')

@section('title')
	LOGIN PAGE
@stop

@section('content')
	<form action="<?= URL::route('login'); ?>" method="post" role="form">
		<div class="form-group">
		    <label for="exampleInputEmail1">Email:
		    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"></label>
		</div>
		<div class="form-group">
		    <label for="exmapleInputPassword1">Password:
		    <input type="password" name="password" class="form-control" id="exmapleInputPassword1" placeholder="Password"></label>
		</div>
		    <button type="submit" class="btn btn-default">Login</button>
	</form>
@stop