<?php

if(isset($_REQUEST["callback"]))
{

	$callback = $_REQUEST["callback"];

}
else
{

	$callback = "sanoHeippa";

}

print "$callback({nimi: 'Janne'})";

?>