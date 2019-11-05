<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{ asset('admin/assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Career Doctor</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{auth::user()->image}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">{{auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('home')}}" class="nav-link {{Request::is('home') ? 'active' : ''}}">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <!-- <i class="right fa fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{Request::is('jobListForAdmin') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('jobListForAdmin') ? 'active' : ''}}">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Manage Jobs
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('jobListForAdmin')}}" class="nav-link {{Request::is('jobListForAdmin') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Job List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{Request::is('candidateListForAdmin') ? 'menu-open' : '' || Request::is('companyListForAdmin') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('candidateListForAdmin') ? 'active' : '' || Request::is('companyListForAdmin') ? 'active' : ''}}">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('candidateListForAdmin')}}" class="nav-link {{Request::is('candidateListForAdmin') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Candidate List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('companyListForAdmin')}}" class="nav-link {{Request::is('companyListForAdmin') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Company List</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- menu-open -->
          <li class="nav-item has-treeview {{Request::is('addIndustry') ? 'menu-open' : '' || Request::is('industryList') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{Request::is('addIndustry') ? 'active' : '' || Request::is('industryList') ? 'active' : ''}}">
              <i class="nav-icon fa fa-industry"></i>
              <p>
                Industry
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addIndustry')}}" class="nav-link {{Request::is('addIndustry') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Industry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('industryList')}}" class="nav-link {{Request::is('industryList') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Industry List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{Request::is('addCategory') ? 'menu-open' : '' || Request::is('categoryList') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('addCategory') ? 'active' : '' || Request::is('categoryList') ? 'active' : ''}}">
              <i class="nav-icon fa fa-list"></i>
              <p>
                Category
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addCategory')}}" class="nav-link {{Request::is('addCategory') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('categoryList')}}" class="nav-link {{Request::is('categoryList') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Category List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{Request::is('addCountry') ? 'menu-open' : '' || Request::is('countryList') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('addCountry') ? 'active' : '' || Request::is('countryList') ? 'active' : ''}}">
              <i class="nav-icon fa fa-globe"></i>
              <p>
                Country
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addCountry')}}" class="nav-link {{Request::is('addCountry') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Country</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('countryList')}}" class="nav-link {{Request::is('countryList') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Country List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{Request::is('addCity') ? 'menu-open' : '' || Request::is('countryListToGetCities') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('addCity') ? 'active' : '' || Request::is('countryListToGetCities') ? 'active' : ''}}">
              <i class="nav-icon fa fa-building"></i>
              <p>
                City
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addCity')}}" class="nav-link {{Request::is('addCity') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add City</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('countryListToGetCities')}}" class="nav-link {{Request::is('countryListToGetCities') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>City List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{Request::is('addJobSkills') ? 'menu-open' : '' || Request::is('jobSkillsList') ? 'menu-open' : '' || Request::is('newJobSkillsList') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('addJobSkills') ? 'active' : '' || Request::is('jobSkillsList') ? 'active' : '' || Request::is('newJobSkillsList') ? 'active' : ''}}">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Job Skills
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addJobSkills')}}" class="nav-link {{Request::is('addJobSkills') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Job Skills</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('jobSkillsList')}}" class="nav-link {{Request::is('jobSkillsList') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Job Skills List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('newJobSkillsList')}}" class="nav-link {{Request::is('newJobSkillsList') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>New Job Skills List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{Request::is('addJobType') ? 'menu-open' : '' || Request::is('jobTypeList') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('addJobType') ? 'active' : '' || Request::is('jobTypeList') ? 'active' : ''}}">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Job Types
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addJobType')}}" class="nav-link {{Request::is('addJobType') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Job Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('jobTypeList')}}" class="nav-link {{Request::is('jobTypeList') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Job Type List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{Request::is('addJobQualification') ? 'menu-open' : '' || Request::is('jobQualificationList') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('addJobQualification') ? 'active' : '' || Request::is('jobQualificationList') ? 'active' : ''}}">
              <i class="nav-icon fa fa-graduation-cap"></i>
              <p>
                Job Qualification
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addJobQualification')}}" class="nav-link {{Request::is('addJobQualification') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Qualification</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('jobQualificationList')}}" class="nav-link {{Request::is('jobQualificationList') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Qualification List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{Request::is('addEducationDegree') ? 'menu-open' : '' || Request::is('educationDegreeList') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('addEducationDegree') ? 'active' : '' || Request::is('educationDegreeList') ? 'active' : ''}}">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Education Degree
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addEducationDegree')}}" class="nav-link {{Request::is('addEducationDegree') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Degree</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('educationDegreeList')}}" class="nav-link {{Request::is('educationDegreeList') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Degree List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{Request::is('companyReviewListForAdmin') ? 'menu-open' : '' || Request::is('candidateReviewListForAdmin') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('companyReviewListForAdmin') ? 'active' : '' || Request::is('candidateReviewListForAdmin') ? 'active' : ''}}">
              <i class="nav-icon fa fa-star"></i>
              <p>
                Review Manage
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('companyReviewListForAdmin')}}" class="nav-link {{Request::is('companyReviewListForAdmin') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Company Review List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('candidateReviewListForAdmin')}}" class="nav-link {{Request::is('candidateReviewListForAdmin') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Candidate Review List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{Request::is('get/contactus/messages') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('get/contactus/messages') ? 'active' : ''}}">
              <i class="nav-icon fa fa-envelope-open"></i>
              <p>
                Messages
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('getContactUsMessages')}}" class="nav-link {{Request::is('get/contactus/messages') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{Request::is('generalSettings') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('generalSettings') ? 'active' : ''}}">
              <i class="nav-icon fa fa-wrench"></i>
              <p>
                Settings
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('generalSettings')}}" class="nav-link {{Request::is('generalSettings') ? 'active' : ''}}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>General Settings</p>
                </a>
              </li>
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>