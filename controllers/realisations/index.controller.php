<?php

switch (GETPOST('sub')) {
  case 'but1_info':
    include 'views/realisations/but1_info.view.php';
    break;

  case 'but2_info':
    include 'views/realisations/but2_info.view.php';
    break;

  case 'but2_gea':
    include 'views/realisations/but2_gea.view.php';
    break;
    
  case 'but3_info':
    include 'views/realisations/but3_info.view.php';
    break;

  case 'ECV':
    include 'views/realisations/ECV.view.php';
    break;

  case 'nuit_info':
    include 'views/realisations/nuit_info.view.php';
    break;

  case 'autres':
    include 'views/realisations/autres.view.php';
    break;

  default:
    break;
}