<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
	<!-- Custom CSS -->
	<link href="/plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
	<link rel="stylesheet" href="/plugins/toastify-js/toastify.min.css">
	<!-- Custom CSS -->
	<link href="/css/style.min.css" rel="stylesheet">
	<link href="/css/main.css" rel="stylesheet">
	@livewireStyles
</head>

<body>
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader">
		<div class="lds-ripple">
			<div class="lds-pos"></div>
			<div class="lds-pos"></div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
		data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
		<!-- ============================================================== -->
		<!-- Topbar header - style you can find in pages.scss -->
		<!-- ============================================================== -->
		<header class="topbar" data-navbarbg="skin5">
			<nav class="navbar top-navbar navbar-expand-md navbar-dark">
				<div class="navbar-header" data-logobg="skin6">
					<!-- ============================================================== -->
					<!-- Logo -->
					<!-- ============================================================== -->
					<a class="navbar-brand" href="{{ route('admin') }}">
						<x-application-logo class="" />
					</a>
					<!-- ============================================================== -->
					<!-- End Logo -->
					<!-- ============================================================== -->
					<!-- ============================================================== -->
					<!-- toggle and nav items -->
					<!-- ============================================================== -->
					<a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
						href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
				</div>
				<!-- ============================================================== -->
				<!-- End Logo -->
				<!-- ============================================================== -->
				<div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

					<!-- ============================================================== -->
					<!-- Right side toggle and nav items -->
					<!-- ============================================================== -->
					<ul class="navbar-nav ms-auto d-flex align-items-center">

						<!-- ============================================================== -->
						<!-- User profile and search -->
						<!-- ============================================================== -->


						<li class="nav-item dropdown">
							<a class="profile-pic nav-link dropdown-toggle with-arrow" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<img src="{{Auth::user()->gravatar}}" alt="user-img" width="26" class="img-circle">
								<span class="text-white font-medium">{{ Auth::user()->name }}</span>
							</a>
							<ul class="dropdown-menu" style="left:unset;right:20px !important;" aria-labelledby="navbarDropdown">
								<x-dropdown-link :href="route('profile')" :active="request()->routeIs('profile')">
										{{ __('Profile') }}
								</x-dropdown-link>
								<x-dropdown-link :href="route('admin.settings')" :active="request()->routeIs('admin.settings')">
										{{ __('Settings') }}
								</x-dropdown-link>
								<li><hr class="dropdown-divider"></li>
								<li>
									<a class="dropdown-item" href="{{ route('logout') }}"
										onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
										Logout
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</li>
							</ul>
						</li>

						<!-- ============================================================== -->
						<!-- User profile and search -->
						<!-- ============================================================== -->
					</ul>
				</div>
			</nav>
		</header>
		<!-- ============================================================== -->
		<!-- End Topbar header -->
		<!-- ============================================================== -->
		@include('layouts.navigation')
		<!-- ============================================================== -->
		<!-- Page wrapper  -->
		<!-- ============================================================== -->
		<div class="page-wrapper">
			<!-- ============================================================== -->
			<!-- Bread crumb and right sidebar toggle -->
			<!-- ============================================================== -->
			<div class="page-breadcrumb bg-white">
				<div class="row align-items-center">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<h4 class="page-title">@yield('page.title', ucfirst(Route::currentRouteName()))</h4>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-4 col-xs-8">
						@yield('action-buttons')
					</div>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- ============================================================== -->
			<!-- End Bread crumb and right sidebar toggle -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Container fluid  -->
			<!-- ============================================================== -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						{{ $slot }}
					</div>
				</div>
			</div>
			<!-- ============================================================== -->
			<!-- End Container fluid  -->
			<!-- ============================================================== -->
			@include('layouts.footer')
		</div>
		<!-- ============================================================== -->
		<!-- End Page wrapper  -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- End Wrapper -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
	<script src="/plugins/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script src="/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="/js/app-style-switcher.js"></script>
	<script src="/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
	<!--Wave Effects -->
	<script src="/js/waves.js"></script>
	<!--Menu sidebar -->
	<script src="/js/sidebarmenu.js"></script>
	<!--Custom JavaScript -->
	<script src="/js/custom.js"></script>
	<!--This page JavaScript -->
	<!--chartis chart-->
	<script src="/plugins/bower_components/chartist/dist/chartist.min.js"></script>
	<script src="/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
	<script src="/plugins/toastify-js/toastify.js"></script>
	<script src="/js/pages/dashboards/dashboard1.js"></script>

	@livewireScripts

    <script type="text/javascript">
        window.livewire.on('closeModal', () => {
            $('.modal.show').modal('hide');
        });
        window.addEventListener('toast-message', event => {
            Toastify({
            text: event.detail.message,
            duration: 3000,
            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {

            },
            onClick: function(){} // Callback after click
            }).showToast();
        })
        window.addEventListener('toast-error-message', event => {
            Toastify({
            text: event.detail.message,
            duration: 3000,
            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
            },
            onClick: function(){} // Callback after click
            }).showToast();
        })
    </script>
</body>

</html>
