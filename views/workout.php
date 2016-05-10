<!-- Load Facebook SDK for JavaScript -->
<!--This section is for the facebook sharing link-->
<!--I'd prefer to have it in scripts.js, but when I move it no loner works-->
<div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>




<?php $url = "https://ide50-dianekaplan.cs50.io/retrieve_workout.php?workout_id=" . $id . "&t=true" ; ?>


<!-- Links to share and print -->
<div class="right">
    <div class="fb-share-button" data-href='<?=$url?>' data-layout="button" data-mobile-iframe="true"></div> this workout
        <div><a href="mailto:dianekaplan@gmail.com?Subject=New%20workout!&body=Check%20out%20this%20workout:%20<?=$url?>">Email this workout</a></div>
    <div><a href="#" onclick="window.print();return false;">Print this workout</a></div>
</div>

<!-- This should restrict print area to this div-->
<div id="content" class="print">
  
<!-- Now show all the workout stuff-->
<b>Warm up:</b> slow jog around the perimeter <br/><br/>

  
 <?php 
      $size = sizeof($workout);
      
      $partial_type = NULL;
          
      if ($partner)
          $partial_type = "/partials/_partner_set.php";
      else
          $partial_type = "/partials/_solo_set.php";
    
      
      for ($x = 0; $x < $size; $x++)
      {
        // Display the set
       render_partial($partial_type, ["exercises" => $workout[$x]]);
       
       // Unless we're on the last set, next display a message to rest
       if ($x != $size-1)
       {
         print("(Rest for a minute or two) <br/><br/>" );
        }
      }

 ?>
  
 <b>Finisher: </b>If you have gas in the tank for more, pick your favorites for two more minutes!<br/><br/>

</div>


Not feelin it?  Try again with <a href="<?= $try_again_url?>">same resources</a> or <a href="index.php">start fresh</a>

