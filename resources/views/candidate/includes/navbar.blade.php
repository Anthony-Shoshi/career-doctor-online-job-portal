<header class="header-nav menu_style_home_one navbar-scrolltofixed stricky main-menu" style="background-color:#262626;">
		<div class="container">
		    <!-- Ace Responsive Menu -->
		    <nav>
		        <!-- Menu Toggle btn-->
		        <div class="menu-toggle">
		            <img class="nav_logo_img img-fluid" src="images/header-logo.png" alt="header-logo.png">
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <a href="{{ url('/') }}" class="navbar_brand float-left dn-smd">
		            <img class="img-fluid" src="{{ ('candidate_company/assets/images/header-logo.png') }}" alt="header-logo.png">
		        </a>
		        <!-- Responsive Menu Structure-->
		        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
		        <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
		            <li>
		                <a href="{{ url('/') }}"><span class="title">Home</span></a>
					</li>
					@guest
		            <li>
		                <a href="#"><span class="title">Find A Job</span></a>
		            </li>
					@else
					@if(auth::user()->user_type == 'candidate')
					<li class="last">
		                <a href="#"><span class="title">Find A Job</span></a>
					</li>
					@endif
					@if(auth::user()->user_type == 'company')
					<li class="last">
		                <a href="page-employer-post-job.html"><span class="title">Post a Job</span></a>
					</li>
					@endif
					@endguest
		            
		            <li>
		                <a href="#"><span class="title">Blog</span></a>
					</li>
					<li>
		                <a href="#"><span class="title">About Us</span></a>
					</li>
					<li>
		                <a href="#"><span class="title">Contact Us</span></a>
		            </li>
		        </ul>
		        <ul class="sign_up_btn pull-right dn-smd mt10">
					@guest
					<li><a href="{{ route('login') }}" class="btn btn-md">Log<span class="dn-md">in</span>/Reg<span class="dn-md">ister</span></a></li>
					@else
					<li>
						<a href="{{ route('dashboard') }}" class="btn btn-md">Dashboard</a>
						<a href="{{ route('logout') }}" class="btn btn-md" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">Logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
					</li>
					@endguest
	            </ul><!-- Button trigger modal -->
		    </nav>
		</div>
	</header>

<!-- Main Header Nav For Mobile -->

	<div id="page" class="stylehome1 h0">
		<div class="mobile-menu">
			<div class="header stylehome1">
	            <img class="nav_logo_img img-fluid float-left mt25" src="{{ ('candidate_company/assets/images/header-logo.png') }}" alt="header-logo.png">
				<a class="bg-thm" href="#menu"><span></span></a>
			</div>
		</div><!-- /.mobile-menu -->
		<nav id="menu" class="stylehome1">
			<ul>
				<li><a href="{{ url('/') }}">Home</a></li>
				@guest
				<li><a href="#">Find a Job</a></li>
				@else
				@if(auth::user()->user_type == 'candidate')
				<li><a href="#">Find a Job</a></li>
				@endif
				@if(auth::user()->user_type == 'company')
				<li><a href="#">Post a Job</a></li>
				@endif
				@endguest
				<li><a href="#">Blog</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact Us</a></li>
				@guest
					<li><a href="{{ route('login') }}" class="text-thm">Log<span class="dn-md">in</span>/Reg<span class="dn-md">ister</span></a></li>
					@else
						<li><a href="{{ route('dashboard') }}" class="text-thm">Dashboard</a></li>
						<li><a href="{{ route('logout') }}" class="text-thm" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">Logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
					</li>
				@endguest
				<!-- <li><a class="text-thm" href="page-log-reg.html">Login/Register</a></li> -->
			</ul>
		</nav>
	</div>