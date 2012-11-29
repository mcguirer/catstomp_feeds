<?php
	include('../php/autoloader.php');
    include('feeds.php');
?>
	
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head><body>






<div class="container-fluid">

<?php
foreach ($feeds as $url)
{
    //temp performance monitoring
  //  $time = microtime(TRUE);
  //  $mem = memory_get_usage();

 
    $feed = new SimplePie();
    $feed->set_feed_url($url);
   // $feed->set_stupidly_fast(true);
    $feed->enable_cache(true);
    //complete path for caching system
    $feed->set_cache_location('/home/mcguirer/public/vm.catstomp.com/public/cache');
    //set the amount of seconds you want to cache the feed
    $feed->set_cache_duration(1800);
    //init the process
    $feed->init();
    //let simplepie handle the content type (atom, RSS...)
    $feed->handle_content_type();
  ?>
<div class="span4">
    <div class="row">
        <h3>
       
    <a href="<?php echo $feed->get_permalink(); ?>" target="_blank" rel="nofollow" title="<?php echo $feed->get_title(); ?>"><img class="favis" src="http://g.etfv.co/<?php echo $feed->get_permalink(); ?>" width="16px" height="16px" alt="<?php echo $feed->get_title(); ?>"></a> 
    <a class="siteurls" href="<?php echo $feed->get_permalink(); ?>" rel="nofollow"><?php echo substr($feed->get_title(), 0, 25); ?></a>
        </h3>
    </div>
    
    <ul class="unstyled">
<?php foreach ($feed->get_items(0, 10) as $item): ?>
    
 
        
            <li><a href="<?php echo $item->get_permalink(); ?>" title="<?php echo $item->get_title(); ?>"><?php echo substr($item->get_title(), 0, 47); ?></a></li>
       
 <?php unset($item); ?>
    <?php endforeach; ?>
    </ul>
</div>
    <?php unset($feed);

    // temp performance monitoring
  //  print_r(array(
   //     'memory' => (memory_get_usage() - $mem) / (1024 * 1024),
    //    'seconds' => microtime(TRUE) - $time   ));
}
?>

</div>




</body></html>