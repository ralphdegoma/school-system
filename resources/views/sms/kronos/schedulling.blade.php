@extends('sms.main.index')

@section('css_filtered')
@include('admin.csslinks.css_crud')
<link href="/assets/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
@stop

@section('content')



<div class="col-md-12">
  <div class="portlet box red">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-gift"></i>Below Pills
      </div>
      <div class="tools">
       
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
    <div class="col-lg-12">
        <div class="tabs-container">
            <div class="tabs-left">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-6"> Setup Schedule</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-7"> Assign Schedule</a></li>
                </ul>
                <div class="tab-content ">
                    <div id="tab-6" class="tab-pane active">
                        <div class="panel-body">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>FROM (Weekdays)</label>
                              <select class="form-control input-sm">
                                <option>Monday</option>
                                <option>Tuesday</option>
                                <option>Wednesday</option>
                                <option>Thursday</option>
                                <option>Friday</option>
                                <option>Saturday</option>
                                <option>Sunday</option>
                              </select>
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                              <label>TO (Weekdays)</label>
                              <select class="form-control input-sm">
                                <option>Monday</option>
                                <option>Tuesday</option>
                                <option>Wednesday</option>
                                <option>Thursday</option>
                                <option>Friday</option>
                                <option>Saturday</option>
                                <option>Sunday</option>
                              </select>
                            </div>
                         </div>
                         <div class="col-md-12">
                             <table class="table table-striped table-bordered table-hover" id="sample_6">
                                <thead>
                                <tr>
                                  <th>
                                      <div class="form-group">
                                        <select class="form-control input-sm">
                                          <option>None</option>
                                          <option>Check-In</option>
                                          <option>Break-Out</option>
                                          <option>Break-In</option>
                                          <option>Check-Out</option>
                                          <option>Overtime-In</option>
                                          <option>Overtime-Out</option>
                                        </select>
                                      </div>
                                  </th>
                                   <th>
                                      <div class="form-group">
                                        <select class="form-control input-sm">
                                          <option>None</option>
                                          <option>Check-In</option>
                                          <option>Break-Out</option>
                                          <option>Break-In</option>
                                          <option>Check-Out</option>
                                          <option>Overtime-In</option>
                                          <option>Overtime-Out</option>
                                        </select>
                                      </div>
                                  </th>
                                   <th>
                                      <div class="form-group">
                                        <select class="form-control input-sm">
                                          <option>None</option>
                                          <option>Check-In</option>
                                          <option>Break-Out</option>
                                          <option>Break-In</option>
                                          <option>Check-Out</option>
                                          <option>Overtime-In</option>
                                          <option>Overtime-Out</option>
                                        </select>
                                      </div>
                                  </th>
                                   <th>
                                      <div class="form-group">
                                        <select class="form-control input-sm">
                                          <option>None</option>
                                          <option>Check-In</option>
                                          <option>Break-Out</option>
                                          <option>Break-In</option>
                                          <option>Check-Out</option>
                                          <option>Overtime-In</option>
                                          <option>Overtime-Out</option>
                                        </select>
                                      </div>
                                  </th>
                                   <th>
                                      <div class="form-group">
                                        <select class="form-control input-sm">
                                          <option>None</option>
                                          <option>Check-In</option>
                                          <option>Break-Out</option>
                                          <option>Break-In</option>
                                          <option>Check-Out</option>
                                          <option>Overtime-In</option>
                                          <option>Overtime-Out</option>
                                        </select>
                                      </div>
                                  </th>
                                   <th>
                                      <div class="form-group">
                                        <select class="form-control input-sm">
                                          <option>None</option>
                                          <option>Check-In</option>
                                          <option>Break-Out</option>
                                          <option>Break-In</option>
                                          <option>Check-Out</option>
                                          <option>Overtime-In</option>
                                          <option>Overtime-Out</option>
                                        </select>
                                      </div>
                                  </th>
                                </tr>
                                </thead>
                                <tbody>
                                 <tr>
                                  <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                         </div>
                        <div class="col-md-12">
                          <div class="pull-right">
                            <button class="btn btn-primary">Apply Schedule</button>
                          </div>
                        </div>
                          <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover" id="sample_6">
                                <thead>
                                <tr>
                                  <th class="text-center">WEEKDAYS</th>
                                  <th>
                                      <div class="form-group">
                                        <select class="form-control input-sm">
                                          <option>None</option>
                                          <option>Check-In</option>
                                          <option>Break-Out</option>
                                          <option>Break-In</option>
                                          <option>Check-Out</option>
                                          <option>Overtime-In</option>
                                          <option>Overtime-Out</option>
                                        </select>
                                      </div>
                                  </th>
                                   <th>
                                      <div class="form-group">
                                        <select class="form-control input-sm">
                                          <option>None</option>
                                          <option>Check-In</option>
                                          <option>Break-Out</option>
                                          <option>Break-In</option>
                                          <option>Check-Out</option>
                                          <option>Overtime-In</option>
                                          <option>Overtime-Out</option>
                                        </select>
                                      </div>
                                  </th>
                                   <th>
                                      <div class="form-group">
                                        <select class="form-control input-sm">
                                          <option>None</option>
                                          <option>Check-In</option>
                                          <option>Break-Out</option>
                                          <option>Break-In</option>
                                          <option>Check-Out</option>
                                          <option>Overtime-In</option>
                                          <option>Overtime-Out</option>
                                        </select>
                                      </div>
                                  </th>
                                   <th>
                                      <div class="form-group">
                                        <select class="form-control input-sm">
                                          <option>None</option>
                                          <option>Check-In</option>
                                          <option>Break-Out</option>
                                          <option>Break-In</option>
                                          <option>Check-Out</option>
                                          <option>Overtime-In</option>
                                          <option>Overtime-Out</option>
                                        </select>
                                      </div>
                                  </th>
                                   <th>
                                      <div class="form-group">
                                        <select class="form-control input-sm">
                                          <option>None</option>
                                          <option>Check-In</option>
                                          <option>Break-Out</option>
                                          <option>Break-In</option>
                                          <option>Check-Out</option>
                                          <option>Overtime-In</option>
                                          <option>Overtime-Out</option>
                                        </select>
                                      </div>
                                  </th>
                                   <th>
                                      <div class="form-group">
                                        <select class="form-control input-sm">
                                          <option>None</option>
                                          <option>Check-In</option>
                                          <option>Break-Out</option>
                                          <option>Break-In</option>
                                          <option>Check-Out</option>
                                          <option>Overtime-In</option>
                                          <option>Overtime-Out</option>
                                        </select>
                                      </div>
                                  </th>
                                </tr>
                                </thead>
                                <tbody>
                                 <tr>
                                  <td><b>Monday</b></td>
                                  <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Tueday</td>
                                  <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Wednesday</td>
                                  <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Thursday</td>
                                  <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Friday</td>
                                  <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Saturday</td>
                                  <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                   <td>Sunday</td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                   <td class="text-center">
                                    <div class="form-group">
                                     <label>
                                      <input type="radio" id="default" value="AM" name="start_time">
                                      AM 
                                      </label>
                                      <label>
                                      <input type="radio" id="default" value="PM" name="start_time">
                                      PM 
                                      </label>
                                      <div class="input-group clockpicker" data-autoclose="true">
                                          <input type="text" class="form-control input-sm" value="09:30" >
                                          <span class="input-group-addon">
                                              <span class="fa fa-clock-o"></span>
                                          </span>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                </tbody>
                                </table>
                                </div>
                        </div>
                    </div>
                    <div id="tab-7" class="tab-pane">
                        <div class="panel-body">
                           <div class="col-md-6">
                            <div class="form-group">
                              <label>SCHEDULE TYPE</label>
                              <select class="form-control input-sm">
                                <option>Regular Time</option>
                                <option>Flexy Time</option>
                              </select>
                            </div>
                           </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
  </div>
