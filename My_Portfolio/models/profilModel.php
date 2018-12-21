<?php

    global $bdd;

    $requser = $bdd->prepare("SELECT * FROM users WHERE user_id = ?");
    $requser->execute(array($_SESSION['user_id']));
    $user = $requser->fetch();

    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['user_login'] = $user['user_login'];
    $_SESSION['user_email'] = $user['user_email'];
    $_SESSION['user_poste'] = $user['user_poste'];
    $_SESSION['user_level'] = $user['user_level'];

?>