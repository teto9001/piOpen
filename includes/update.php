<?php
//set_time_limit(600);
//print_r(str_replace("\n","<br>",shell_exec('cd /var/www && git reset --hard && git pull origin')));
require_once "git.php";
$repo = Git::open('/var/www');
print $repo->run('reset --hard');
print $repo->run('pull origin');


?>