</div>
<!-- END Portlet PORTLET-->

@stop
@section('js_filtered')
@include('admin.jslinks.js_crud')
@include('admin.jslinks.js_datatables')
<script src ="/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Clock picker -->
<script src="/assets/js/plugins/clockpicker/clockpicker.js"></script>
<script src="/assets/admin/pages/scripts/table-advanced.js"></script>


<script>
$(document).ready(function(){
    $('#summer-div').hide();

    $('#year').datepicker( {
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });
   
    $('.clockpicker').clockpicker({
    defaultTime: 'value',
    minuteStep: 1,
    disableFocus: true,
    template: 'dropdown',
    showMeridian:true
    });

    $("#year").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});


    $(document).ready(function(){
        studentTable();
    });


    
    function studentTable(){
      
      $('#student-table-list').dataTable().fnClearTable();
      $("#student-table-list").dataTable().fnDestroy();

          studentTableData = $('#student-table-list').DataTable({
          responsive: true,
          bAutoWidth:false,

          "fnRowCallback": function(nRow, aData, iDisplayIndex) {
            nRow.setAttribute('data-id',aData.row_id);
            nRow.setAttribute('class','ref_provider_info_class');
          },

          "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
            oSettings.jqXHR = $.ajax( {
              "dataType": 'json',
              "type": "GET",
              "url": sSource,
              "data": aoData,
              "success": function (data) {
                studentList = data;
                console.log(studentList);
                fnCallback(studentList);           
              }
            });
          },
                     
          "sAjaxSource": "/sms/registrar/get-students",
          "sAjaxDataProp": "",
          "iDisplayLength": 10,
          "scrollCollapse": false,
          "paging":         true,
          "searching": true,
          "columns": [
             
              {
                      "className":      'details-control',
                      "orderable":      false,
                      "data":           null,
                      "defaultContent": ''
              },
              { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<img src="/assets/people/students/'+oData.student_id+'/images/small.jpg"  style="margin:auto;width:70px;height:auto;"/>');
                }
              },
              { "mData": "student_id", sDefaultContent: ""},
              { "mRender" : function ( data, type, full ) { 
                        return full.last_name+ ", " + full.first_name + " " +full.middle_name; 
              }
              },
              { "mData": "home_address", sDefaultContent: ""},
              { "mData": "cp_no", sDefaultContent: ""},
              { "mData": "tel_no", sDefaultContent: ""},
              { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<button data-url="/sms/registrar/remove-section/'+oData.seminar_id+'" class="btn btn-danger btn-block btn-sm w-b laddaRemove" data-seminar-id="'+oData.seminar_id+'" id="ladda"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></button>');
                }
              },  

              { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="/admin/student/'+oData.student_id+'/edit" class="btn btn-info btn-block btn-sm w-b"><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
                }
              },  
          ]
      });

    }

    $('#student-table-list tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = studentTableData.row( tr );
            var row_id = $(tr).attr("data-id");
            
            if ( row.child.isShown() ) {
                  
              $('div.slider', row.child()).slideUp( function () {
                  row.child.hide();
                  tr.removeClass('shown');
              } );
              }
              else {
                  var prop_id_name = $(tr).attr("data-id");
                  row.child( format(row_id)).show();
                  $('div.slider', row.child()).slideDown();
                  tr.addClass('shown');
              }

          } );
    
    


    function format (row_id) {
        
               return '<div class="sliderHolder"><div class="slider" style="">'+
                        
                                '<div class="col-lg-12">'
                                    +'<div class="tabs-container">'
                                        +'<ul class="nav nav-tabs">'
                                            +'<li class="active"><a data-toggle="tab" href="#tab-3"> <i class="fa fa-laptop"></i></a></li>'
                                            +'<li class=""><a data-toggle="tab" href="#tab-4"><i class="fa fa-desktop"></i></a></li>'
                                            +'<li class=""><a data-toggle="tab" href="#tab-5"><i class="fa fa-database"></i></a></li>'
                                        +'</ul>'
                                        +'<div class="tab-content">'
                                            +'<div id="tab-3" class="tab-pane active">'
                                                +'<div class="panel-body">'
                                                    +'<strong>Lorem ipsum dolor sit amet, consectetuer adipiscing</strong>'

                                                    +'<p>A wonderfusssssssl serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of'
                                                        +'existence in this spot, which was created for the bliss of souls like mine.</p>'

                                                    +'<p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at'
                                                        'the present moment; and yet I feel that I never was a greater artist than now. When.</p>'
                                                +'</div>'
                                            +'</div>'
                                            +'<div id="tab-4" class="tab-pane">'
                                                +'<div class="panel-body">'
                                                    +'<strong>Donec quam felis</strong>'

                                                    +'<p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects'
                                                        +'and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>'

                                                    +'<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite'
                                                        'sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>'
                                                +'</div>'
                                            +'</div>'
                                            +'<div id="tab-5" class="tab-pane">'
                                                +'<div class="panel-body">'
                                                    +'<strong>Donec quam felis</strong>'

                                                    +'<p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects'
                                                        +'and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>'

                                                    +'<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite'
                                                        +'sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>'
                                                +'</div>'
                                            +'</div>'
                                        +'</div>'
                                    +'</div>'
                                +'</div>'






                      +'</div></div>';  
      
    }
</script>



<script type="text/javascript">
$(function(){
  $('#profiletabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    
    $('#profiletabs ul li a').removeClass('sel');
    $(this).addClass('sel');
    
    $('#content section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    });
    
    $(newcontent).removeClass('hidden');
  });
});
</script>
@stop