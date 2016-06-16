   

$.fn.autosuggest = function(options){
  

    var settings = $.extend({
         
            data_display :"asass",
            data_url : 'column name'
            
    }, options );
 

    this.bind("keyup.autosuggest", function () {

          var obj = {display: settings.data_display};
          var display = obj['display'];
          var data_filter='';
         
          $( this ).autocomplete({
              source: settings.data_url+'?inputVal='+$(this).val()+'&data_filter='+data_filter,
              minLength: 0,

              select: function( event, ui ) {

                  $( this ).val( ui.item[display]);
                  return false;
              }
            })
            .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
             
                return $( "<li>" )
                .append( "<a>" + item[display]  + "</a>" )
                .appendTo( ul );
              
              
            };


      });

}


$.fn.select_binder = function(filter_id){

      if(filter_id == undefined){
          filter_id = "";
      }

      var url      = $(this).attr('data-url');
      var src_id   = $(this).attr('data-id');
      var src_name = $(this).attr('data-name');
      var select   = $(this);

      var group_desc = $(this).attr('data-description');


      $.ajax( {
        url: url,
        type: 'get',
        async: false,
        data: {"filter_id": filter_id},

        success:function(data){
            
            var options = '';
            select.empty();      
            options += "<option value=''></option>";
            
            if(group_desc != "undefined"){

                  for(var i=0;i < data.length; i++)
                  {
                      options += "<option  value='"+data[i][src_id]+"'>"+data[i][src_name]+"</option>";              
                  }

                  select.append(options);

            }else{

                  for(var i=0;i <data.length; i++)
                  {
                      options += "<option  value='"+data[i][src_id]+"'>"+data[i][src_name]+"</option>";              
                  }
                  select.append(options);
            }
        }
      });
}