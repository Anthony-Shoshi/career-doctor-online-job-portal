<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{url('/')}}">Career Doctor</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	          <!-- <li class="nav-item cta mr-md-2"><a href="new-post.html" class="nav-link">Post a Job</a></li> -->
	          <li class="nav-item cta cta-colored"><a href="job-post.html" class="nav-link">Want a Job</a></li>
						@guest
						<li class="nav-item"><a href="{{route('login')}}" class="nav-link">Sign in / Create Account</a></li>
						@else
						<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
										{{ Auth::user()->name }} <span class="caret"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
										@if(Auth::user()->user_type == 'candidate')
										<a href="{{ route('candidateProfile') }}" class="dropdown-item">Profile</a>
										<a href="{{ route('index') }}" target="_blank" class="dropdown-item">Create CV</a>
										@endif
										@if(Auth::user()->user_type == 'company')
										<a href="{{ route('companyProfile') }}" class="dropdown-item">Profile</a>
										@endif
										<a class="dropdown-item" href="{{ route('logout') }}"
												onclick="event.preventDefault();
																			document.getElementById('logout-form').submit();">
												{{ __('Logout') }}
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												@csrf
										</form>
								</div>
						</li>
						@endguest
	        </ul>
	      </div>
	    </div>
	  </nav>