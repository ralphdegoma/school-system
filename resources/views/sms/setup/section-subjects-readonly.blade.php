  
<!-- HAHAHAH -->
<p></p>
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
                                <th class="text-center">SUBJECT NAME</th>
                                <th class="text-center">SUBJECT TEACHER</th>
                                <th class="text-center">START TIME</th>
                                <th class="text-center">END TIME</th>
                            </tr>
                          </thead>
                          <tbody>
                 
                    @if(count($week->HandleSubjects) != 0)
                          @foreach($week->HandleSubjects as $HandleSubjects)

                          <tr>
                           
                              <td>
                                
                                <input type="hidden" name="assign_subject_id{{$week->weekdays_id}}[]" value="{{$HandleSubjects->assign_subject_id}}"> {{$HandleSubjects->DtAssignSubject->getSubjects->subject_name}}</td>
                              <td>
                                 <div class="form-group">
                                  <select disabled class="form-control input-sm" name="employee_id{{$week->weekdays_id}}{{$HandleSubjects->assign_subject_id}}" style="width:240px">
                                    @foreach($KronosEmployee as $employee)
                                    <option @if($HandleSubjects->employee_id == $employee->employee_id) selected  @endif value="{{$employee->employee_id}}">{{$employee->last_name}},{{$employee->first_name}} {{$employee->middle_name}}</option>
                                    @endforeach
                                  </select>
                               </div>
                              </td>
                              <td class="text-center">

                                <div class="form-group">
                                      {{$HandleSubjects->start_time}} {{$HandleSubjects->start_time_type}}
                                </div>
                              </td>
                              <td class="text-center">
                                  <div class="form-group">
                                      {{$HandleSubjects->end_time}} {{$HandleSubjects->end_time_type}}
                                  </div>
                              </td>
                          </tr>
                          @endforeach
                    
                    @else
                      <tr>
                          <td colspan="5" rowspan="5" class="text-center">NO SCHEDULE AVAILABLE</td>
                      </tr>

                    @endif

                    </tbody>
                          </table>
                        </div>
                </div>               
      @endforeach
            

      @else
          

           <?php 

                if(count($weekdays[0]->HandleSubjects)  > 0){
                    $start_time_type = $weekdays[0]->HandleSubjects[0]->Schedule->start_time_type;
                    $start_time = $weekdays[0]->HandleSubjects[0]->Schedule->start_time;
                }else{
                    $start_time_type = "";
                    $start_time = "";
                }

                if(count($weekdays[0]->HandleSubjects)  > 0){
                    $end_time_type = $weekdays[0]->HandleSubjects[0]->Schedule->end_time_type;
                    $end_time = $weekdays[0]->HandleSubjects[0]->Schedule->end_time;
                }else{
                    $end_time_type = "";
                    $end_time = "";
                }

                

            ?>

            <div class="col-md-12">
                     <div class="class-schedule" style="z-index: 99999">
                <div class="form-group">
                 <label>Start Time</label>
                   <label>
                    <input type="radio" @if($start_time_type == "AM") checked  @endif  value="AM" name="section_start_time_type">
                    AM 
                  </label>
                  <label>
                    <input type="radio" @if($start_time_type == "PM") checked  @endif value="PM" name="section_start_time_type" >
                    PM 
                  </label>
                  <div class="input-group clockpicker" data-autoclose="true">
                      <input type="text" class="form-control" value="{{$start_time}}" name="section_start_time">
                      <span class="input-group-addon">
                          <span class="fa fa-clock-o"></span>
                      </span>
                  </div>
                </div>
                 <div class="form-group">
                 <label>End Time</label>
                   <label>
                    <input type="radio" @if($end_time_type == "AM") checked  @endif value="AM" name="section_end_time_type">
                    AM 
                  </label>
                  <label>
                    <input type="radio" @if($end_time_type == "PM") checked  @endif value="PM" name="section_end_time_type">
                    PM 
                  </label>
                  <div class="input-group clockpicker" data-autoclose="true">
                      <input type="text" class="form-control" value="{{$end_time}}" name="section_end_time">
                      <span class="input-group-addon">
                          <span class="fa fa-clock-o"></span>
                      </span>
                  </div>
                </div>
                </div>
              </div>



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
                 
                    @if(count($week->HandleSubjects) != 0)
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
                                    <option @if($HandleSubjects->employee_id == $employee->employee_id) selected  @endif value="{{$employee->employee_id}}">{{$employee->last_name}},{{$employee->first_name}} {{$employee->middle_name}}</option>
                                    @endforeach
                                  </select>
                               </div>
                              </td>
                              <td class="text-center">
                                <div class="form-group">
                                 <label>
                                <input type="radio" @if($HandleSubjects->start_time_type == "AM") checked  @endif class="" value="AM" name="start_time_type{{$week->weekdays_id}}{{$HandleSubjects->assign_subject_id}}">
                                AM 
                                </label>
                                <label>
                                <input type="radio" @if($HandleSubjects->start_time_type == "PM") checked  @endif class="" value="PM" name="start_time_type{{$week->weekdays_id}}{{$HandleSubjects->assign_subject_id}}">
                                PM 
                                </label>
                               
                                <div class="input-group clockpicker" data-autoclose="true">
                                    <input type="text" class="form-control" value="{{$HandleSubjects->start_time}}" name="start_time{{$week->weekdays_id}}{{$HandleSubjects->assign_subject_id}}">
                                    <span class="input-group-addon">
                                        <span class="fa fa-clock-o"></span>
                                    </span>
                                </div>
                                </div>
                              </td>
                              <td class="text-center">
                                  <div class="form-group">
                                   <label>
                                  <input type="radio" @if($HandleSubjects->end_time_type == "AM") checked  @endif class="" value="AM" name="end_time_type{{$week->weekdays_id}}{{$HandleSubjects->assign_subject_id}}">
                                  AM 
                                  </label>
                                  <label>
                                  <input type="radio" @if($HandleSubjects->end_time_type == "PM") checked  @endif class="" value="PM" name="end_time_type{{$week->weekdays_id}}{{$HandleSubjects->assign_subject_id}}">
                                  PM 
                                  </label>
                                 
                                  <div class="input-group clockpicker" data-autoclose="true">
                                      <input type="text" class="form-control" value="{{$HandleSubjects->end_time}}"  name="end_time{{$week->weekdays_id}}{{$HandleSubjects->assign_subject_id}}">
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
                          <td colspan="5" rowspan="5" class="text-center">NO SCHEDULE AVAILABLE</td>
                      </tr>

                    @endif

                    </tbody>
                          </table>
                        </div>
                </div>               
      @endforeach
           

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