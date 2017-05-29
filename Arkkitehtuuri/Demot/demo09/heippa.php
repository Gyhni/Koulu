<?php
if(isset($_REQUEST["nimi"]) && ($_REQUEST["nimi"]) != "")
{

	echo"Moikka, ".$_REQUEST["nimi"];

}
else
{

	print "Heippa, tuntematon";

}
?>