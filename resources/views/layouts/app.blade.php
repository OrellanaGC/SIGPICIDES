<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('black') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('black') }}/img/favicon.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('black') }}/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS -->
        <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" />
        <!--menu-Flotante-->
        <link href="{{ asset('black') }}/css/menu_flotante.css" rel="stylesheet" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">

        
    </head>
    @auth()
      @if (Auth::user()->dark)
        <body class="{{ $class ?? '' }} " >
      @else
        <body class="{{ $class ?? '' }} white-content" >
      @endif
    @else
      <body class="{{ $class ?? '' }} white-content" > 
    @endauth
        @auth()
            <div class="wrapper">
                    @include('layouts.navbars.sidebar')
                <div class="main-panel">
                    @include('layouts.navbars.navbar')

                    <div class="content">
                        @yield('content')
                    </div>

                    @include('layouts.footer')
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            @include('layouts.navbars.navbar')
            <div class="wrapper wrapper-full-page">
                <div class="full-page {{ $contentClass ?? '' }}">
                    <div class="content">
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
        @endauth
        <!--div class="fixed-plugin">
            <div class="dropdown show-dropdown">
                <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
                </a>
                <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Background</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors text-center">
                        <span class="badge filter badge-primary" data-color="p"></span>
                        <span class="badge filter badge-info active" data-color="primary"></span>
                        <span class="badge filter badge-success" data-color="green"></span>
                    </div>
                    <div class="clearfix"></div>
                    </a>
                </li>
                <li class="adjustments-line text-center color-change">
                    <span class="color-label">LIGHT MODE</span>
                    <span class="badge light-badge mr-2"></span>
                    <span class="badge dark-badge ml-2"></span>
                    <span class="color-label">DARK MODE</span>
                </li>
                </ul>
            </div>
        </div!-->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{ asset('black') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('black') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('black') }}/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('black') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <!-- Place this tag in your head or just before your close body tag. -->
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
        <!-- Chart JS -->
        {{-- <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
        <!--  Notifications Plugin    -->
        <script src="{{ asset('black') }}/js/plugins/bootstrap-notify.js"></script>

        <script src="{{ asset('black') }}/js/black-dashboard.min.js?v=1.0.0"></script>
        <script src="{{ asset('black') }}/js/theme.js"></script>
        <script src="{{ asset('black') }}/js/sweet.js"> </script>
        <script src="{{ asset('black') }}/js/sigpi.js"></script>
        <script src="{{ asset('black') }}/js/buscador.js"></script>
        <script src="{{ asset('black') }}/js/chart.js"></script>

        @stack('js')

        <script>
	      $(document).ready(function() {
	        $().ready(function() {
	          $sidebar = $('.sidebar');
	          $navbar = $('.navbar');

	          $full_page = $('.full-page');

	          $sidebar_responsive = $('body > .navbar-collapse');
	          sidebar_mini_active = true;
	          white_color = false;

	          window_width = $(window).width();

	          fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



	          $('.fixed-plugin a').click(function(event) {
	            // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
	            if ($(this).hasClass('switch-trigger')) {
	              if (event.stopPropagation) {
	                event.stopPropagation();
	              } else if (window.event) {
	                window.event.cancelBubble = true;
	              }
	            }
	          });

	          $('.fixed-plugin .background-color span').click(function() {
	            $(this).siblings().removeClass('active');
	            $(this).addClass('active');

	            var new_color = $(this).data('color');

	            if ($sidebar.length != 0) {
	              $sidebar.attr('data-color', new_color);
	            }

	            if ($navbar.length != 0) {
	              $navbar.attr('data-color', new_color);
	            }

	            if ($full_page.length != 0) {
	              $full_page.attr('filter-color', new_color);
	            }

	            if ($sidebar_responsive.length != 0) {
	              $sidebar_responsive.attr('data-color', new_color);
	            }
	          });

	          $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
	            var $btn = $(this);

	            if (sidebar_mini_active == true) {
	              $('body').removeClass('sidebar-mini');
	              sidebar_mini_active = false;
	              blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
	            } else {
	              $('body').addClass('sidebar-mini');
	              sidebar_mini_active = true;
	              blackDashboard.showSidebarMessage('Sidebar mini activated...');
	            }

	            // we simulate the window Resize so the charts will get updated in realtime.
	            var simulateWindowResize = setInterval(function() {
	              window.dispatchEvent(new Event('resize'));
	            }, 180);

	            // we stop the simulation of Window Resize after the animations are completed
	            setTimeout(function() {
	              clearInterval(simulateWindowResize);
	            }, 1000);
	          });

	          $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
	            var $btn = $(this);

	            if (white_color == true) {

	              $('body').addClass('change-background');
	              setTimeout(function() {
	                $('body').removeClass('change-background');
	                $('body').removeClass('white-content');
	              }, 900);
	              white_color = false;
	            } else {

	              $('body').addClass('change-background');
	              setTimeout(function() {
	                $('body').removeClass('change-background');
	                $('body').addClass('white-content');
	              }, 900);

	              white_color = true;
	            }


	          });

	          $('.light-badge').click(function() {
	            $('body').addClass('white-content');
	          });

	          $('.dark-badge').click(function() {
	            $('body').removeClass('white-content');
	          });
	        });
	      });
	    </script>
	    <script>
	      $(document).ready(function() {
	        // Javascript method's body can be found in assets/js/demos.js
	        demo.initDashboardPageCharts();

	      });
	    </script>
        @stack('js')
    </body>
</html>
