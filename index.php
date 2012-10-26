<!-- v0001 -->
<?php include('includes/top.php'); ?>

    <div class="container">
     <div class="span8 offset2 well">
      <h1 style="color:#D00;">piOpen</h1>
      Uptime: <?php   $data = shell_exec('uptime');
  $uptime = explode(' up ', $data);
  $uptime = explode(',', $uptime[1]);
  $uptime = $uptime[0].', '.$uptime[1]; 
  print $uptime; ?><br/>

      <a class="btn btn-primary" id="accendi">Open</a>
      <script>
        $("#accendi").click(function(){
		$(this).text("...");
            $.ajax({
              url: "includes/accendi.php?tempo=1000"
            }).done(function(data) { 
               $("#accendi").text("Gate now open");
            });
        });
      </script>
     </div>
    </div> <!-- /container -->

<?php include('includes/bottom.php'); ?>
