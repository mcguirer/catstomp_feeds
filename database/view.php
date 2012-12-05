<?php

include("../config.php");


$result = mysql_query("SELECT * FROM feeds");

while($row = mysql_fetch_array($result))
{
	echo $row['feed_name'] . " " . $row['feed_url'] . " " . $row['feed_favicon'] . " " . $row['feed_sortorder'] . " " . $row['feed_category'];
	echo "<br />";
}

?>