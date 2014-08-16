<?php
function randomize_weighted($numbers) {
    $total = 0;
    foreach ($numbers as $number => $weight) {
        $total += $weight;
        $distribution[$number] = $total;
    }
    $rand = mt_rand(0, $total - 1);
    foreach ($distribution as $number => $weights) {
        if ($rand < $weights) { return $number; }
    }
}

$items = array(
			'ford' => 100,
			'bmw'  => 50,
			'audi'  => 25
			);

$item = randomize_weighted($items);
echo $item;
?>
