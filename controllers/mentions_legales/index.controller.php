<?php

switch (GETPOST('sub')) {
  case null:
    include 'views/mentions_legales/index.view.php';
    break;

  default:
    break;
}