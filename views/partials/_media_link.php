
<!-- Media links can be jpgs, or other formats (link to video, etc) -->

<!--If it's something other than a jpg, show ? icon and open it into a new window --> 
<?php if (strpos ( $media, 'jpg') == false ) : ?>
    <a href = '<?= $media ?>' target='_blank'><img alt='info' src ='/img/question_small.jpg'></a>
    
<!-- otherwise it's a jpg: show thumbnail with modal (uses javascript in scripts.js)-->
<?php else : ?>
        <img id="img" src ='<?= $media ?>'  class="popup" alt='it looks like this'  width= "30" height= "20"/>
<?php endif ?>



<!-- The modal for image popup, from w3schools: 
http://www.w3schools.com/howto/howto_css_modal_images.asp -->
<div id="myModal" class="modal">
  <span class="close">x</span>
  <img class="modal-content" id="img01" src="value" alt="modal">
  <div id="caption"></div>
</div>


