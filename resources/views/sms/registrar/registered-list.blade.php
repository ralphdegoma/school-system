@extends('sms.main.index')

@section('css_filtered')
@include('admin.csslinks.css_crud')
<link href="/assets/css/custom/studentlist.css" rel="stylesheet">
<style type="text/css">
      
      .grid_space{
          margin-top:6px;
          margin-bottom: 3px;
      }

</style>
@stop

@section('content')

<div class="col-md-12">
  <div class="wyred-box-header">
    <h3 class="wyred-box-title"><i class="fa fa-user"></i> REGISTERED LIST</h3>
  </div>
  <div class="wyred-box-body">
  <div class="row">
    <div class="col-md-12">
      <div class="panel-group" id="accordion">
        


                  <div class="page-content-wrap">
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <p>Use search to find contacts. You can search by: name, address, phone. Or use the advanced search.</p>
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="fa fa-search"></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Who are you looking for?"/>
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-primary">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="/sms/registrar/student-registration"><button class="btn btn-success btn-block"><span class="fa fa-plus"></span> Add new contact</button></a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="row">


                        @foreach($students as $students)

                        <?php                            
                            $age = floor((time() - strtotime($students->birthday)) / 31556926);
                        ?>
                        <div class="col-md-3 grid_space" >
                            <!-- CONTACT ITEM -->
                            <div class="panel panel-default">
                                <div class="panel-body profile">
                                    <div class="profile-image">
                                        <img src="/assets/img/default.png" alt="Nadia Ali"/>
                                    </div>
                                    <div class="profile-data">
                                        <div class="profile-data-name">{{$students->last_name}}, {{$students->first_name}} {{$students->middle_name}}</div>
<!--                                         <div class="profile-data-title">Singer-Songwriter</div>
 -->                                    </div>
                                    <div class="profile-controls">
                                        <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
                                        <a href="#" class="profile-control-right"><span class="fa fa-phone"></span></a>
                                    </div>
                                </div>                                
                                <div class="panel-body">                                    
                                    <div class="contact-info">
                                        <p><small>Age</small><br/>{{$age}}</p>
                                        <p><small>Address</small><br/>{{$students->home_address}}</p>
                                        <p><small>Status</small><br/>Active</p>                                   
                                    </div>
                                </div>                                
                            </div>
                            <!-- END CONTACT ITEM -->
                        </div>

                        @endforeach


                      


                    <div class="row">
                        <div class="col-md-12">
                            <ul class="pagination pagination-sm pull-right push-down-10 push-up-10">
                                <li class="disabled"><a href="#">«</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>                                    
                                <li><a href="#">»</a></li>
                            </ul>                            
                        </div>
                    </div>

                </div>











    </div>
    </div>
    <div class="col-md-12">
     
      </div>
  </div>
</div>
<div class="wyred-box-footer">
 
</div>
</div>


<div class="modal inmodal fade" id="enrolled-student" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


              <div class="wyred-box-header" style="margin-top:-10px;">
                <h3 class="wyred-box-title"><i class="fa fa-calendar"></i> STUDENT SCHEDULE</h3>
              </div>
              <div class="wyred-box-body">
              <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>STUDENT NAME</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="gradeX">
                        <td>RALPH DEGOMA</td>
                    </tr>
                    </tbody>
                    </table>
                  </div>
             <div class="form-group">
                 <label>CLASS TYPE</label>
                  <select class="form-control input-sm" id="classTypeR">
                    <option value="REGULAR CLASS">Regular Class</option>
                    <option value="SUMMER CLASS">Summer Class</option>
                  </select>
                </div>
                <div class="form-group">
                 <label>GRADE TYPE</label>
                  <select class="form-control input-sm">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
               <div class="form-group">
                 <label>GRADE LEVEL</label>
                  <select class="form-control input-sm">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
                 <div id="summer-div-request">
                 <div class="form-group">
                 <label class="text-red">SUBJECT</label>
                  <select class="form-control input-sm">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
                </div>
                 <div class="form-group">
                 <label>TIME</label>
                  <select class="form-control input-sm">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
                 <div class="form-group" id="section-div-request">
                 <label>SECTION</label>
                  <select class="form-control input-sm">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
              </div>
             </div>
             </div>
             <div class="wyred-box-footer">
                <div class="wyred-button col-md-12">
                    <button class="btn btn-info btn-block">UPDATE ENROLLEE</button>
                </div>
            </div>
 
        </div>
    </div>
</div>

@stop
@section('js_filtered')
@include('admin.jslinks.js_crud')
@include('admin.jslinks.js_datatables')
<script src ="/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

    
<script>
$(document).ready(function(){
    $('#summer-div').hide();

    $('#year').datepicker( {
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });
   
     $('#classType').change(function(){
      if(this.value == 'SUMMER CLASS'){
        $('#summer-div').show();
        $('#section-div').hide();
      }else if(this.value == 'REGULAR CLASS'){
        $('#summer-div').hide();
         $('#section-div').show();
      }
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