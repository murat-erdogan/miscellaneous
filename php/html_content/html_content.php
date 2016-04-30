<?php
$site = file_get_contents('http://www.fifa.com/worldcup/matches/index.html');
$site = explode('<div class="match-list">',$site);
$site = explode('<div class="row row-last">',$site[1]);
$search = '#<span class="s-scoreText">(.*?)</span>#si';
preg_match_all($search, $site[0], $result);
echo "<pre>";
print_r($result);
?>
