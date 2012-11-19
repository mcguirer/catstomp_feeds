<?php
$feedlist = array(
    'http://feeds.digg.com/digg/popular.rss',
    'http://feeds.delicious.com/v2/rss/',
    'http://feeds.feedburner.com/cssglobe/',
    'http://news.google.com/news?ned=us&hl=en&output=rss',
    'http://feeds.dzone.com/dzone/frontpage',
    'http://www.good-tutorials.com/tutorials/photoshop.rss',
    'http://www.graphic-design-links.com/rss',
    'http://feeds2.feedburner.com/BestPhotoshopTutorials',
    'http://www.technewsworld.com/perl/syndication/rssfull.pl'
    );
	foreach ($feedlist as $listedfeed) {
	echo "Feed: $listedfeed <br>";
	}
	?>