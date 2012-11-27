<?php
	include('../php/autoloader.php');
?>
	
<div id="content">
<?php    
$feeds = array(
    	'http://rss.cnn.com/rss/cnn_topstories.rss',
		'http://www.nytimes.com/services/xml/rss/nyt/World.xml',
        'http://www.newyorker.com/services/mrss/feeds/everything.xml',
        "http://www.newyorker.com/services/mrss/feeds/reporting.xml",
        "http://www.newyorker.com/services/mrss/feeds/humor.xml",
        "http://www.defense.gov/news/afps2.xml",
        "http://www.federalreserve.gov/feeds/press_all.xml",
        "http://www.fbi.gov/news/current/rss.xml",
        "http://www.nasa.gov/rss/breaking_news.rss"
		);
   
   
	?>


<html>
<head>
<style type="text/css">
body{font-family: 'PT Mono', sans-serif;}
img {}
a:link {color:blue;text-decoration:none;}
a:visited {color:#112288;}
a:hover {color:#FF0000;text-decoration:underline;}
a:active {color:#0000FF;}


.sharefixed{top:10px;width:450px;position:fixed;}
.sharefooter{width:500px;padding-top:20px;margin-right:auto;margin-left:auto;}

#header{}
#linkbar {}
#quicktitle{font-family: serif;font-size:35px;float:left;margin-left:40px; padding-top:0px;background:white;font-weight:bold;text-align:center;margin-right:20px;}
#tagline{font-size:20px;font-family:helvetica;}
#content{font-size:12px;padding-top:0px;text-align:center;}
.boxes{padding-top:20px;width:400px;vertical-align:top;word-wrap:normal;display:inline-block;}
.topboxes{}
.favis{float:left;margin-right:4px;}
.topsiteurls{text-align:left;width:400px;font-size:20px;float:left; margin-left:20px;margin-right:400px;margin-bottom:5px;}
.boxtitles{text-align:left;width:400px;font-size:16px;float:left;margin-right:400px;margin-bottom:5px;}
ul{margin-left: 20px;padding: 0px;text-align:left;}
li{border-bottom:solid 1px #ddd;margin: 0px;padding: 0px;line-height:120%;margin-top:7px;list-style-type:none;}
.topboxes li{border-bottom:solid 1px #ddd;margin: 0px;padding: 0px;line-height:120%;margin-top:7px;list-style-type:none;}
#footer{padding-top:10px;}

a.siteurls:link {color: #999; text-decoration: none; }
a.siteurls:visited {color: #aaa; text-decoration: none; }
a.siteurls:hover {color: #000; text-decoration: underline; }
a.siteurls:active {color: #0000FF; } 

a.topsiteurls:link {color: #999; text-decoration: none; }
a.topsiteurls:visited {color: #999; text-decoration: none; }
a.topsiteurls:hover {color: #000; text-decoration: underline; }
a.topsiteurls:active {color: #0000FF; } 

#quicktitle a:link {color: #f00; text-decoration: none; }
#quicktitle a:visited {color: #f00; text-decoration: none; }
#quicktitle a:hover {color: #333; text-decoration: none; }
#quicktitle a:active {color: #0000FF; }

#pages2 a:link {color: blue; text-decoration: underline;}
#pages2 a:visited {color: blue; text-decoration: underline;}
#pages2 a:hover {color: #f00; text-decoration: underline; }
#pages2 a:active {color: #0000FF; }

#toptop{}
#mess{float:right;}

#pages2{font-family: serif;text-align:left;font-size:16px;margin-top:25px;line-height:160%;color:#000;}
.eachword{font-size:16px;line-height:120%;}
#huge{font-size:20px;margin-top:20px;}
#tidy_toggle{background:#ff9;font-weight:bold;}

.adbox{height:250px;}

#addt{width:500px;}
#adli{text-align:center;margin-top:10px;}
#sharebox{text-align:center;margin-top:10px;}
#feedbox{font-size:14px;}

/*for 3 across hide random box*/
@media screen and (max-width:1600px) {
.randombox{display:none;}
.topboxes li{list-style-type:none;}
}

/*for ipad and under hide both*/
@media screen and (max-width:1245px) {
.randombox{display:inline-block;}
#hiderand{display:none;}
.topboxes li{list-style-type:none;}
}



</style>
</head><body>






<div id="content">

<?php
foreach ($feeds as $url)
{
    $feed = new SimplePie();
    $feed->set_feed_url($url);
    $feed->enable_cache(true);
    //complete path for caching system
    $feed->set_cache_location('/home/mcguirer/public/vm.catstomp.com/public/cache');
    //set the amount of seconds you want to cache the feed
    $feed->set_cache_duration(1500);
    //init the process
    $feed->init();
    //let simplepie handle the content type (atom, RSS...)
    $feed->handle_content_type();
  ?>
<div class="boxes">
    <ul>
<?php foreach ($feed->get_items(0, 10) as $item): ?>
    
 
        <div class="item">
            <li><a href="<?php echo $item->get_permalink(); ?>" title="<?php echo $item->get_title(0, 10); ?>"><?php echo $item->get_title(0, 10); ?></a></li>
        </div>
 
    <?php endforeach; ?>
    </ul>
</div>
    <?php unset($feed);
}
?>

</div>




</body></html>