<!-- v0001 -->
<?php include('includes/top.php'); ?>

    <div class="container">
     <div class="span8 offset2 well">
      <h1 style="color:#D00;">WebGate</h1>
      Uptime: <?php   $data = shell_exec('uptime');
  $uptime = explode(' up ', $data);
  $uptime = explode(',', $uptime[1]);
  $uptime = $uptime[0].', '.$uptime[1]; 
  print $uptime; ?><br/>
      Versione top.php<br/>
      Versione bottom.php<br/>
      Versione GPIO:<br/>
      Versione me:<br/>
      Temperatura:<br/>
      Carico CPU:     <br/>

      <a class="btn btn-primary" id="accendi">Accendi</a>
      <script>
        $("#accendi").click(function(){
		$(this).text("...");
            $.ajax({
              url: "includes/accendi.php?tempo=1000"
            }).done(function(data) { 
               $("#accendi").text("OK");
            });
        });
      </script>
     </div>
    </div> <!-- /container -->

<?php include('includes/bottom.php'); ?>
