<?php
	include('../php/autoloader.php');
    include('feeds.php');
?>
	
<div id="content">



<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8" />
</head><body>






<div id="content">

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
<div class="boxes">
    <h3>
    <span class="boxtitles">
    <a href="<?php echo $feed->get_permalink(); ?>" target="_blank" rel="nofollow"><img class="favis" src="http://g.etfv.co/<?php echo $feed->get_permalink(); ?>" width="16px" height="16px" alt="<?php echo $feed->get_title(); ?>"></a> 
    <a class="siteurls" href="<?php echo $feed->get_permalink(); ?>" rel="nofollow"><?php echo $feed->get_title(); ?></a>

    </span>
    </h3>
    <ul>
<?php foreach ($feed->get_items(0, 10) as $item): ?>
    
 
        <div class="item">
            <li><a href="<?php echo $item->get_permalink(); ?>" title="<?php echo $item->get_title(); ?>"><?php echo substr($item->get_title(), 0, 47); ?></a></li>
        </div>
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