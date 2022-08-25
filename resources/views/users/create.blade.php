<x-layout title="New User">
<form action="{{route('users.store')}}" method="post">
		@csrf
		<div class="form-group">
			<label for="name" class="form-label">Username</label>
			<input type="text" name="name" id="name" class="form-control">
		</div>

		<div class="form-group">
			<label for="email" class="form-label">E-mail</label>
			<input type="email" name="email" id="email" class="form-control">
		</div>

		<div class="form-group">
			<label for="password" class="form-label">Password</label>
			<input type="password" name="password" id="password" class="form-control">
		</div>

		<div class="form-group">
			<label for="password_confirmation" class="form-label">Confirm password</label>
			<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
		</div>
		<button class="btn btn-primary mt-3">Register</button>
	</form>
</x-layout>
