<?php

/**

 ######   #######  ##    ##  ######   ########     ###    ########  ######  #### 
##    ## ##     ## ###   ## ##    ##  ##     ##   ## ##      ##    ##    ## #### 
##       ##     ## ####  ## ##        ##     ##  ##   ##     ##    ##       #### 
##       ##     ## ## ## ## ##   #### ########  ##     ##    ##     ######   ##  
##       ##     ## ##  #### ##    ##  ##   ##   #########    ##          ##      
##    ## ##     ## ##   ### ##    ##  ##    ##  ##     ##    ##    ##    ## #### 
 ######   #######  ##    ##  ######   ##     ## ##     ##    ##     ######  #### 

If you're reading this file, you've solved A5

There isn't actually a database password to recover, but if there, it would
be in this file. 

*/


$db_folder = "/var/www/html/";
$db_name = "votes.sqlite";

if(!file_exists($db_folder.$db_name))
{
 $db_conn = new PDO("sqlite:".$$db_folder.$db_name);
 $db_conn->exec("CREATE TABLE hits(meme VARCHAR(255) PRIMARY KEY, counter INTEGER)");
}
else
{
 $db_conn = new PDO("sqlite:".$db_folder.$db_name);
}


?>