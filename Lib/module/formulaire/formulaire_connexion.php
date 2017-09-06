<?php

use Lib\database\bdd;

session_start();

if (isset($_GET['dec']))
{   session_destroy();
    header("Location: $_SERVER[HTTP_REFERER]");
}

if (!isset($_SESSION['user'])) {

    $error = false;
    $error_pseudo = false;
    $error_pass = false;
    $error_connexion = false;

    $msg_pseudo = '';
    $msg_pass = '';
    $msg_connexion = '';

    if ($_POST) {

        $bdd = new bdd();

        if (!empty($_POST['pseudo']) && isset($_POST['pseudo'])) {

        } else {
            $msg_pseudo = 'le champ pseudo est vide !! ';
            $error_pseudo = true;
            $error = true;
        }

        if (!empty($_POST['pass']) && isset($_POST['pass'])) {


        } else {
            $msg_pass = 'le champ password est vide !! ';
            $error_pass = true;
            $error = true;
        }

        if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {

            $data = $bdd->prepare('SELECT id, pseudo, pass, email
                                           FROM users 
                                           WHERE pseudo = :pseudo',
                array(
                    "pseudo" => htmlspecialchars($_POST['pseudo'])
                ));

            $data = $data->fetch();


            if ($data['pseudo'] == $_POST['pseudo'] && $data['pass'] == sha1($_POST['pass'])) {

                $_SESSION['user'] = $data['pseudo'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['pass'] = $data['pass'];

            } else {
                $msg_connexion = 'le pseudo ou le password sont incorect !! ';
                $error_connexion = true;
                $error = true;
            }
        }


        if ($error == false) {
            header("Location: $_SERVER[HTTP_REFERER]");
        }

    }

    ?>


    <form class="form-signin" style="width: 300px; margin-left: 36%" method="post">

        <h2 class="form-signin-heading">Connexion</h2>

        <?php

        if ($error_connexion != false) {
            ?>
            <div class="ui negative message">
                <div class="header">
                    erreur
                </div>
                <p><?= $msg_connexion ?></p>
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

        <div class="form-group has-feedback <?= $error_pass == true ? 'has-error' : '' ?>">
            <label>password</label>
            <input type="password" name="pass" placeholder="pass" class="form-control">
            <?= $error_pass == true ? '<span class="glyphicon glyphicon-remove form-control-feedback"></span>' : '' ?>
            <?= $error_pass == true ? '<span style="color: #be1100">' . $msg_pass . '</span>' : '' ?>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">envoyer</button>

    </form>

<?php }else{
    ?>

    <div id="profil">
        <h1>connecter</h1>

        <p>nom : <?= $_SESSION['user'] ?></p>
        <p>email : <?= $_SESSION['email'] ?></p>

        <a href="index.php?dec=dec">Logout</a>

    </div>
    <?php
} ?>



