@extends('sms.main.index')
@section('css_filtered')
@include('admin.csslinks.datatables_css')
@include('admin.csslinks.css_crud')
<link href="/assets/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
@stop

@section('content')

<div class="col-md-12">
  <div class="portlet box red">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-gift"></i> Assign Subject List
      </div>
      <div class="tools">
         <div class="pull-right" style="margin-top:-5px;">
              <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#add-assignsubject"><i class="fa fa-plus"></i> ASSIGN NEW SUBJECT</button>
         </div>
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
       <div class="col-md-12">
          <div class="table-responsive">
            <table id="assignTable" class="table table-striped table-bordered table-hover " >
            <thead>
              <tr>
                  <th>MORE</th>
                  <th>GRADE LEVEL</th>
                  <th>SECTION TYPE</th>
                  <th>ACTION</th>
                  <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
            </table>
          </div>
        </div>
     </div>
  </div>
</div>





<div class="modal fade draggable-modal mo-z drag-me" id="add-assignsubject"  role="basic" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Assign Subject</h4>
      </div>
      <div class="modal-body">
          <form id="setupSubject">
          <div class="form-group">
              <label>GRADE TYPE</label>
              <input type = "hidden" name="grade_level_id" id="grade_level_id">
              <input type = "hidden" name="section_type_id" id="section_type_id">
              <select class="form-control input-sm" name="gradeTypeSubject" onchange="changeGradeLevelSubject()" id="gradeTypeSubject" required>
                  <option></option>
                  @foreach($gradeType as $keyVal)
                      <option value="{{$keyVal->grade_type_id}}">{{$keyVal->grade_type}}</option>
                  @endforeach
              </select>
                </div>
                <div class="form-group">
                 <label>GRADE LEVEL</label>
                  <select class="form-control input-sm" name="grade_level" data-id="grade_level_id" data-name="grade_level" data-url="/select-binder/get-gradeLevel" id="gradeLevelSubject" required>
                </select>
                </div>
                <div class="form-group">
                 <label>Section Type</label>
                  <select class="form-control input-sm" id="section_type" name="section_type" required>
                        <option value="all">All except Summer</option>
                    @foreach($sectionType as $section)
                        <option value="{{$section->section_type_id}}">{{$section->section_type}}</option>
                    @endforeach
                </select>
                </div>
                 <div class="form-group">
                    <label>SUBJECT</label>
                    <select class="form-control input-sm select2" multiple="multiple" name="gradeSubject[]" id="gradeSubjects" required>
                    @foreach($subject as $subjects)
                      <option value="{{$subjects->subject_id}}">{{$subjects->subject_name}}</option>
                    @endforeach
                    </select>
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
       <button class="btn btn-info wyredModalCallback" data-toggle="modal" data-url="/sms/registrar/assign-subject" data-form="setupSubject" data-target="#wyredSaveModal">SAVE</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div id="modalDeleteGradelevelSubjects" class="modal fade security-mo-z" tabindex="-1" style="z-index:99999" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Confirmation</h4>
        </div>
      <div class="modal-body modalFadeBody" >
            
            <p style="font-size: 15px" class="modal-title text-center text-warning modalMessage ">Are you sure you want to temporarily remove this?</p>

            <div class="progress loading">
                <div class="progress-bar progress-bar-striped active" role="progressbar"
                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                    <label>Processing your request. Please wait.</label>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button style="display: none" type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-danger wyred-btn-close" >Close</button>
            <button type="button" class="btn btn-primary deleteSubjects" data-animation="fadeIn" data-url="" data-id="">Yes</button>
        </div>
    </div>
