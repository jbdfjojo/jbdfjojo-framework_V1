<?php
use Lib\module\route\routeFacade;

include_once '../Lib/Global.php';

            //route
routeFacade::get("home","test")

            // function
            ->where(
            [
                'name' => function ($test) {
                    echo $test;
                }
            ])
            // variables
            ->variable([
                'test' => 'ce n est pas un test'
            ])

// attention ne pas toucher
->send();