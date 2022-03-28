<?php
//version 5.0 1/8 3.30AM
//logout function. deletes all the website generated cookies by setting the expiration time to present time, 
//and determining the path value.
//auto redirects into about.php
foreach ($_COOKIE as $key => $value )
{
    setcookie($key, $value, time() - 3600, "/");
}
header("location:about.php");
exit;
?>