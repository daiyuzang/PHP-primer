<?php
	$q = $_GET["q"];
	if ($q == "Google") {
		$xml = ("http://news.google.com/news?ned=us&topic=h&output=rss");
	}elseif ($q == "MSNBC") {
		$xml = ("http://rss.msnbc.msn.com/id/3032091/device/rss/rss.xml");
	}

	$xmlDoc = new DOMDocument();
	$xmlDoc->load($xml);
	$channel = $xmlDoc->getElementsByTagName("channel")->item(0);
	$channel_title = $channel->getElementsByTagName("title")->item(0)->childNodes->item(0)->nodeValue;
	$channel_link = $channel->getElementsByTagName("link")->item(0)->childNodes->item(0)->nodeValue;
	$channel_desc = $channel->getElementsByTagName("description")->item(0)->childNodes->item(0)->nodeValue;

	echo "<p><a href='" . $channel_link . "'>" . $channel_title . "</a><br>" . $channel_desc . "</p>";
	$x = $xmlDoc->getElementsByTagName("item");
	for ($i=0; $i <= 2; $i++) { 
		$item_title = $x->item($i)->getElementsByTagName("title")->item(0)->childNodes->item(0)->nodeValue;
		$item_link = $x->item($i)->getElementsByTagName("link")->item(0)->childNodes->item(0)->nodeValue;

		$item_desc = $x->item(0)->getElementsByTagName("description")->item(0)->childNodes->item(0)->nodeValue;
		echo "<p><a href='>" . $item_link . "'>" . $item_title . "</a><br>" . $item_desc . "</p>";
	}
?>