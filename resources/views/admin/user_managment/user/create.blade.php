@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
	@component('admin.components.breadcrumb')

		@slot('title') Создание пользователей @endslot
		@slot('parent') Главная @endslot
		@slot('active') Пользователи @endslot

	@endcomponent

	<hr />

	<form class="form-gorizontal" action="{{route('admin.user_managment.user.store')}}" method="post">
		{{ csrf_field() }}
		@include('admin.user_managment.user.partials.form');
		<input type="hidden" name="created_by" value="{{Auth::id()}}">
	</form>

</div>

@endsection