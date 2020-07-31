@extends('Admin.localhost.add')
@section('title', '注册')
@section('sidebar')
	<!-- register -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>REGISTER</h3>
			</div>
			<div class="register">
				<div class="row">
					<form class="col s12">
						<div class="input-field">
							<input type="text" class="validate" placeholder="ACCOUNT" required>
						</div>
						<div class="input-field">
							<input type="email" placeholder="Email" class="validate" required>
						</div>
						<div class="input-field">
							<input type="password" placeholder="PASSWORD" class="validate" required>
						</div>
						<h6>Existing account, please click <a href="{{url('/user/login')}}">login</a>！</h6>
						<div class="btn button-default">REGISTER</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end register -->
	@endsection