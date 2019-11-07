<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      @php
        $unSeen = \App\ContactMailLog::where('message_type', 'contact')->where('is_seen', 0)->count();
        $unSeenMessages = \App\ContactMailLog::where('message_type', 'contact')->where('is_seen', 0)->where('is_deleted', 0)->get();
      @endphp
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments-o"></i>
          <span class="badge badge-danger navbar-badge">{{ $unSeen }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        @if($unSeenMessages->count() != 0)
          @foreach($unSeenMessages as $unSeenMessage)
          <a href="{{ route('readContactMessage', $unSeenMessage->id) }}" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  {{ $unSeenMessage->name }}
                  <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm"> {{ $unSeenMessage->subject }}</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i>
                  {{ (date_format($unSeenMessage->created_at, 'Y-m-d') == \Carbon\Carbon::today()->toDateString()) ? 'Today '.date_format($unSeenMessage->created_at, 'h:i A')  : date_format($unSeenMessage->created_at, 'd M, Y h:i A') }}
                </p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('getContactUsMessages') }}" class="dropdown-item dropdown-footer">See All Messages</a>
          @endforeach
          @else
            <div class="text-center">No Messages!</div>
          @endif
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      @php
        $newJobSkills = \App\JobSkillsTemp::where('status', 'PENDING')->count();
      @endphp
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">{{ $newJobSkills }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{ $newJobSkills }} Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="{{ route('newJobSkillsList') }}" class="dropdown-item">
            <i class="fa fa-cogs mr-2"></i> {{ $newJobSkills }} new skills added
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i><div style="margin-top: -25px;margin-left: 15px;">Logout</div></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li> -->
    </ul>
  </nav>