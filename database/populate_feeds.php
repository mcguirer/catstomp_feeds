<?php

include("../config.php");
include('../../php/autoloader.php');
include('../feeds.php');

mysql_query("DELETE FROM feeds");

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
  

$name=$feed->get_title();
$link2=$feed->get_permalink();
       

mysql_query("INSERT INTO feeds (feed_name, feed_url, feed_favicon)	VALUES	('$name', '$link2' , 'http://g.etfv.co/$link2')");


echo "1 record added <br />";


    unset($feed);

    // temp performance monitoring
  //  print_r(array(
   //     'memory' => (memory_get_usage() - $mem) / (1024 * 1024),
    //    'seconds' => microtime(TRUE) - $time   ));
}
?>





