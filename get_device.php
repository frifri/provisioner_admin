<?php 

require_once 'bootstrap.php';  

$mac_address = strtolower($_POST['mac']);

$_2600hz = new models_2600hz($mac_address);

if ($_2600hz->display_mac_lookup()) {
    $_2600hz->display_account();
    $_2600hz->display_device();
}