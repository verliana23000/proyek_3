<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login Admin Klinik</title>
	<link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css')}}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('template_login/css/my-login.css')}}">
</head>

<body class="my-login-page">
                @if(\Session::has('alert'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h6><i class="fas fa-ban"></i><b> Peringatan !</b></h6>
                      {{Session::get('alert')}}
                    </div>
                  @endif
                  @if(\Session::has('alert-success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h6><i class="fas fa-sign-out-alt"></i><b> Success!!</b></h6>
                        {{Session::get('alert-success')}}
                    </div>
                  @endif
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<div class="modal-body">
                  <form action="{{ url('/loginAdminPost') }}" method="post" class="form">
                  {{ csrf_field() }}

				  	<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email">
					</div>
                  <div class="form-group">
                    <label> Password </label>
                      <input type="password" class="form-control" name="password" />
                  </div><br>
				<div class="mt-4 text-center">
					Don't have an account? <a href="register.html">Create One</a>
				</div>
      <div class="form-group m-0">
        <button type="submit" class="btn btn-primary btn-block">LOGIN
		<!-- <input id="submit" type="submit" name="submit" value="LOGIN" /> -->
        </button>
		</div>
		</form>

      
    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('https://code.jquery.com/jquery-3.3.1.slim.min.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')}}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')}}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="{{asset('js/my-login.js')}}"></script>
</body>
</html>
