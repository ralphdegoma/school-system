

$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});

$.ajaxPrefilter(function(options, originalOptions, xhr) { // this will run before each request
    var token = $('meta[name="csrf-token"]').attr('content'); // or _token, whichever you are using

    if (token) {
        return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
    }
});


$('.wyredModalCallback').click(function(){

	$('.loading').hide();
	$('.wyredSaveBtn').show();
    $('.wyred-btn-close').show();
	form = $(this).attr('data-form');
	url  = $(this).attr('data-url');
	
	$('.wyredSaveBtn').attr('data-form',form);
	$('.wyredSaveBtn').attr('data-url',url);

	$('.modalMessage').addClass('text-warning');
	$('.modalMessage').removeClass('text-danger');
	message = 'Are you sure you want to continue ?';
	$('.modalMessage').text(message);
	$('.wyred-modal-footer').show();
});

function modalBodyAnimation(){
	var animation = $(this).attr("data-animation");
    $('.modalFadeBody').addClass('animated');
    $('.modalFadeBody').addClass(animation);
}

function modalError(message){

	$('.modalMessage').text(message);
	$('.wyred-modal-footer').hide();
	$('.modalMessage').addClass('text-danger');
	$('.modalMessage').removeClass('text-warning');
	modalBodyAnimation();
}
function modalSuccess(message){

	$('.modalMessage').text(message);
	$('.wyred-modal-footer').hide();
	$('.modalMessage').addClass('text-success');
	$('.modalMessage').removeClass('text-warning');
	$('.modalMessage').removeClass('text-danger');
	modalBodyAnimation();
    return false;
}


$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});

 $(function() {

        $('.wyredSaveBtn').click(function(e){
        	$('.modalMessage').text('');
          	event.preventDefault();
          	event.stopPropagation();
          	$('.loading').show();
          	var button = $(this);
          	var url  = $(this).attr('data-url');
          	/*var form = $(this).parents('form:first');*/
          	var form_id  = $(this).attr('data-form');
          	var form    = $("#"+form_id);
          	var data = new FormData($(form)[0]);
	      	
	      	console.log(form);
	      	formValidate = $(form);

		  	formValidate.validate({

		          ignoreTitle: true,
		          debug:true,
		          errorPlacement: function(error, element) {
					    
					    var errorInput = element[0].validationMessage;
					    $(element).attr('data-toggle', "popover");
					    $(element).attr('data-placement', "top");
					    $(element).popover({
					    	container: "body",
						    html: true,
						    content: function () {
						        return '<div class="popover-message">' + errorInput + '</div>';
						    }
						});


					    $('.popover').show();
						$(element).popover('show');
						$('.popover').css('background-color', '#f36a5a');
					    $('.popover').css('color', '#fff');

					    

					},


		  	});
		 

          if(!formValidate.valid()){
          		$('.loading').hide();
          		$('.wyredSaveBtn').hide();
              	$('.wyred-btn-close').show();
				message = 'Some input fields is highly required. Please write something to resume.';
          		var errorInput = $(formValidate).find("input.error")[0];
          		modalError(message);
          	try{
          		$('html, body').animate({
			         //scrollTop: ($(errorInput).offset().top - 300)
			    }, 2000);
          	}catch(e){

          	}
          		

          		return false;

          }

          if($(button).hasClass('disabled')){
          		
          		return false;//disable 
          }




          $.ajax( {

	        url: url,
	        type: 'POST',
	        data: data,
	        processData: false,
	        contentType: false,
	        success:function(data){
           		
              	if(data[0] == true){
              		$('.wyredSaveBtn').hide();
              		$('.wyred-btn-close').show();
            		$('.loading').hide();
           			modalSuccess(data[1]);
           			var snd = new Audio("/assets/music/success.wav"); // buffers automatically when created
					snd.play();
              	}else if(data[0] == false){
              		$('.wyredSaveBtn').hide();
              		$('.wyred-btn-close').show();
              		$('.loading').hide();
              		modalError(data[1]);
              		var snd = new Audio("/assets/music/error.wav"); // buffers automatically when created
					snd.play();

              	}

              	var oldVal = $(button).val();
	            $(button).val("Processing Please wait");
	            $(button).addClass("disabled");


	            setTimeout(function(){
	            	
	            	$(button).val(oldVal);
	            	$(button).removeClass("disabled");
				}, 3000)
            },
              error: function (error) {
          		return false;
              }

        });

          	setTimeout(function(){

	  		 	$('#wyredSaveModal').modal('hide');

	  		}, 2000);

    	});
    });


	

    function success(id,message){

		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "newestOnTop": true,
		  "progressBar": true,
		  "positionClass": "toast-top-right",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}

		toastr["success"](message)

    }

    function bottom_right_success(id,message){

		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "newestOnTop": true,
		  "progressBar": true,
		  "positionClass": "toast-bottom-right",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}

		toastr["success"](message)

    }

    function bottom_right_fail(id,message){
    	
        toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "newestOnTop": true,
		  "progressBar": true,
		  "positionClass": "toast-bottom-right",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}

		toastr["warning"](message)

	}


    function fail(id,message){
    	
        toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "newestOnTop": true,
		  "progressBar": true,
		  "positionClass": "toast-top-center",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}


		toastr["warning"](message)
    }















    /*DELETION*/

function softDeleteCallback(rmvBtn){

	$('.modalMessage').text('');
  	$('.loading').hide();
	
	data_id = $(rmvBtn).attr('data-id');
	url  = $(rmvBtn).attr('data-url');
	$('.wyredDeleteBtn').attr('data-id',data_id);
	$('.wyredDeleteBtn').attr('data-url',url);

	$('.modalMessage').addClass('text-warning');
	$('.modalMessage').removeClass('text-danger');
	message = 'Are you sure you want to delete this temporarily?';
	$('.modalMessage').text(message);
	$('.wyred-btn-close').show();
	$('.wyredDeleteBtn').show();
	$('.wyred-modal-footer').show();
}


 $(function() {

        $('.wyredDeleteBtn').click(function(e){

        	var data_id = $(this).attr('data-id');
        	var url  = $(this).attr('data-url');

        	$.ajax( {	

	        url: url+"?id="+data_id,
	        type: 'get',
	        processData: false,
	        contentType: false,
	        success:function(data){
           	

              	if(data[0] == true){
              		
              		$('.wyredDeleteBtn').hide();
              		$('.wyred-btn-close').show();
            		$('.loading').hide();
           			modalSuccess(data[1]);
           			var snd = new Audio("/assets/music/success.wav"); // buffers automatically when created
					snd.play();
                	

              	}else if(data[0] == false){
              		
              		$('.wyredDeleteBtn').hide();
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
