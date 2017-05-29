<?php

header("Content-type: application/xml");
print file_get_contents("http://yle.fi/uutiset/rss/paauutiset.rss");

?>