<?php 
/**
 * 
 * Recommendation Engine - Collaborative filtering * based on user ratings
 * 
 * Not appropriate for large data sets
 * 
 */

 //TEST STAGE

$matrix = array(
  
);

 while($movie=mysqli_fetch_array($movies)){
    $matrix[$movie];
  //$matrix[$username['username']][$movie['movie_name']]=$movie['movie_rating'];
 }

 echo "<pre>";
print_r($matrix);
 echo "</pre>";