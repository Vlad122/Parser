<?php
require_once('results.php');


if(!empty($_POST)) {
  $string_parcel = $_POST['text_parcel'];
  include_once('show_results.php');
} else {
  include_once('main.php');
}