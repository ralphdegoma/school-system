
  <div class="row" id="student-body" >



  @foreach($students as $student)

    <?php
              $image_link = "assets/people/students/".$student->student_id."/images/medium.jpg";
          if (File::exists($image_link)){
              $image_link = "/assets/people/students/".$student->student_id."/images/medium.jpg";
          }else{
              $image_link = "/assets/img/default.png";
          }

     ?>

    <div class="col-md-2 animated fadeInLeft student-panel student-body">
        <!-- CONTACT ITEM -->
        <div class="panel panel-default" >
            <div class="panel-body profile" >
                <div class="profile-image">
                    <img src="{{$image_link}}" class="profile-pic" style="width:100%">
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">
                    
                      <b>{{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}}</b>
                    </div>
                    <div class="profile-data-title"><h3><b>000{{$student->student_id}}</b></h3></div>
                </div>
                            </div>                                
            <div class="panel-body">                                    
                <div class="input-group-btn">
                    <button class="btn btn-primary btn-block" id="SearchBtn"><i class="fa fa-external-link"></i> VIEW INFO</button>
                </div>

                <div class="input-group-btn">
                    <a href="/admin/student/{{$student->student_id}}/edit"><button class="btn btn-success btn-block" ><i class="fa fa-pencil"></i> EDIT INFO</button></a>
                </div>
            </div>                                
        </div>
        <!-- END CONTACT ITEM -->
    </div>
    @endforeach



 </div>
