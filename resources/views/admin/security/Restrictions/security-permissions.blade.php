
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
    <h3 class="wyred-box-title"><i class="fa fa-user"></i> Security Permissions</h3>
  </div>
  <div class="wyred-box-body">
  <div class="row">

          <div class="col-lg-12">
                    <div class="tabs-container">

                        <div class="tabs-left">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-6">Permission Creation</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-7"></a></li>
                            </ul>
                            <div class="tab-content ">
                                <div id="tab-6" class="tab-pane active">
                                    <div class="panel-body">
                                            
                                            <div class="col-md-12" style="margin-bottom: 30px">
                                                <a class="btn btn-primary btn-rounded pull-right" href="#"> + Add New Permission</a>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Permission Id</th>
                                                        <th>Permission Name</th>
                                                        <th>Permission Description</th>
                                                        <th>Edit</th>
                                                        <th>Remove</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="gradeX">
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="center"></td>
                                                        <td class="center"></td>
                                                    </tr>
                                                    
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Permission Id</th>
                                                        <th>Permission Name</th>
                                                        <th>Permission Description</th>
                                                        <th>Edit</th>
                                                        <th>Remove</th>
                                                    </tfoot>
                                                    </table>
                                                    </div>
                                            </div>


                                    </div>
                                </div>
                                <div id="tab-7" class="tab-pane">
                                    <div class="panel-body">
                                        <strong>Donec quam felis</strong>

                                        <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                            and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                                        <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                            sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                    </div>
                                </div>
                            </div>

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