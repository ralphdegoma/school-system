<!DOCTYPE html>
<html>
	<head>
		<link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('/assets/css/custom/rhitsReports.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
		<link href="http://{{$_SERVER['HTTP_HOST']}}/assets/css/plugins/chartist/chartist.min.css" rel="stylesheet">
		<style type="text/css">

				.table > thead > tr > th {
				  border-bottom: 1px solid #DDDDDD;
				  vertical-align: bottom;

				 }
				 body{
				 	padding-top:20px;
				 }
				 table{
				 	width: 100%;
				 	border:1px solid #000000;
				 	border-collapse: collapse;
				 }
				 th,td{
				 	border: 1px solid #000000;
				 }
				 .white{
				 	background-color:white !important; 
				 }

				 .table-bordered > thead > tr > th, .table-bordered > thead > tr > td {
				  background-color: #F5F5F6;
				  border-bottom-width: 1px;

				}
				.padding{
					padding-left: 10px;
				}
				.holder{
					border: 1px solid #DDDDDD;
					margin-bottom: 20px;
					padding:20px;
				}

				.bordered{
					border: 1px solid #DDDDDD;
				}

		</style>
		<title>Population Report</title>
	</head>


<body>


	<div class="page-num">Page 1</div>
	<div class="body-legal col-100" >
		<div class ="header col-md-12">
			<div class="col-md-12">
					<h3 class="t-center bold">SCHOOL OF THE MORNING STAR</h3>
					<h4 class="t-center bold">BUTUAN CITY</h4>
					<p class="t-center"></p>
					<p class="t-center"><i></i></p>
					<h2 class="text-center">Student Masterlist</h2>
			</div>
		</div>

		<div class="col-md-12" style="margin-bottom: 10px;">
			<div class="col-xs-12">
				<h4>Grade Level: {{$grade->grade_level}}</h4>
				<h4>Section : {{$sec->section_name}}</h4>
			</div>
			<div class="col-xs-12">
				
						@foreach($populations as $schedule)
							@foreach($schedule->Schedule()->where('school_year_id','2')->get() as $sched)
									<table>
									<tr>
										<th width="30"></th>
										<th class="text-center">First Name</th>
										<th class="text-center">Last Name</th>
									</tr>
									<?php $counter=1; ?>
								@foreach($sched->StudentSchedule as $studsched)
						
									<tr>
										<td>{{$counter}}.</td>
										<td class="text-left padding">{{$studsched->Students->first_name}}</td>
										<td class="text-left padding">{{$studsched->Students->last_name}}</td>
									</tr>
									<?php $counter++; ?>
								@endforeach
									</table>
							@endforeach
						@endforeach
			</div>
		</div>

</body>

</html>

