<?php
function get_dice_results($dice_type, $count, $operator, $min_value) {
  $results = array();
  for($i = 0; $i < $count; $i++) {
    $results[] = rand(1, $dice_type);
  }
  switch ($operator) {
    case ">":
      for($i = 0; $i < $count; $i++) {
        if ($results[$i] < $min_value ){
          unset($results[$i]);
        }
      }
      break;
    case ">=":
      for($i = 0; $i < $count; $i++) {
        if ($results[$i] <= $min_value ){
          unset($results[$i]);
        }
      }
      break;
    case "<":
      for($i = 0; $i < $count; $i++) {
        if ($results[$i] > $min_value ){
          unset($results[$i]);
        }
      }
      break;
    case "<=":
      for($i = 0; $i < $count; $i++) {
        if ($results[$i] >= $min_value ){
          unset($results[$i]);
        }
      }
      break;
    case "=":
      for($i = 0; $i < $count; $i++) {
        if ($results[$i] != $min_value ){
          unset($results[$i]);
        }
      }
      break;
  }
  return $results;
}
function filter_wrapper($dice_type, $count, $trigger, $operator, $min_value) {
  $results = get_dice_results($dice_type, $count, $operator, $min_value);
  if($trigger == "asc") {
    sort($results);
    return $results;
  }
  elseif($trigger == "desc") {
    rsort($results);
    return $results;
  } else{
    return $results;
  }
}
function parcel($string_parcel) {
  $string = explode(" ", $string_parcel);
  if (($string[0] == "throw") && ($string[3] = "filter") ) {
    $options['count'] = $string[1];
    $options['min_value'] = $string[5];
    $options['trigger'] = $string[7];
    $options['operator'] = $string[4];
    $second_string = explode("d", $string[2]);
    $options['dice_type'] = $second_string[1];
  } else {
    echo "incorrect data";
  }
  return $options;
}