</div>
</div>


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
    $('#setupMenu').addClass('active');
    $('#academicsMenu').addClass('active');
    $('#assignMenu').addClass('active');


     assignTableFunc();
  });

  $('#add-assignsubject, #modalDeleteGradelevelSubjects').on('hidden.bs.modal',function(){
        assignTableFunc();
        $('#grade_level_id').val('');
        $('#section_type_id').val('');
  });

  function changeGradeLevelSubject(){

      var selInst = $('#gradeLevelSubject');
      var selValue = $('#gradeTypeSubject').val();
      $('#gradeLevelSubject').select_binder(selValue);
  }

  function editAssignSubject(row_id){

      $('#grade_level_id').val(assignTableData[row_id].grade_level_id).change();
      $('#section_type_id').val(assignTableData[row_id].section_type_id).change();
      $('#gradeTypeSubject').val(assignTableData[row_id].grade_type_id).change();
      $('#gradeLevelSubject').val(assignTableData[row_id].grade_level_id).change();
      $('#section_type').val(assignTableData[row_id].section_type_id);
      var objSubjects = assignTableData[row_id];


      listOfSubjectsEdit(row_id,assignTableData[row_id].grade_level_id,assignTableData[row_id].section_type_id);
      
  }


  function listOfSubjectsEdit(row_id,grade_level_id,section_type_id){

      $.ajax({

          url: '/sms/get-list-subject-edit?grade_level_id='+grade_level_id+"&section_type_id="+section_type_id,
          type: 'GET',
          processData: false,
          contentType: false,
          success:function(data){
              console.log(data);
              $('#gradeSubjects').val(data).change();
        
          },
            error: function (error) {
            return false;
            }

        });
  }

  function assignTableFunc(){
      
      $('#assignTable').dataTable().fnClearTable();
      $("#assignTable").dataTable().fnDestroy();

          assignDataTable = $('#assignTable').DataTable({
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
                assignTableData = data;
                console.log(assignTableData);
                fnCallback(assignTableData);           
              }
            });
          },
                     
          "sAjaxSource": "/sms/registrar/get-assign-subject",
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
              { "mData": "grade_level", sDefaultContent: ""},

              { "mData": "section_type", sDefaultContent: ""}, 
              { sDefaultContent: "" ,
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html('<button onclick="deleteSubjectAssign(this)" data-toggle="modal" data-target="#modalDeleteGradelevelSubjects"  data-url="/softdelete/deleteAssignSubject?grade_level_id='+oData.grade_level_id+'&section_type_id='+oData.section_type_id+'" class="btn btn-danger btn-sm w-b " data-seminar-id="'+oData.seminar_id+'" id="ladda"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></button>');
              }
              },  

              { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="#" data-toggle="modal" data-target="#add-assignsubject" onclick="editAssignSubject('+oData.row_id+')" class="btn btn-info btn-sm w-b"><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
                }
              },  
          ]
      });

    }

    

    $('#assignTable tbody').on('click', 'td.details-control', function () {
      
      var tr = $(this).closest('tr');
      var row = assignDataTable.row( tr );
      var row_id = $(tr).attr("data-id");
      
      if ( row.child.isShown() ) {
            
        $('div.slider', row.child()).slideUp( function () {
            row.child.hide();
            tr.removeClass('shown');
        } );
        }
        else {
            // Open this row
            var prop_id_name = $(tr).attr("data-id");
            row.child( format(row_id)).show();
            $('div.slider', row.child()).slideDown();
            tr.addClass('shown');

            listOfSubjects(row_id,assignTableData[row_id].grade_level_id,assignTableData[row_id].section_type_id);
            //ref_serial(prop_id_namse);
        }
    });

  function format (row_id) {

              return '<div class="sliderHolder"><div class="slider" id='+row_id+' style="">'+
                    
              '</div></div>';  

              
  } 

  function listOfSubjects(row_id,grade_level_id,section_type_id){

      $.ajax({
          url: '/sms/get-list-subject?grade_level_id='+grade_level_id+"&section_type_id="+section_type_id,
          type: 'GET',
          processData: false,
          contentType: false,
          success:function(data){
              console.log(data);
              $('#'+row_id).html(data);
        
          },
            error: function (error) {
            return false;
            }
        });
  }

  function deleteSubjectAssign(rmvBtn){
      $('.modalMessage').text('');
      $('.loading').hide();
      
      data_id = $(rmvBtn).attr('data-id');
      url  = $(rmvBtn).attr('data-url');
      $('.deleteSubjects').attr('data-url',url);

      $('.modalMessage').addClass('text-warning');
      $('.modalMessage').removeClass('text-danger');
      message = 'Are you sure you want to delete this temporarily?';
      $('.modalMessage').text(message);
      $('.wyred-btn-close').show();
      $('.deleteSubjects').show();
  }

  $(function() {

        $('.deleteSubjects').click(function(e){

          var url  = $(this).attr('data-url');

          $.ajax( { 

          url: url,
          type: 'get',
          processData: false,
          contentType: false,
          success:function(data){
            

                if(data[0] == true){
                  
                  $('.deleteSubjects').hide();
                  $('.wyred-btn-close').show();
                  $('.loading').hide();
                  modalSuccess(data[1]);
                  var snd = new Audio("/assets/music/success.wav"); // buffers automatically when created
                  snd.play();
                  

                }else if(data[0] == false){
                  
                  $('.deleteSubjects').hide();
                  $('.wyred-btn-close').show();
                  $('.loading').hide();
                  modalError(data[1]);
                  var snd = new Audio("/assets/music/error.wav"); // buffers automatically when created
                  snd.play();

                }

              
          },
            error: function (error) {
            return false;
            }

        });
        });
  });

</script>

    
@stop