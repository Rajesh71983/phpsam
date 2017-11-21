<?php
 /*$cmd = 'C:\\JustGreatSoftware\\PowerGREP5\\PowerGREP5.exe C:\\Users\\Kumar.J\\Documents\\searchdesktop.pga /silent';
 echo date('Y-md H:i:s')."<br>";
 exec($cmd);
 echo date('Y-md H:i:s');
 exit;*/
//$cmd = 'C:\\JustGreatSoftware\\PowerGREP5\\PowerGREP5.exe C:\\Users\\Kumar.J\\Documents\\filenamessearch.pga /silent';
$cmd = 'C:\\JustGreatSoftware\\PowerGREP5\\PowerGREP5.exe C:\\Users\\Kumar.J\\Documents\\listfiles11212.pga /execute /quit';
// $cmd = '"C:\\Program^ Files\\Just^ Great^ Software\PowerGREP^ 5\PowerGREP5.exe C:\Users\Kumar.J\Documents\filenamesearch.pga /silent"';
echo date('Y-md H:i:s');
function execInBackground($cmd) {
    if (substr(php_uname(), 0, 7) == "Windows"){
        pclose(popen("start /B ". $cmd, "r")); 
    }
    else {
        exec($cmd . " > /dev/null &");  
    }
}
execInBackground($cmd);
echo date('Y-md H:i:s');
?>