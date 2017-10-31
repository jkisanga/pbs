<!DOCTYPE HTML>
<html class="no-js">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{Lang::get('site.sitename')}} </title>

    <!-- Bootstrap -->
    <link href="{{asset('asset/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('asset/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('asset/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('asset/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('asset/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
   <!-- Select2 -->
    <link href="{{asset('asset/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('asset/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

	    <!-- PNotify -->
    <link href="{{asset('asset/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('asset/build/css/custom.css')}}" rel="stylesheet">
	
	   <!-- jQuery -->
    <script src="{{asset('asset/vendors/jquery/dist/jquery.min.js')}}"></script>
	
	 <!-- Chart.js -->
    <script src="{{asset('asset/vendors/Chart.js/dist/Chart.min.js')}}"></script>

</head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{URL::to('dashboard')}}" class="site_title"><i class="fa fa-briefcase"></i> <span>TFS-PBS</span></a>
            </div>

            <div class="clearfix"></div>


            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Budgeting</h3>
                <ul class="nav side-menu">
                  <li><a href="{{URL::to('dashboard')}}"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-right"></span></a></li>
              
				  
                  <li><a><i class="fa fa-money"></i> Budgeting <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{URL::to('list_target')}}">Prepare Budget</a></li>
                    <li><a href="{{URL::to('budget/submit')}}">Submit Budget</a></li>	
				@if( Auth::user()->hasRole('manager') || Auth::user()->hasRole('supermanager'))
					<li><a href="{{URL::to('budget/zone/manage')}}">Manage {{Auth::user()->unit->zone->zone_name}} budget </a></li>			
				@endif
				@if( Auth::user()->hasRole('supermanager') )
					<li><a href="{{URL::to('budget/overall/manage')}}">Manage overall budget</a></li>
				@endif
                   </ul>
                  </li>

                  <li><a><i class="fa fa-folder-open"></i> Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
				@if( Auth::user()->hasRole('manager') )
				 <li><a href="{{URL::to('reports/unitBudgetView')}}"> Stations/Units Budgets</a></li>
				<li><a href="{{URL::to('reports/zonesBudgetView')}}"> Zonal Budget </a></li>
				@else
				<li><a href="{{URL::to('reports/unitBudgetView')}}"> {{Auth::user()->unit->name}} Budget</a></li>
				@endif

			      @if( Auth::user()->hasRole('supermanager'))
			      <li><a href="{{URL::to('reports/zonesBudgetView')}}"> Zonal Budget </a></li>
				  <li><a href="{{URL::to('reports/overallBudget')}}"> Overall Budget </a></li>
				  <li><a href="{{URL::to('reports/zonesBudgetSummary')}}"> Budget Summary Per Zone</a></li>
				@endif
                    </ul>
                  </li>
				  
                  <li><a><i class="fa fa-eye"></i> Revenue Projection <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="{{URL::to('submissions/index')}}">Prepare Revenue projection</a></li>
					 <li><a href="{{URL::to('revenue/submit')}}">Submit Revenue</a></li>
					 <li><a href="{{URL::to('submissions/unit_report')}}">Revenue Report {{Auth::user()->unit->name}} Unit</a></li>
					@if( Auth::user()->hasRole('manager') || Auth::user()->hasRole('supermanager'))
					<li><a href="{{URL::to('revenue/manage')}}">Manage {{Auth::user()->unit->zone->zone_name}} Revenue </a></li>
                    <li><a href="{{URL::to('submissions/zone_report')}}">Revenue Report {{Auth::user()->unit->zone->zone_name}} Zone</a></li>
					@endif


                    </ul>
                  </li>
            

                </ul>
              </div>
			   <div class="menu_section">
                <h3>M&E</h3>
              
              <ul class="nav side-menu">
			   <li><a><i class="fa fa-line-chart"></i> M&E <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{URL::to('kpis/objectives')}}">Indicators</a></li>
                      <li><a href="{{URL::to('kpiEvaluation/submit')}}">Submit quarter Report</a></li>					    
					@if (Auth::user()->hasRole('supermanager'))
				    <li><a href="{{URL::to('kpiEvaluation/unitsKpireport')}}">Zone Stations Report</a></li>
				  @endif
                    </ul>
                  </li>
			  </ul>
			  </div>
              
			  @if (Auth::user()->hasRole('supermanager'))
			  <div class="menu_section">
                <h3> General Settings</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-key"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="{{URL::to('admin/users')}}">Users</a></li>
                    <li><a href="{{URL::to('refKpiFields/create')}}">KPI Fields</a></li>
                    <li><a href="{{URL::to('kpis/index')}}">KPI Indicators</a></li>
                    <li><a href="{{URL::to('zones/index')}}">Zones</a></li>
                    <li><a href="{{URL::to('admin/system/positions')}}">Staff Positions</a></li>
                    <li><a href="{{URL::to('financial_year/index')}}">Financial Year</a></li>
                    <li><a href="{{URL::to('admin/system/addPMeasure')}}">Projection Measure</a></li>
                    <li><a href="{{URL::to('list_objective')}}">Objectives</a></li>
                   <li><a href="{{URL::to('select_objective')}}">Targets</a></li>
                    <li><a href="{{URL::to('admin/system/add_unit_measure')}}">Unit Measures</a></li>
					<li><a href="{{URL::to('admin/system/add_gfs')}}">GFS Codes</a></li>	            
              
                   <li><a href="{{URL::to('revenueCategory/index')}}"> Revenue Categories</a></li>
					<li><a href="{{URL::to('admin/logs')}}">Logs</a></li>


                    </ul>

                </ul>
              </div>
				@endif
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a href="{{URL::to('dashboard')}}"  data-toggle="tooltip" data-placement="top" title="Dashboard">
                <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
              </a>
              <a href="{{asset('uploads/pbs-usermanual.pdf')}}" data-toggle="tooltip" data-placement="top" title="Help">
                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
              </a>
              <a href="{{URL::to('user/change_password')}}" data-toggle="tooltip" data-placement="top" title="Change password">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
              </a>
              <a href="{{URL::to('user/logout')}}" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->first_name}} {{Auth::user()->last_name}} [{{Auth::user()->unit->name}}]
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                    <li><a href="{{asset('uploads/pbs-usermanual.pdf')}}"><i class="glyphicon glyphicon-info-sign pull-right"></i>Help</a></li>
                    <li><a href="{{URL::to('user/change_password')}}"><i class="fa fa-edit pull-right"></i>Change Password</a></li>
                    <li><a href="{{URL::to('user/logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
				  @if( Auth::user()->hasRole('supermanager') || Auth::user()->hasRole('manager'))
					  @if( isset($pending_zonal_consolidation, $pending_unit_submission) )
					  @if($pending_unit_submission == 0)

               <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell"> Pending zone Consolidation</i>
                    <span class="badge bg-orange">{{count($pending_zonal_consolidation)}}</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
				  @foreach($pending_zonal_consolidation as $target)
                    <li>

                        <span class="message">
						<a href="{{URL::to('budget/zonal_consolidate',$target->id)}}">OBJ - {{$target->objective}} : [ TG : {{ sprintf('%02d', $target->target_no)}} - {{$target->ta_description}} ]</a>
                        </span>

                    </li>
					@endforeach
					 <li>
                      <div class="text-center">
                        <a href="{{URL::to('alerts/pennding_zone_Consolidation')}}">
                          <strong>View All </strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
				</ul>
				</li>

				@else
					<li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-question-circle"> Pending unit submission</i>
                    <span class="badge bg-gray">{{$pending_unit_submission}}</span>
                  </a>
				  </li>

				@endif
				@endif
				@endif



				@if( Auth::user()->hasRole('supermanager') && isset($pending_consolidation, $pending_zone_submission) )
					@if($pending_zone_submission == 0)
               <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell"> Pending HQ Consolidation</i>
                    <span class="badge bg-orange">{{count($pending_consolidation)}}</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
				  @foreach($pending_consolidation as $target)
                    <li>

                        <span class="message">
						<a href="{{URL::to('budget/overAll',$target->id)}}">OBJ - {{$target->objective}} : [ TG : {{ sprintf('%02d', $target->target_no)}} - {{$target->ta_description}} ]</a>
                        </span>

                    </li>
					@endforeach
					 <li>
                      <div class="text-center">
                        <a href="{{URL::to('alerts/penndingConsolidation')}}">
                          <strong>View All </strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
				</ul>
				</li>
				@else
					<li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-question-circle"> Pending Zone submission</i>
                    <span class="badge bg-gray">{{$pending_zone_submission}}</span>
                  </a>
				  </li>
				@endif
				@endif
				@if(isset($current_year))
				<li> <a href="#">FY: <b>{{$current_year}}</b></a></li>
				@endif
              </ul>

            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

		 <div class="clearfix"></div>
         @include('notifications')
         @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            TFS-PBS - Copyright © {{date('Y')}} <a href="https://tfs.go.tz"  target="_blank">TFS</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

 
    <!-- Bootstrap -->
    <script src="{{asset('asset/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('asset/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('asset/vendors/nprogress/nprogress.js')}}"></script>
   
    <!-- gauge.js -->
    <script src="{{asset('asset/vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('asset/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('asset/vendors/iCheck/icheck.min.js')}}"></script>

	 <!-- PNotify -->
    <script src="{{asset('asset/vendors/pnotify/dist/pnotify.js')}}"></script>
    <script src="{{asset('asset/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
    <script src="{{asset('asset/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>

    <!-- Skycons -->
    <script src="{{asset('asset/vendors/skycons/skycons.js')}}"></script>

    <script src="{{asset('asset/vendors/DateJS/build/date.js')}}"></script>
      <!-- Select2 -->
    <script src="{{asset('asset/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('asset/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('asset/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('asset/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>

	  <!-- Datatables -->
    <script src="{{asset('asset/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('asset/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('asset/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('asset/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('asset/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('asset/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('asset/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('asset/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('asset/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('asset/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('asset/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('asset/build/js/custom.min.js')}}"></script>
	
	 <!-- Chart.js -->
    <script src="{{asset('asset/vendors/Chart.js/dist/FileServer.min.js')}}"></script>
    <script src="{{asset('asset/vendors/Chart.js/dist/canvas-to-blob.min.js')}}"></script>


    <!-- bootstrap-daterangepicker -->
    <script>

        $('.datepicker').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    </script>
    <!-- /bootstrap-daterangepicker -->

	 <!-- Datatables -->
    <script>
        $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($(".dt").length) {
            $(".dt").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "csv",
                  className: "btn-sm"
                },

                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
              ],
              responsive: true,
			  keys: true

            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();



        TableManageButtons.init();
      });
    </script>
 <!-- Select2 -->
    <script>
      $(document).ready(function() {

        $(".select2").select2({
          placeholder: "Select",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->
	<script type="text/javascript">

          $('#objective').change(function () {
            var url = '{{URL::to("api/targets")}}/' + $('#objective').val();
            var url2 = '{{URL::to("budget/zonal_consolidate")}}';
            var url3 = '{{URL::to("budget/overAll")}}';
            var current = '{{Route::getCurrentRoute()->getPath()}}';

                     var items = '';
                     $.ajax({
                         url: url,
                         dataType: 'json',
                         success: function (data) {
                             $.each(data, function (i, item) {
                                if(current == "budget/overAllConsolidate"){
                                  items += "<li><a class='list-group-item' href='"+url3 +"/"+ item.id + "'> Target " + item.target_no +": "+item.ta_description + "</a></li>";
                                }else{
                                 items += "<li><a class='list-group-item' href='"+url2 +"/"+ item.id + "'> Target " + item.target_no +": "+item.ta_description + "</a></li>";
                                }
                             });
                             $('#target').html(items);
                         }
                     });
                 });

    	</script>

		<!-- Pnotify -->
    <script>

        $(".submitted_notify").click(function(){
           new PNotify({
			  title: 'Budget Status',
			  text: 'You can not consolidate and unlock units, zone budget has been submitted!.',
			  type: 'info',
			  styling: 'bootstrap3'
		  });
        });

    </script>
		@yield('scripts')
</body>
</html>
