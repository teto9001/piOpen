<?php
set_time_limit(60);
print_r(str_replace("\n","<br>",shell_exec('cd /var/www && git pull origin'));
?>