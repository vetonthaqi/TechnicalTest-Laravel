@extends('layouts.master')

@section('head')
	@parent
	<title>Users</title>
@stop

@section('content')

@foreach($users as $user)
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="clearfix">
				<h3 class="panel-title pull-left"> User's ID: {{$user->id}} </h3>
				<a id="{{ $user->id }}" href="#" data-toggle="modal" data-target="#user_delete" class="btn btn-danger btn-xs pull-right delete_user">Delete</a>
				<a class="btn btn-small btn-info pull-right btn-xs" href="#">Edit this User</a>
			</div>
		</div>
		
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<td>Name</td>
					<td>Address</td>
					<td>Email</td>
					<td>Created Date</td>
					<td>Is Admin</td>
					
					
				</tr>
			</thead>
			
			<tbody>
				<tr>
					<td> {{$user->client_name}} </td>
					<td> {{$user->address}} </td>
					<td> {{$user->email}} </td>
					<td> {{$user->created_at}} </td>
					<td> {{$user->isAdmin}} </td>
					
				</tr>
			</tbody>

		</table>
	</div>
@endforeach

@if(Auth::check() && Auth::user()->isAdmin())

	<div class="modal fade" id="user_delete" tabindex="-1" role="dialog" aria-hidden="true">
		<div class ="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title">Delete User</h4>
				</div>
				<div class="modal-body">
					<h3>Are you sure you want to delete this user?</h3>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a href="#" type="button" class="btn btn-primary" id="btn_delete_user">Delete</a>
				</div>
			</div>
		</div>
	</div>

@endif

@stop

@section('javascript')
	@parent
	<script type="text/javascript" src="/js/app.js"></script>
	@if(Session::has('modal'))
		<script type="text/javascript">
			$("{{Session::get('modal')}}").modal('show');
		</script>
	@endif
@stop
