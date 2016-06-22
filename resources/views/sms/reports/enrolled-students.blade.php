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
					<h2 class="text-center">{{$sy->sy_from}}-{{$sy->sy_to}} Enrollment Report</h2>
			</div>
		</div>

		<div class="col-md-12" style="margin-bottom: 10px;">
			@foreach($populations as $gradetype)
			<div class="col-xs-12 bg-primary"><h4>{{$gradetype->grade_type}}</h4></div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th></th>
						@foreach($gradetype->getGradeLevel as $gradelevel)
							<th class="text-center">{{$gradelevel->grade_level}}</th>
						@endforeach
						<th class="text-center">TOTAL</th>
					</tr>
					<tr>
						<td>Male</td>
						@foreach($gradetype->getGradeLevel as $gradelevel)
							<td class="white">
							<?php $count=0;$gender='Male';$totalM = 0; ?>
								@foreach($gradelevel->getSection as $section)
									@foreach($section->Schedule as $sched)
										@foreach($sched->StudentSchedule as $studentsched)
											<?php $count = $count + $studentsched->Students()->where('gender',$gender)->count(); $totalM =+ $count;?>
										@endforeach
									@endforeach
								@endforeach
								{{$count}}
							</td>
						@endforeach
						<td class="white">{{$totalM}}</td>
					</tr>
					<tr>
						<td>Female</td>
						@foreach($gradetype->getGradeLevel as $gradelevel)
							<td class="white">
							<?php $count=0;$gender='Female';$totalF = 0; ?>
								@foreach($gradelevel->getSection as $section)
									@foreach($section->Schedule as $sched)
										@foreach($sched->StudentSchedule as $studentsched)
											<?php $count = $count + $studentsched->Students()->where('gender',$gender)->count(); $totalF =+ $count;?>
										@endforeach
									@endforeach
								@endforeach
								{{$count}}
							</td>
						@endforeach
						<td class="white">{{$totalF}}</td>
					</tr>
					<tr>
						<td>TOTAL</td>
						@foreach($gradetype->getGradeLevel as $gradelevel)
							<td class="white">
							<?php $count=0;$totalF = 0; ?>
								@foreach($gradelevel->getSection as $section)
									@foreach($section->Schedule as $sched)
										@foreach($sched->StudentSchedule as $studentsched)
											<?php $count = $count + $studentsched->Students()->count();?>
										@endforeach
									@endforeach
								@endforeach
								{{$count}}
							</td>
						@endforeach
						<td class="white">{{$totalF+$totalM}}</td>
					</tr>
				</thead>	
			</table>
			@endforeach
			<div class="col-xs-12">
				<div class="col-xs-5">
					<h3 class="text-center">SUMMARY REPORT</h3>
					<table class="table table-bordered">
					<?php $total=0; ?>
						@foreach($populations as $gradetype)
							<tr>
								<th>{{$gradetype->grade_type}}</th>
								<td>
								<?php $count=0;?>
								@foreach($gradetype->getGradeLevel as $gradelevel)
								@foreach($gradelevel->getSection as $section)
									@foreach($section->Schedule as $sched)
										@foreach($sched->StudentSchedule as $studentsched)
											<?php $count = $count + $studentsched->Students()->count();
											 ?>
										@endforeach
									@endforeach
								@endforeach					
						@endforeach
								{{$count}}
								<?php $total = $total + $count; ?>
								</td>
							</tr>
						@endforeach
						<tr>
							<th>TOTAL</th>
							<th class="text-center">{{$total}}</th>
						</tr>
					</table>
				</div>
			</div>	
		</div>

</body>

</html>

