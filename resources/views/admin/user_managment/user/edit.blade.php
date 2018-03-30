@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
	@component('admin.components.breadcrumb')

		@slot('title') Редактирование ользователя @endslot
		@slot('parent') Главная @endslot
		@slot('active') Пользователи @endslot

	@endcomponent

	<hr />

	<form class="form-gorizontal" action="{{route('admin.user_managment.user.update', $user)}}" method="post">
		{{ method_field('PUT') }}
		{{ csrf_field() }}
		@include('admin.user_managment.user.partials.form');
	
	</form>

</div>

@endsection