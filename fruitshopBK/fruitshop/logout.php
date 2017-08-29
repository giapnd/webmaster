<?php
    session_start();
    $session_name = session_name();
    $_SESSION = array();
    if (isset($_COOKIE['account_name'])) {
      setcookie('account_name', '', time() - 42000);
    }
    if (isset($_COOKIE['account_id'])) {
      setcookie('account_id', '', time() - 42000);
    }
    if (isset($_COOKIE['permisions'])) {
      setcookie('permisions', '', time() - 42000);
    }
    session_destroy();
    header('Location: /fruitshop/fruit.php?');
    exit;
?>