<?php
set_time_limit(600);
print_r(str_replace("\n","<br>",shell_exec('cd /var/www && git reset --hard && git pull origin')));
?>