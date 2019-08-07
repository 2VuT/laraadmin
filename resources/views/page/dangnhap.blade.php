@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{ route('index') }}">Home</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('login')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					@if(Session::has('flag'))
						<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" required>
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" name="password" required>
						</div>
						<div>
							<div id="btt" class="form-block">
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
							<div id="btt1">
								<div>
									<p id="pt">Hoặc bạn có thể đăng nhập bằng</p>
								</div>
								<div>
									<a id="fb" href="redirect"><img src="source/image/facebook.jpg" alt="" width="200px" height="40px"></a>
								</div>
								<div>
									<a id="gg" href="redirect"><img src="source/image/google.png" alt="" width="200px" height="40px"></a>
								</div>
							</div>
							

						</div>
						
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection