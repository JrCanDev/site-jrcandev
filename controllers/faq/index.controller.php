<?php

switch (GETPOST('sub')) {
  case null:
    include 'views/faq/index.view.php';
    break;

  default:
    break;
}