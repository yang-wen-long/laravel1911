@extends('Admin.localhost.add')
@section('title', '登录')
@section('sidebar')

	
	<!-- login -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>LOGIN</h3>
			</div>
			<div class="login">
				<div class="row">
					<form class="col s12">
						<div class="input-field">
							<input type="text" name="user_name" class="validate" placeholder="USERNAME" required>
						</div>
						<div class="input-field">
							<input type="password" name="password" class="validate" placeholder="PASSWORD" required>
						</div>
						<a href="#"><h6>Forgot Password ?</h6></a>
						<input type="submit" value="LOGIN" class="btn button-default">
						<a href="{{url('/user/register')}}" class="btn button-default">registered</a>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end login -->
	
@endsection
	
