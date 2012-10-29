<?php 

$page="settings";
$hostname=exec('hostname');
if ($hostname == 'piOpen') { $demo=false; } else { $demo=true; }
include('includes/top.php'); 
require_once "includes/git.php";
if ($hostname=='piOpen') {  
  $repowww = Git::open('/var/www');
  $reposcripts = Git::open('/var/piopen');
}
$forcecheck = $_GET["u"];
 ?>

    <div class="container">
     <div class="span8 offset2 well">
      <h1 style="color:#D00;">Settings</h1>
<!-- GIT STUFF, disabled on the demo site -->
<?php if (!$demo) { ?>
      Current www branch version: <?php print($repowww->run('rev-parse HEAD')); ?><br/>
      <?php if ($forcecheck == "true") { ?>
      Online www branch version: <?php 
          $repowww->run('fetch'); 
          print($repowww->run('rev-parse origin/www')); 
          ?><br/> 
      <?php } ?>
            Current scripts branch version: <?php print($reposcripts->run('rev-parse HEAD')); ?><br/>
      <?php if ($forcecheck == "true") { ?>
      Online scripts branch version: <?php 
          $reposcripts->run('fetch'); 
          print($reposcripts->run('rev-parse origin/shellScripts')); 
          ?><br/> 
      <?php } else { ?>
      <a href="settings.php?u=true" class="label">Check for updates</a><br/>
      <?php } ?>
      <br/>
      <a href="#" id="cmdupdate" class="btn btn-primary">Update</a><br>&nbsp;
      <div id="loading" class="progress progress-striped active hide">
        <div class="bar" style="width: 100%;"></div>
      </div>
      <div id="updateresult"></div>
      <script type="text/javascript">
      $("#cmdupdate").click(function(){
        $(this).text("Update started...");
        $("#loading").show();
        $.ajax({
              timeout: 30000,
              url: "includes/update.php",
              error: function (request, status, error) {
               $("#updateresult").html("<b>There was an error. piOpen NOT updated. Details:</b><br>"+request.responseText);
               $("#updateresult").addClass("alert alert-warning");
               $("#cmdupdate").text("Retry");
               $("#loading").hide();
              },
              success: function (data) {
                
                $("#updateresult").html(data);
               $("#updateresult").addClass("alert alert-success");
               $("#cmdupdate").text("Updated!");
               $("#loading").hide();
              }
            });
      });
      </script>
<hr>
      <a href="#" id="reboot" class="btn btn-warning">Reboot</a><br>
<?php    }    ?>
<!-- END GIT STUFF, disabled on the demo site -->
      

      
     </div>
    </div> <!-- /container -->

<?php include('includes/bottom.php'); ?>
