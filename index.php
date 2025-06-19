<?php
include_once 'lib/common.php';
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

switch (GETPOST('page')) {
  case 'realisations':
    include 'controllers/realisations/index.controller.php';
    break;

  case 'contact':
    include 'controllers/contact/index.controller.php';
    break;

  case 'services':
    include 'controllers/services/index.controller.php';
    break;

  case 'faq':
    include 'controllers/faq/index.controller.php';
    break;

  case 'archives':
    include 'controllers/archives/index.controller.php';
    break;

  case 'mentions_legales':
    include 'controllers/mentions_legales/index.controller.php';
    break;

  case 'accueil':
  case null:
    include 'controllers/accueil/index.controller.php';
    break;

  default:
    break;
}