
@extends('sms.main.index')

@section('css_filtered')
@include('admin.csslinks.css_crud')
<link href="/assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="/assets/css/plugins/switchery/switchery.css" rel="stylesheet">
@stop

@section('content')

<div class="col-md-12">
  <div class="wyred-box-header">
    <h3 class="wyred-box-title"><i class="fa fa-rocket"></i> SECURITY MENUS</h3>
  </div>
  <div class="wyred-box-body">
  <div class="row">

          <a href="/admin/security/security-permissions">
            <div class="col-md-3" >
                   <div class="widget yellow-bg p-lg text-center" style="height:220px">
                          <div class="m-b-md">
                              <i class="fa fa-shield fa-4x"></i>
                              <h1 class="m-xs">Security Permissions</h1>
                              
                              <small>Here, the developer creates unique permissions in your system.</small><br/>
                              <small>Access Level : Developer </small>
                          </div>
                    </div>
            </div>
          </a>

          <div class="col-md-3" >
                 <div class="widget red-bg p-lg text-center" style="height:220px">
                        <div class="m-b-md">
                            <i class="fa fa-warning fa-4x"></i>
                            <h1 class="m-xs">Roles</h1>
                            
                            <small>Every Account has a specific roles in order to have an access to specific modules. </small><br/>
                        </div>
                  </div>
          </div>


          <div class="col-md-3" >
                 <div class="widget navy-bg p-lg text-center" style="height:220px">
                        <div class="m-b-md">
                            <i class="fa fa-key fa-4x"></i>
                            <h1 class="m-xs">Account Accessibility</h1>
                            
                            <small>This module is created for account restriction and allowing or disallowing specific accounts to have an access to the system.</small><br/>
                        </div>
                  </div>
          </div>

          <div class="col-md-3" >
                 <div class="widget lazur-bg p-lg text-center" style="height:220px">
                        <div class="m-b-md">
                            <i class="fa fa-users fa-4x"></i>
                            <h1 class="m-xs">Account Management</h1>
                            
                            <small>Module for account creation.</small><br/>
                        </div>
                  </div>
          </div>

  </div>
</div>

</div>



@stop
@section('js_filtered')
@include('admin.jslinks.js_crud')

<script src ="/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>



@stop