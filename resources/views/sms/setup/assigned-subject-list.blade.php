
		<div class="table-responsive">
		<table id="assignTable" class="table table-striped table-bordered table-hover " >
		<thead>
		  <tr>
		      <th>SUBJECTS ASSIGNED</th>
		  </tr>
		</thead>
		<tbody>
		@foreach($DtAssignSubject as $subjects)
			<tr>
			    <td class="text-center">{{$subjects->getSubjects->subject_name}}</td>
			</tr>
		@endforeach
		</tbody>
		</table>
		</div>

