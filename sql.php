<?php
include("config.php");
include('../php/autoloader.php');

$query = "SELECT * FROM feeds"; 
	 
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){

	$feed->set_feed_url($row["url"]);
    //enable caching
    $feed->enable_cache(true);
    //complete path for caching system
    $feed->set_cache_location('./cache');
    //set the amount of seconds you want to cache the feed
    $feed->set_cache_duration(1500);
    //init the process
    $feed->init();
    //let simplepie handle the content type (atom, RSS...)
    $feed->handle_content_type();
	}

?>
<?php foreach ($feed->get_items(0, 100) as $item): ?>

<!-- <div class="post_cont"> -->
      <div class="content">
      <h2><?php echo $item->get_date('j M Y'); ?> | <?php echo $item->get_date('g:i a'); ?></h2>
      <h2><img src="<?php $feed = $item->get_feed(); echo $feed->get_favicon(); ?>" alt="favicon" /><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h2> 
      <span class="visit_link"><a href="<?php echo $item->get_permalink(); ?>">direct link to article</a></span>
      </div>
<!-- </div> -->

<?php endforeach; ?>
	
	


