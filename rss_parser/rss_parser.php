<?php
$xml = simplexml_load_file('http://rss.hurriyet.com.tr/rss.aspx?sectionId=1');
$namespaces = $xml->getNamespaces(true); 

$items = array();
foreach ($xml->channel->item as $item) {
	$temp = new stdClass(); 
	$temp->title = $item->title;
	$temp->link = $item->link;
	$temp->image = $item->children($namespaces['media'])->content->attributes()->url;
	$items[] = $temp;
}
echo "<pre>";
print_r($items);
/*
Example: Retrieving first element's image.
echo $items[1]->image;
*/
?> 
