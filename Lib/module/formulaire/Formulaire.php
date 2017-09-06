<?php
/**
 * Created by PhpStorm.
 * User: dafonseca
 * Date: 30/10/2016
 * Time: 09:40
 */

namespace Lib\module\formulaire;


class Formulaire
{

    public static function connexion(){
        return include_once 'formulaire_connexion.php';
    }

    public static function contact(){
        return include_once 'formulaire_contact.php';
    }

    public static function inscription(){
        return include_once 'formulaire_inscription.php';
    }

    public static function form_open($name = 'formulaire')
    {
        echo '<form class="form-signin" method="post">
              <h2 class="form-signin-heading"  style="width: 300px; margin-left: 36%; text-align: center">' . $name . '</h2>';

    }

    public static function input($label = '', $name = '', $msg_error = '', $type = 'text', $value = '', $placeholder = '', $class = '', $autre = '')
    {

        $error = '';
        $error2 = '';
        $error_notif = false;
        $msg = '';

        if ($_POST) {

            if (!empty($_POST[$name]) && isset($_POST[$name])) {

            } else {
                $error_notif = true;
            }

        }

        if ($error_notif == true) {
            $error = 'has-error';
            $error2 = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
            $msg = '<span style="color: #be1100">' . $msg_error . '</span>';
        }

        echo '<div class="form-group has-feedback ' . $error . '"  style="width: 300px; margin-left: 36%">
                    <label style="margin-left: 42%">' . $label . '</label>
                    <input type="' . $type . '" name="' . $name . '" value="' . (isset($_POST[$name]) ? $_POST[$name] : $value) . '" placeholder="' . $placeholder . '" class="form-control ' . $class . '" ' . $autre . ' autofocus> 
                     ' . $error2 . $msg . '
              </div>';
    }

    public static function textarea($name = '', $label = 'message', $msg_error = '', $value = '', $class = '', $autre = '')
    {

        $error = '';
        $error2 = '';
        $error_notif = false;
        $msg = '';

        if ($_POST) {

            if (!empty($_POST[$name]) && isset($_POST[$name])) {

            } else {
                $error_notif = true;
            }

        }

        if ($error_notif == true) {
            $error = 'has-error';
            $error2 = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
            $msg = '<span style="color: #be1100">' . $msg_error . '</span>';
        }

        echo '    
                <div class="form-group has-feedback ' . $error . '"  style="width: 300px; margin-left: 36%">
                    <label style="margin-left: 42%">' . $label . '</label>
                    <textarea name="' . $name . '" cols="10" rows="4" class="form-control ' . $class . '" ' . $autre . '>' . (isset($_POST[$name]) ? $_POST[$name] : $value) . '</textarea>
                    ' . $error2 . $msg . '
                </div>';

    }

    public static function datepicker($label = 'date', $name = '', $msg_error = '', $value = '', $class = '', $autre = '')
    {
        $error = '';
        $error2 = '';
        $error_notif = false;
        $msg = '';

        if ($_POST) {

            if (!empty($_POST[$name]) && isset($_POST[$name])) {

            } else {
                $error_notif = true;
            }

        }

        if ($error_notif == true) {
            $error = 'has-error';
            $error2 = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
            $msg = '<span style="color: #be1100">' . $msg_error . '</span>';
        }

        echo '<div class="form-group has-feedback ' . $error . '"  style="width: 300px; margin-left: 36%">
                     <label style="margin-left: 42%">' . $label . '</label>
                     <input type="text" name="' . $name . '" value="' . (isset($_POST[$name]) ? $_POST[$name] : $value) . '" class="form-control ' . $class . '" id="datepicker" ' . $autre . '>
                     ' . $error2 . $msg . '
                </div>';
    }

    public static function editor($label = 'editor', $name = '', $msg_error = '', $value = '', $class = '', $autre = '')
    {
        $error = '';
        $error2 = '';
        $error_notif = false;
        $msg = '';

        if ($_POST) {

            if (!empty($_POST[$name]) && isset($_POST[$name])) {

            } else {
                $error_notif = true;
            }

        }

        if ($error_notif == true) {
            $error = 'has-error';
            $error2 = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
            $msg = '<span style="color: #be1100">' . $msg_error . '</span>';
        }

        echo '<div class="form-group has-feedback ' . $error . '">
                     <label style="margin-left: 46%">' . $label . '</label>
                     <textarea name="' . $name . '" id="editor1" cols="10" rows="70" class="form-control ' . $class . '" ' . $autre . '>' . (isset($_POST[$name]) ? $_POST[$name] : $value) . '</textarea>
                <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( \'editor1\' );
                </script>
                     ' . $error2 . $msg . '
                </div>';
    }



    public static function form_close ($name = 'envoyer'){
        echo '<br><button class="btn btn-lg btn-primary btn-block" type="submit"  style="width: 300px; margin-left: 36%">' . $name . '</button>
                    </form>';
    }
}