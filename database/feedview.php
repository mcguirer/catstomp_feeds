<?php


include("../config.php");


//while($row = mysql_fetch_array($result))
//{
	//var_dump($row);
	//echo '<br />';
	//echo $row['feed_name'] . " " . $row['feed_url'] . " " . $row['feed_favicon'] . " " . $row['feed_sortorder'] . " " . $row['feed_category'];
	//echo "<br />";
//}

?>

	
    <link href="fonts/font_stylesheet.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head><body>






<div class="container-fluid">

<?php 

$result_feeds = mysql_query("SELECT * FROM feeds");
$result_items = mysql_query("SELECT * FROM items");

while($row = mysql_fetch_array($result_feeds)):

?>

<div class="span4">
    <div class="row">
        <h3>
       
    <a href="<?php echo $row['feed_url']; ?>" target="_blank" rel="nofollow" title="<?php echo $row['feed_name']; ?>"><img class="favis" src="$row['feed_favicon']; ?>" width="16px" height="16px" alt="<?php echo $feed->get_title(); ?>"></a> 
    <a class="siteurls" href="<?php echo $feed->$row['feed_url']; ?>" rel="nofollow"><?php echo substr($row['feed_name'], 0, 18); ?></a>
        </h3>
    </div>
    
    <ul class="unstyled">
<?php while($item_row = mysql_fetch_array($result_items)): ?>
    
 
        
            <li><a href="<?php echo $item_row['item_url']; ?>" title="<?php echo $item_row['item_description']; ?>"><?php echo substr($item_row['item_description'], 0, 41); ?></a></li>
       
 <?php endwhile; ?>
    </ul>
</div>
<?php   

    // temp performance monitoring
  //  print_r(array(
   //     'memory' => (memory_get_usage() - $mem) / (1024 * 1024),
    //    'seconds' => microtime(TRUE) - $time   ));
endwhile;
?>

</div>




</body></html>