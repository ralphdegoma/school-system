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
                 
                      @foreach($section_subjects as $subjects)

                      <tr>
                          <td>
                              <input type="hidden" name="check{{$week->weekdays_id}}{{$subjects->assign_subject_id}}"  value="false">
                              <input type="checkbox" name="check{{$week->weekdays_id}}{{$subjects->assign_subject_id}}" value="true" class="">
                          </td>
                          <td>
                            
                            <input type="hidden" name="assign_subject_id{{$week->weekdays_id}}[]" value="{{$subjects->assign_subject_id}}"> {{$subjects->getSubjects->subject_name}}</td>
                          <td>
                             <div class="form-group">
                              <select class="form-control input-sm" name="employee_id{{$week->weekdays_id}}{{$subjects->assign_subject_id}}" style="width:240px">
                                @foreach($KronosEmployee as $employee)
                                <option value="{{$employee->employee_id}}">{{$employee->last_name}},{{$employee->first_name}} {{$employee->middle_name}}</option>
                                @endforeach
                              </select>
                           </div>
                          </td>
                          <td class="text-center">
                            <div class="form-group">
                             <label>
                            <input type="radio" checked class="" value="AM" name="start_time_type{{$week->weekdays_id}}{{$subjects->assign_subject_id}}">
                            AM 
                            </label>
                            <label>
                            <input type="radio" class="" value="PM" name="start_time_type{{$week->weekdays_id}}{{$subjects->assign_subject_id}}">
                            PM 
                            </label>
                           
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" class="form-control" value="09:30" name="start_time{{$week->weekdays_id}}{{$subjects->assign_subject_id}}">
                                <span class="input-group-addon">
                                    <span class="fa fa-clock-o"></span>
                                </span>
                            </div>
                            </div>
                          </td>
                          <td class="text-center">
                              <div class="form-group">
                               <label>
                              <input type="radio" class="" value="AM" name="end_time_type{{$week->weekdays_id}}{{$subjects->assign_subject_id}}">
                              AM 
                              </label>
                              <label>
                              <input type="radio" checked class="" value="PM" name="end_time_type{{$week->weekdays_id}}{{$subjects->assign_subject_id}}">
                              PM 
                              </label>
                             
                              <div class="input-group clockpicker" data-autoclose="true">
                                  <input type="text" class="form-control" value="09:30"  name="end_time{{$week->weekdays_id}}{{$subjects->assign_subject_id}}">
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
                  </div>               
@endforeach

<script type="text/javascript">
    $('.clockpicker').clockpicker({
        defaultTime: 'value',
        minuteStep: 1,
        disableFocus: true,
        template: 'dropdown',
        showMeridian:false
    });
</script>