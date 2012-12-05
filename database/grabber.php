<?php

include("../config.php");
include('../../php/autoloader.php');


mysql_query("DELETE FROM items");

$feeds= mysql_query("SELECT * FROM feeds");

while($row = mysql_fetch_array($feeds))
{
    //temp performance monitoring
  //  $time = microtime(TRUE);
  //  $mem = memory_get_usage();

 
    $feed = new SimplePie();
    $feed->set_feed_url($row['feed_url']);
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
$feed_id=$row['id'];       




foreach ($feed->get_items(0, 10) as $item)
  {
    $item_des=$item->get_title();
    $item_url=$item->get_permalink();
    $item_date=$item->get_date();
    mysql_query("INSERT INTO items (item_description, item_url, item_datetime, item_feed)  VALUES  ('$item_des', '$item_url' , '$item_date', '$feed_id')");
        
            
  unset($item); 
  }


    unset($feed);

    // temp performance monitoring
  //  print_r(array(
   //     'memory' => (memory_get_usage() - $mem) / (1024 * 1024),
    //    'seconds' => microtime(TRUE) - $time   ));
}
?>





