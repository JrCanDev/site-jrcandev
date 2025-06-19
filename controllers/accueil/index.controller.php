<?php

switch (GETPOST('sub')) {
  case null:
    include 'views/accueil/index.view.php';
    break;

  default:
    break;
}