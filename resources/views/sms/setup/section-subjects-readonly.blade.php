  


@if($update == "false")
              @foreach($weekdays as $week)
                  <input type="hidden" name="weekdays[]"  value="{{$week->weekdays_id}}">
                                <div class="text-center weekday-header">
                                  <h3>{{$week->weekdays}}</h3>
                                </div>
                             <div class="col-md-12" id="section_subjects" >

                                 <div class="table-responsive">
                                    <table id="subjectTable" class="table table-striped table-bordered table-hover " >
                                    <thead>
                                      <tr>
                                          <th class="text-center">ACTION</th>
                                          <th class="text-center">SUBJECT NAME</th>
                                          <th class="text-center">SUBJECT TEACHER</th>
                                          <th class="text-center">START TIME</th>
                                          <th class="text-center">END TIME</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                              @if($week->HandleSubjects != "")
                                    @foreach($week->HandleSubjects as $HandleSubjects)

                                    <tr>
                                        <td>
                                            <input type="hidden" name="check{{$week->weekdays_id}}{{$HandleSubjects->assign_subject_id}}"  value="false">
                                            <input type="checkbox" @if($HandleSubjects->assign_subject_id != "") checked  @endif name="check{{$week->weekdays_id}}{{$HandleSubjects->assign_subject_id}}" value="true" class="">
                                        </td>
                                        <td>
                                          
                                          <input type="hidden" name="assign_subject_id{{$week->weekdays_id}}[]" value="{{$HandleSubjects->assign_subject_id}}"> {{$HandleSubjects->DtAssignSubject->getSubjects->subject_name}}</td>
                                        <td>
                                           <div class="form-group">
                                            <select class="form-control input-sm" name="employee_id{{$week->weekdays_id}}{{$HandleSubjects->assign_subject_id}}" style="width:240px">
                                              @foreach($KronosEmployee as $employee)
                                              <option value="{{$employee->employee_id}}">{{$employee->last_name}},{{$employee->first_name}} {{$employee->middle_name}}</option>
                                              @endforeach
                                            </select>
                                         </div>
                                        </td>
                                        <td class="text-center">
                                          <div class="form-group">
                                           <label>
                                          <input type="radio" checked class="clockpicker" value="AM" name="start_time_type{{$week->weekdays_id}}{{$HandleSubjects->assign_subject_id}}">
                                          AM 
                                          </label>
                                          <label>
                                          <input type="radio" class="clockpicker" value="PM" name="start_time_type{{$week->weekdays_id}}{{$HandleSubjects->assign_subject_id}}">
                                          PM 
                                          </label>
                                         
                                          <div class="input-group clockpicker" data-autoclose="true">
                                              <input type="text" class="form-control" value="09:30" name="start_time{{$week->weekdays_id}}{{$HandleSubjects->assign_subject_id}}">
                                              <span class="input-group-addon">
                                                  <span class="fa fa-clock-o"></span>
                                              </span>
                                          </div>
                                          </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group">
                                             <label>
                                            <input type="radio" class="clockpicker" value="AM" name="end_time_type{{$week->weekdays_id}}{{$HandleSubjects->assign_subject_id}}">
                                            AM 
                                            </label>
                                            <label>
                                            <input type="radio" checked class="clockpicker" value="PM" name="end_time_type{{$week->weekdays_id}}{{$HandleSubjects->assign_subject_id}}">
                                            PM 
                                            </label>
                                           
                                            <div class="input-group clockpicker" data-autoclose="true">
                                                <input type="text" class="form-control" value="09:30"  name="end_time{{$week->weekdays_id}}{{$HandleSubjects->assign_subject_id}}">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-clock-o"></span>
                                                </span>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                


                        @else


                                <tr>
                                    <td class="text-center">ACTION</td>
                                    <td class="text-center">SUBJECT NAME</td>
                                    <td class="text-center">SUBJECT TEACHER</td>
                                    <td class="text-center">START TIME</td>
                                    <td class="text-center">END TIME</td>
                                </tr>

                        @endif

                                    </tbody>
                                    </table>
                                  </div>
                                </div>               
@endforeach
            

