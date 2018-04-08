@if ( $errors->any() )
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>		
	</div>
@endif 

<label for="">Имя пользователя</label>
<input type="text" class="form-control" name="name" placeholder="Имя" value="@if (old('name')){{old('name')}} @else {{$user->name or ""}} @endif" required>

<label for="">Электронная почта</label>
<input type="text" class="form-control" name="email" placeholder="E-mail" value="@if (old('email')){{old('email')}} @else {{$user->email or ""}} @endif" required>

<label for="">Пароль</label>
<input type="password" class="form-control" name="password">

<label for="">Подтверждение</label>
<input type="password" class="form-control" name="password_confirmation">

<label for="">Права</label>
<select class="form-control" name="role">
	@if (isset($user->role))
	<option value="admin" @if ($user->role == "admin") selected @endif />Admin</option>
	<option value="user" @if ($user->role == "user") selected @endif />User</option>
	<option value="moderator" @if ($user->role == "moderator") selected @endif />Moderator</option>
	@else
	<option value="0">Auth</option>
	@endif
</select>

<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">