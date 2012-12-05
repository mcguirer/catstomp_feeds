<?php

include("../config.php");


$sql="INSERT INTO feeds (feed_name, feed_url, feed_favicon, feed_sortorder, feed_category)
VALUES
('$_POST[feed_name]','$_POST[feed_url]','$_POST[feed_favicon]','$_POST[feed_sortorder]','$_POST[feed_category]')";

if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";


?>