

<div class="row" id="student-body" >

    <div class="col-md-12" >
      @foreach($students as $student)

        <?php
              
              $image_link = "assets/people/students/".$student->student_id."/images/medium.jpg";
              if (File::exists($image_link)){
                  $image_link = "/assets/people/students/".$student->student_id."/images/medium.jpg";
              }else{
                  $image_link = "/assets/img/default.png";
              }

         ?>

        <div class="col-md-3 col-sm-3 col-lg-3 student-body" >
              <div class="col-md-12 text-center" >
                    <div class="col-md-12 text-center" >
                      <img src="{{$image_link}}" class="profile-pic img-responsive text-center" style="height:240px;width:auto">
                      <br>
                      <label><b>{{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}}</b></label><br>
                      <label><b>000{{$student->student_id}}</b></label>
                  
                    </div>
                  
                  <div class="col-md-12 text-center">
                     

                  </div>
                  <div class="col-md-12 text-center"  style="margin-top: 5px">
                      <button class="btn btn-primary btn-block box-gui" id="SearchBtn"><i class="fa fa-external-link"></i> VIEW INFO</button>
                  </div>
                  <div class="col-md-12 text-center">
                      <a href="/admin/student/{{$student->student_id}}/edit"><button class="btn btn-success btn-block box-gui" id="SearchBtn"><i class="fa fa-external-link"></i> EDIT INFO</button></a>
                  </div>

              </div>

              </div>
        @endforeach

    </div>

</div>



        