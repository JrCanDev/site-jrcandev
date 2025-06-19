<?php

switch (GETPOST('sub')) {
  case 'hebergement':
    include 'views/services/hebergement.view.php';
    break;

  case 'developpement':
    include 'views/services/developpement.view.php';
    break;

  case 'impression_3D':
    include 'views/services/impression_3D.view.php';
    break;

  case 'vr':
    include 'views/services/vr.view.php';
    break;

  default:
    break;
}