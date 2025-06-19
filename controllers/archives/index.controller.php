<?php
$sub = null;
$annee = null;

switch (GETPOST('sub')) {
  case 'but1_info':
    $sub = 'but1_info.view.php';
    break;

  case 'but2_info':
    $sub = 'but2_info.view.php';
    break;

  case 'but2_gea':
    $sub = 'but2_gea.view.php';
    break;

  case 'but3_info':
    $sub = 'but3_info.view.php';
    break;

  case 'ECV':
    $sub = 'ECV.view.php';
    break;

  case 'nuit_info':
    $sub = 'nuit_info.view.php';
    break;

  case 'autres':
    $sub = 'autres.view.php';
    break;

  default:
    break;
}

switch (GETPOST('annee')) {
  case '2023-2024':
    $annee = '2023-2024';
    break;

  case '2024-2025':
    $annee = '2024-2025';
    break;

  case '2025-2026':
    $annee = '2025-2026';
    break;

  case null:
    include 'views/archives/index.view.php';
    break;

  default:
    break;
}


if ($annee !== null && $sub !== null) {
  include "views/archives/$annee/$sub";
}