@else
          


          <div class="col-md-12" id="edit_section_subjects" >

                  <div class="class-schedule" style="z-index: 99999">
                <div class="form-group">
                 <label>Start Time</label>
                   <label>
                    <input type="radio" @if($schedule->start_time_type == "AM") checked  @endif class="clockpicker" value="AM" id="section_time_am" name="section_start_time_type">
                    AM 
                  </label>
                  <label>
                    <input type="radio" @if($schedule->start_time_type == "PM") checked  @endif class="clockpicker" value="PM" id="section_time_pm" name="section_start_time_type" >
                    PM 
                  </label>
                  <div class="input-group clockpicker" data-autoclose="true">
                      <input type="text" class="form-control" value="{{$schedule->start_time}}" id="edit_section_start_time" name="section_start_time">
                      <span class="input-group-addon">
                          <span class="fa fa-clock-o"></span>
                      </span>
                  </div>
                </div>
                 <div class="form-group">
                 <label>End Time</label>
                   <label>
                    <input type="radio" @if($schedule->end_time_type == "AM") checked  @endif value="AM" name="section_end_time_type">
                    AM 
                  </label>
                  <label>
                    <input type="radio" @if($schedule->end_time_type == "PM") checked  @endif  value="PM" name="section_end_time_type">
                    PM 
                  </label>
                  <div class="input-group clockpicker" data-autoclose="true">
                      <input type="text" class="form-control" value="{{$schedule->end_time}}" id="edit_section_end_time" name="section_end_time">
                      <span class="input-group-addon">
                          <span class="fa fa-clock-o"></span>
                      </span>
                  </div>
                </div>
                </div>
                   <div class="table-responsive">
                      <table id="subjectTable" class="table table-striped table-bordered table-hover " >
                      <thead>
                        <tr>
                            <th class="text-center">SUBJECT NAME</th>
                            <th class="text-center">SUBJECT TEACHER</th>
                            <th class="text-center">START TIME</th>
                            <th class="text-center">END TIME</th>
                        </tr>
                      </thead>
                      <tbody>

                      @foreach($section_subjects as $subjects2)

                        
                        <tr>
                            <td><input type="hidden" name="assign_subject_id[]" value="{{$subjects2->assign_subject_id}}"> {{$subjects2->DtAssignSubject->getSubjects->subject_name}}</td>
                            <td>
                               <div class="form-group">
                                <select class="form-control input-sm" name="employee_id[]" style="width:240px">
                                  @foreach($KronosEmployee as $employee2)
                                  <option  @if($subjects2->employee_id == $employee2->employee_id) selected  @endif value="{{$employee2->employee_id}}">{{$employee2->last_name}},{{$employee2->first_name}} {{$employee2->middle_name}}</option>
                                  @endforeach
                                </select>
                             </div>
                            </td>
                            <td class="text-center">
                              <div class="form-group">
                               <label>
                              <input type="radio" @if($subjects2->start_time_type == "AM") checked  @endif  value="AM" name="start_time_type{{$subjects2->assign_subject_id}}">
                              AM 
                              </label>
                              <label>
                              <input type="radio" @if($subjects2->start_time_type == "PM") checked  @endif  value="PM" name="start_time_type{{$subjects2->assign_subject_id}}">
                              PM 
                              </label>
                             
                              <div class="input-group clockpicker" data-autoclose="true">
                                  <input type="text" class="form-control" value="{{$subjects2->start_time}}" name="start_time[]">
                                  <span class="input-group-addon">
                                      <span class="fa fa-clock-o"></span>
                                  </span>
                              </div>
                              </div>
                            </td>
                            <td class="text-center">
                                <div class="form-group">
                                 <label>
                                <input type="radio" @if($subjects2->end_time_type == "AM") checked  @endif  value="AM" name="end_time_type{{$subjects2->assign_subject_id}}">
                                AM 
                                </label>
                                <label>
                                <input type="radio" @if($subjects2->end_time_type == "PM") checked  @endif  value="PM" name="end_time_type{{$subjects2->assign_subject_id}}">
                                PM 
                                </label>
                               
                                <div class="input-group clockpicker" data-autoclose="true">
                                    <input type="text" class="form-control" value="{{$subjects2->end_time}}"  name="end_time[]">
                                    <span class="input-group-addon">
                                        <span class="fa fa-clock-o"></span>
                                    </span>
                                </div>
                                </div>
                            </td>
                        </tr>
                      @endforeach



                      </tbody>
                      </table>
                    </div>

@endif


<script type="text/javascript">
    $('.clockpicker').clockpicker({
        defaultTime: 'value',
        minuteStep: 1,
        disableFocus: true,
        template: 'dropdown',
        showMeridian:false
    });
</script>