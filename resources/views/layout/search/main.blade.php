<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/') }}/homepage.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="{{ asset('css/') }}/pesanan.css">
	<link rel="stylesheet" href="{{ asset('css/') }}/profile.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

	<title>Woka: Best Worker for Best Service</title>
	</head>
	<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid ms-3">
			<a class="navbar-brand" style="color: #11BCC7;" href="{{ url('/') }}"> <img src="{{ asset('img/') }}/logo.png" width="20%" alt=""> <b>Woka</b></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- <form class="d-flex">
					<input class="form-control me-2" type="search" placeholder="Temukan Jasa" aria-label="Search" style="width: 550px" id="search-input">
				</form> -->
				<div class="input-group d-flex "  style="width: 550px">
					<input type="text" class="form-control" placeholder="Temukan Jasa" aria-describedby="button-addon2" id="search-input">
					<div class="input-group-append">
						<button class="btn btn-outline-secondary btn-dark" type="button" id="search-button">Cari</button>
					</div>
				</div>
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item me-5">
						<a class="nav-link" href="{{ url('/jelajahi') }}">Jelajahi</a>
					</li>
					<li class="nav-item me-5">
						<a class="nav-link" href="{{ url('/gabung') }}">Gabung Mitra</a>
					</li>

					</li>
					<li class="nav-item me-5">
						<div class="dropdown dropstart">
							<a class="nav-link dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{ asset('img/') }}/profile.PNG" class="rounded-circle" width="25px" alt=""></a>

							<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

								<li><a class="dropdown-item mb-2" href="{{ url('/profil') }}">Profil</a></li>
								<li>
									<a  class="dropdown-item mb-2" href="{{ url('/pesanan') }}">Pesanan</a>
								</li>
								<li><a class="dropdown-item mb-2" href="{{ url('/profil') }}">Pemesanan</a></li>
								
								<li>
									<div class="ms-3 mt-2 mb-2 space-y-1">
										<!-- Authentication -->
										<form method="POST" action="{{ route('logout') }}">
											@csrf

											<x-responsive-nav-link :href="route('logout')"
													onclick="event.preventDefault();
																this.closest('form').submit();">
												{{ __('Keluar') }}
											</x-responsive-nav-link>
										</form>
									</div>
								</li>
							</ul>
						</div>
						
					</li>
				


				</ul>
			</div>
		</div>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-light bg-light bar">
		<div class="container-fluid">
		<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent2">
				<ul class="navbar-nav mx-auto mb-2 mb-lg-0" style="text-align: center; font-size: 0.9rem">

					<li class="nav-item me-5">
						<a class="nav-link" href="#">Kategori</a>
					</li>

				</ul>
			</div>
		</div>
	</nav>
	
	<br> 
    @yield('container')


    <div class="bar mt-5"></div>
	
	<div class="footer">
		<p>
			<img src="{{ asset('img/') }}/logofooter.png" width="25px" alt="">
			Woka &emsp;&emsp;
			@ 2021, PT. Woka.
		</p>
	</div>
	
	<!-- Modal -->
	<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Movie Search</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-scrollable">
			<div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
				<div class="modal-body">
					
				</div>
				<div class="modal-footer me-auto mt-3">
					<div class="row" style="width: 300px;">
						<div class="col-lg-3">
							<img src="img/profile.PNG" class="rounded-circle" width="50px" alt="">
						</div>

						<div class="col-lg workerModal">

						</div>
						<!-- <div class="col-lg">
							<p style="font-size: 14px;"> - 2 Pesanan sedang dikerjakan</p>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
	<script src="{{ asset('js/') }}/script.js"></script>
	</body>
	</html>