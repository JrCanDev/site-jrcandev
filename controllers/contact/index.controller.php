<?php

switch (GETPOST('sub')) {
  case 'charte':
    include 'views/contact/charte.view.php';
    break;

  case 'rejoindre':
    include 'views/contact/rejoindre.view.php';
    break;

  case 'contact':
    include 'views/contact/contact.view.php';
    break;

  case 'bureau':
    include 'views/contact/bureau.view.php';
    break;

  default:
    break;
}