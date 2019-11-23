@extends('admin.layouts.master')
@section('myCss')
  <style>
    @import 'https://code.highcharts.com/css/highcharts.css';

    #users {
      height: 400px;
      margin: 0 auto;
    }

    /* Link the series colors to axis colors */
    #users .highcharts-color-0 {
      fill: #7cb5ec;
      stroke: #7cb5ec;
    }
    #users .highcharts-axis.highcharts-color-0 .highcharts-axis-line {
      stroke: #7cb5ec;
    }
    #users .highcharts-axis.highcharts-color-0 text {
      fill: #7cb5ec;
    }
    #users .highcharts-color-1 {
      fill: #90ed7d;
      stroke: #90ed7d;
    }
    #users .highcharts-axis.highcharts-color-1 .highcharts-axis-line {
      stroke: #90ed7d;
    }
    #users .highcharts-axis.highcharts-color-1 text {
      fill: #90ed7d;
    }


    #users .highcharts-yaxis .highcharts-axis-line {
      stroke-width: 2px;
    }
  </style>
@endsection
@section('content')
<!-- content header -->
@php
  $candidates = \App\User::where('user_type', 'candidate')->count();
  $companies = \App\User::where('user_type', 'company')->count();
  $postedJobs = \App\Job::all()->count();
  $openJobs = \App\Job::where('is_published', 1)->count();
  $now =\Carbon\Carbon::today();
  $todayViewers = \App\ViewJob::whereDate('created_at', $now)->count();
@endphp
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $postedJobs }}</h3>

                <p>Total Jobs</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('jobListForAdmin') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $candidates }}</h3>

                <p>Candidates</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('candidateListForAdmin') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $companies }}</h3>

                <p>Company Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('companyListForAdmin') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $todayViewers }}</h3>

                <p>Today Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- solid sales graph -->
            <div class="card">
              <div class="card-body">
                <div id="job_views" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
              </div>
              <!-- /.card-footer -->
            </div>
          </section>
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-body p-0">
            <div id="users"></div>
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable">

            <!-- Map card -->

            <div id="posted_jobs" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
            <!-- /.card -->
          </section>
          <section class="col-lg-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Most Views Jobs</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="height: 394px; overflow-y: auto;">
              <ul class="products-list product-list-in-card pl-2 pr-2">
                <!-- /.item -->
                @foreach($most_views_jobs AS $most_views_job)
                <li class="item">
                  <div class="product-img" style="background: #c9e0f9; padding: 17px;">
                    <span class="fa fa-briefcase"></span>
                  </div>
                  <div class="product-info">
                    <span class="product-title">{{ $most_views_job->title }}</span>
                    <span class="product-description">{{ $most_views_job->views }} Views</span>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- /.card-footer -->
          </div>
          </section>
          <section class="col-lg-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Top Job Posted Company</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="height: 394px; overflow-y: auto;">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <!-- /.item -->
                  @foreach($top_companies AS $top_company)
                    @if($top_company->jobs >= 10)
                    <li class="item">
                      <div class="product-img" style="background: #c9e0f9; padding: 17px;">
                        <span class="fa fa-handshake-o"></span>
                      </div>
                      <div class="product-info">
                        <span class="product-title">{{ $top_company->company_name }}</span>
                        <i style="color:white;padding: 3px;background: orange;border-radius: 100%;" class="fa fa-star-o" aria-hidden="true"></i>
                        <span class="product-description">{{ $top_company->jobs }} Jobs</span>
                      </div>
                    </li>
                    @endif
                  @endforeach
                </ul>
              </div>
              <!-- /.card-footer -->
            </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->

@endsection
@section('myJs')
  <script>
    Highcharts.chart('job_views', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'Monthly Viewers'
      },
      xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
          'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
      },
      yAxis: {
        title: {
          text: 'Number Of Viewers'
        },
      },
      series: [{
        name: 'Views',
        data: {{ $monthly_jobs_views }}
      }]
    });

    //Pie chart
    // Radialize the colors
    Highcharts.setOptions({
      colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
          radialGradient: {
            cx: 0.5,
            cy: 0.3,
            r: 0.7
          },
          stops: [
            [0, color],
            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
          ]
        };
      })
    });

    // Build the chart
    Highcharts.chart('posted_jobs', {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
      },
      title: {
        text: 'Posted Jobs Statistics'
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
            connectorColor: 'silver'
          }
        }
      },
      series: [{
        name: 'Share',
        data: [
          { name: 'Total Jobs', y: {{ $postedJobs }} },
          { name: 'Active Jobs', y: {{ $openJobs }} },
        ]
      }]
    });

    //Candidate and Company
    Highcharts.chart('users', {

      chart: {
        type: 'column',
        styledMode: true
      },

      title: {
        text: 'Candidates and Company Statistics'
      },

      yAxis: [{
        className: 'highcharts-color-0',
        title: {
          text: 'Candidates'
        }
      }, {
        className: 'highcharts-color-1',
        opposite: true,
        title: {
          text: 'Companies'
        }
      }],

      plotOptions: {
        column: {
          borderRadius: 5
        }
      },
      xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
          'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
      },
      series: [{
        name: 'Candidates',
        data: {{ $monthly_candidate }}
      }, {
        name: 'Companies',
        data: {{ $monthly_company }},
        yAxis: 1
      }]

    });
  </script>
@endsection