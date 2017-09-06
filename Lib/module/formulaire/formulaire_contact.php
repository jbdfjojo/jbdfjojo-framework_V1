<?php
session_start();
use Lib\database\bdd;

$error = false;
$success = false;
$error_pseudo = false;
$error_email = false;
$error_subject = false;
$error_message = false;

$msg_pseudo = '';
$msg_email = '';
$msg_subject = '';
$msg_message = '';

if ($_POST) {

    $bdd = new bdd();

    if (!empty($_POST['pseudo']) && isset($_POST['pseudo'])) {

    } else {
        $msg_pseudo = 'le champ pseudo est vide !! ';
        $error_pseudo = true;
        $error = true;
    }

    if (!empty($_POST['email']) && isset($_POST['email'])) {

    } else {
        $msg_email = 'le champ email est vide !! ';
        $error_email = true;
        $error = true;
    }

    if (!empty($_POST['subject']) && isset($_POST['subject'])) {

    } else {
        $msg_subject = 'le champ subject est vide !! ';
        $error_subject = true;
        $error = true;
    }

    if (!empty($_POST['message']) && isset($_POST['message'])) {

    } else {
        $msg_message = 'le champ email est vide !! ';
        $error_message = true;
        $error = true;
    }


    if ($error == false) {

        try {
            $TO = "jbdfjojo@gmail.com";

            $h = "From: " . $TO;

            $message = "";

            while (list($key, $val) = each($_POST)) {
                $message .= "$key : $val\n";
            }

            $subject = $_POST['subject'];

        }catch (ErrorException $e){
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
        mail($TO, $subject, $message, $h);

        $success = true;

    }

}

?>

<form class="form-signin" style="width: 300px; margin-left: 36%" method="post">
    <h2 class="form-signin-heading">contact</h2>
    <?php

    if ($success == true) {
        ?>
        <div class="ui positive message">
            <div class="header">
                success
            </div>
            <p>votre message a bien été envoyer !!</p>
        </div>
        <?php
    }

    ?>
    <div class="form-group has-feedback <?= $error_pseudo == true ? 'has-error' : '' ?>">
        <label>pseudo</label>
        <input type="text" name="pseudo" placeholder="pseudo" value="<?php if (isset($_SESSION['user'])) {
            echo $_SESSION['user'];
        } ?>" class="form-control" autofocus>
        <?= $error_pseudo == true ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : '' ?>
        <?= $error_pseudo == true ? '<span style="color: #be1100">' . $msg_pseudo . '</span>' : '' ?>
    </div>

    <div class="form-group has-feedback <?= $error_email == true ? 'has-error' : '' ?>">
        <label>Email address</label>
        <input type="email" name="email" placeholder="email" value="<?php if (isset($_SESSION['email'])) {
            echo $_SESSION['email'];
        } ?>" class="form-control">
        <?= $error_email == true ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : '' ?>
        <?= $error_email == true ? '<span style="color: #be1100">' . $msg_email . '</span>' : '' ?>
    </div>

    <div class="form-group has-feedback <?= $error_subject == true ? 'has-error' : '' ?>">
        <label>subject </label>
        <input type="test" name="subject" placeholder="subject" class="form-control">
        <?= $error_subject == true ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : '' ?>
        <?= $error_subject == true ? '<span style="color: #be1100">' . $msg_subject . '</span>' : '' ?>
    </div>

    <div class="form-group has-feedback <?= $error_message == true ? 'has-error' : '' ?>">
        <label>message</label>
        <textarea name="message" id="message" cols="10" rows="4" class="form-control"></textarea>
        <?= $error_message == true ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : '' ?>
        <?= $error_message == true ? '<span style="color: #be1100">' . $msg_message . '</span>' : '' ?>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>