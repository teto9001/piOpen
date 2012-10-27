<!-- v0001 -->
<?php include('includes/top.php'); 
require_once "includes/git.php";
$repo = Git::open('/var/www');
 ?>

    <div class="container">
     <div class="span8 offset2 well">
      <h1 style="color:#D00;">Settings</h1>
      Current www branch version: <?php print($repo->run('rev-parse HEAD')); ?><br/>
      Online www branch version: <?php  print('?'); ?><br/> 

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
               $("#updateresult").text(request.responseText);
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
     </div>
    </div> <!-- /container -->

<?php include('includes/bottom.php'); ?>
