<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Daftar Member</title>
	<link rel="stylesheet" href="{{asset('template_login/https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css')}}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('template_login/css/my-login.css')}}">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="/img/logo.jpg" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Daftar Akun Member</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="nama_member">Nama </label>
									<input id="nama_member" type="email" class="form-control" name="nama_member" value="">
									<div class="invalid-feedback">
									</div>
								</div>
                                <form method="POST" action="{{url('/registerMember')}}">
                                    @csrf
                                <div class="modal-body">
                                <div class="form-group">
									<label for="ttl">Tanggal Lahir </label>
									<input id="ttl" type="date" class="form-control" name="ttl" value="">
									<div class="invalid-feedback">
									</div>
								</div>
                                <div class="form-group">
                                <label>Jenis Kelamin</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jk" id="jk"
                                                value="laki-laki">
                                            <label class="form-check-label" for="jk">Laki - Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jk" id="jk"
                                                value="perempuan">
                                            <label class="form-check-label" for="jk">Perempuan</label>
                                        </div>
									</div>
								</div>
                                <div class="form-group">
									<label for="no_hp">No Hp </label>
									<input id="no_hp" type="email" class="form-control" name="no_hp" value=""  >
									<div class="invalid-feedback">
									</div>
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input id="email" type="email" class="form-control" name="email" value="">
									<div class="invalid-feedback">
									</div>
								</div>
                                <div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" value="">
									<div class="invalid-feedback">
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Daftar
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2017 &mdash; Your Company 
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('template_login/https://code.jquery.com/jquery-3.3.1.slim.min.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="{{asset('template_login/https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')}}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="{{asset('template_login/https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')}}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="{{asset('template_login/js/my-login.js"></script>
</body>
</html>
