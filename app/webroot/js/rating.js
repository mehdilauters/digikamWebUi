$(function(){

    $('.imageRate').rating({
       cancelValue: '-1',
       callback: function(value, link){
         photoId = $(this).attr('rel');
            
            if(value == undefined)
            {
              value = -1;
            }

            url = webroot+"images/rate/"+photoId;
            

            $("#rate_container_"+photoId).fadeTo(600, 0.4, function() {
              $.ajax({
                url: url,
                    type: "POST",
                    data: 'rating=' + value,
                    complete: function(req) {
                      if (req.status == 200) { //success
                        $("#rate_container_"+photoId).fadeTo(600, 1);
                      }
                      else
                      {
                        alert(req.responseText);
                              $("#rate_container_"+photoId).fadeTo(2200, 1);
                      }
                       

                        }

                      }
                );
              
              

              });
            
          }
      });
	 });