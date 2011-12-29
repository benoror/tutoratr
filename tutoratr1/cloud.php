<?php

$query = "SELECT tutor AS tag, AVG(rating) AS quantity
  FROM `itesm-mty`
  GROUP BY tutor
  ORDER BY AVG(rating) DESC";

$result = mysql_query($query);

// here we loop through the results and put them into a simple array:
// $tag['thing1'] = 12;
// $tag['thing2'] = 25;
// etc. so we can use all the nifty array functions
// to calculate the font-size of each tag
while ($row = mysql_fetch_array($result)) {

    $tags[$row['tag']] = $row['quantity'];
}

// change these font sizes if you will
$max_size = 100; // max font size in %
$min_size = 10; // min font size in %

// get the largest and smallest array values
$max_qty = max(array_values($tags));
$min_qty = 7; //min(array_values($tags));

// find the range of values
$spread = $max_qty - $min_qty;
if (0 == $spread) { // we don't want to divide by zero
    $spread = 1;
}

// determine the font-size increment
// this is the increase per tag quantity (times used)
$step = ($max_size - $min_size)/($spread);

// loop through our tag array
foreach ($tags as $key => $value) {
    
    if($value >= $min_qty) {
        // calculate CSS font-size
        // find the $value in excess of $min_qty
        // multiply by the font-size increment ($size)
        // and add the $min_size set above
        $size = $min_size + (($value - $min_qty) * $step);
        // uncomment if you want sizes in whole %:
        // $size = ceil($size);

        // you'll need to put the link destination in place of the #
        // (assuming your tag links to some sort of details page)
        //echo '<span style="color: rgb('.$red.'%,'.$gre.'%,0%);">';
        echo '<a href="" style="font-size: '.$size.'%";';
        // perhaps adjust this title attribute for the things that are tagged
        echo ' title="Promedio: '.$value.' para '.$key.'"';
        echo '>'.$key.'</a>';
        //echo '</span> ';
        // notice the space at the end of the link
    }
}

?>
