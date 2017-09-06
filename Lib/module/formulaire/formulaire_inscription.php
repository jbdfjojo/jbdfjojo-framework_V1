<?php

use Lib\database\bdd;

$email_exist = true;
$pseudo_exist = true;

$error = false;
$success = false;
$error_pseudo = false;
$error_email = false;
$error_pass = false;

$pseudo = '';
$email = '';
$pass = '';

$msg_pseudo = '';
$msg_email = '';
$msg_pass = '';

if ($_POST) {

    $bdd = new bdd();

    if (!empty($_POST['pseudo']) && isset($_POST['pseudo'])) {

        $pseudo_tmp = $_POST['pseudo'];
        $query = $bdd->query("SELECT pseudo FROM users WHERE pseudo='" . $pseudo_tmp . "'");
        while ($row = $query->fetch()) {
            if ($row['pseudo'] == $pseudo_tmp) {
                $pseudo_exist = false;
            }
        }
        if ($pseudo_exist) {
            $pseudo = $_POST['pseudo'];
        } else {
            $msg_pseudo = $pseudo_tmp . ' existe deja !! ';
            $error_pseudo = true;
            $error = true;
        }
    } else {
        $msg_pseudo = 'le champ pseudo est vide !! ';
        $error_pseudo = true;
        $error = true;
    }

    if (!empty($_POST['email']) && isset($_POST['email'])) {

        $email_tmp = $_POST['email'];
        $query = $bdd->query("SELECT email FROM users WHERE email='" . $email_tmp . "'");
        while ($row = $query->fetch()) {
            if ($row['email'] == $email_tmp) {
                $email_exist = false;
            }
        }

        if ($email_exist) {
            $email = $_POST['email'];
        } else {
            $msg_email = $email_tmp . ' existe deja !! ';
            $error_email = true;
            $error = true;
        }
    } else {
        $msg_email = 'le champ email est vide !! ';
        $error_email = true;
        $error = true;
    }

    if (!empty($_POST['pass']) && !empty($_POST['pass_confirm']) && isset($_POST['pass']) && isset($_POST['pass_confirm'])) {

        if ($_POST['pass'] == $_POST['pass_confirm']) {

            if ($error == false) {
                $bdd->prepare('INSERT INTO users(pseudo, pass, email) VALUES (:pseudo, :pass, :email)',
                    array(
                        "pseudo" => htmlspecialchars($_POST['pseudo']),
                        "pass" => sha1(htmlspecialchars($_POST['pass'])),
                        "email" => htmlspecialchars($_POST['email'])
                    ));
                $success = true;
            }

        } else {
            $msg_pass = 'les deux mot de pass ne sont pas identique  !! ';
            $error_pass = true;
            $error = true;
        }
    } else {
        $msg_pass = 'le champ password ou le champ password confirm sont vide !! ';
        $error_pass = true;
        $error = true;
    }

}

?>

<form class="form-signin" style="width: 300px; margin-left: 36%" method="post">
    <h2 class="form-signin-heading">inscription</h2>

    <?php

    if ($success == true) {
        ?>
        <div class="ui positive message">
            <div class="header">
                success
            </div>
            <p> Votre inscription a bien été effectuée !! </p>
        </div>
        <?php
    }

    ?>

    <div class="form-group has-feedback <?= $error_pseudo == true ? 'has-error' : '' ?>">
        <label>pseudo</label>
        <input type="text" name="pseudo" placeholder="pseudo" class="form-control" autofocus>
        <?= $error_pseudo == true ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : '' ?>
        <?= $error_pseudo == true ? '<span style="color: #be1100">' . $msg_pseudo . '</span>' : '' ?>
    </div>

    <div class="form-group has-feedback <?= $error_email == true ? 'has-error' : '' ?>">
        <label>email</label>
        <input type="email" name="email" placeholder="email" class="form-control">
        <?= $error_email == true ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : '' ?>
        <?= $error_email == true ? '<span style="color: #be1100">' . $msg_email . '</span>' : '' ?>
    </div>

    <div class="form-group has-feedback <?= $error_pass == true ? 'has-error' : '' ?>">
        <label>password</label>
        <input type="password" name="pass" placeholder="pass" class="form-control">
        <?= $error_pass == true ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : '' ?>
        <?= $error_pass == true ? '<span style="color: #be1100">' . $msg_pass . '</span>' : '' ?>
    </div>

    <div class="form-group has-feedback <?= $error_pass == true ? 'has-error' : '' ?>">
        <label>password confirm</label>
        <input type="password" name="pass_confirm" placeholder="pass confirm" class="form-control">
        <?= $error_pass == true ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : '' ?>
        <?= $error_pass == true ? '<span style="color: #be1100">' . $msg_pass . '</span>' : '' ?>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>
