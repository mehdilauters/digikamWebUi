$(document).ready(function() {
    $(".fancybox").fancybox(
        {
            type: "image",
            //autoDimensions  : true,
            //width             : 600,
            //height            : 'auto',
            showNavArrows: true,
            titleFormat: function() {console.log('hoooo')},
            beforeLoad: function() {
                var id= $(this.element).attr("id").replace("imageLink_", "");
                //url = "<?php echo $this->webroot ?>images/view/"+id+"/true";
                url = webroot + "images/download/"+id+"/big";
                this.href = url
                
                
                var title = '';
        /*if (this.index > 0) {
            title += '<a class="fancybox-nav fancybox-prev" href="#" onclick="$.fancybox.prev();return false;" id="fancybox-prev-btn"><span></span></a>';
        }*/

        title += '<span class="fancybox-title">' + $(this.element).find('img').attr('alt') + '<span class="fancybox-title-count"> ( ' + (this.index + 1) + ' / ' + this.group.length + ' )</span>';
        /*  if (this.index < this.group.length - 1) {
            title += '<div><a href="#" onclick="$.fancybox.next();return false;" id="fancybox-next-btn" class="fancybox-nav fancybox-next" ><span></span></a></div>';
        }*/
        this.title = title;
            }
        }
          );
  });