<?php
/**
 * Created by PhpStorm.
 * User: dafonseca
 * Date: 26/07/2016
 * Time: 15:19
 */

namespace Lib\module\route;



use Config\Config;

class route

{
    private $fields = [];
    private $closure;
    public function Get()
    {

        $this->fields = func_get_args();


        if (!empty($this->fields)) {

            for ($i = 0; $i < count($this->fields); $i++) {
                
                if (!is_string($this->fields[$i])) {
                   
                   echo "<p style=\" color:red; \">erreur ( " . $this->fields[$i]. " ) n'est pas un type String <br></p>" ;

                }else{
                    array_push($GLOBALS['page'], $this->fields[$i]);
                }

            }
        }

        return $this;
    }

    public function Where()
    {
         $this->fields = func_get_args();

         for ($i=0; $i < count($this->fields); $i++) { 

            if (isset($this->fields[$i])) {
                $this->closure = $this->fields[$i];
                $GLOBALS['closure'] = $this->closure;

                foreach ($GLOBALS['closure'] as $k => $v) {
                   
                    if (array_key_exists( $k ,$this->fields[$i]) && is_callable($this->fields[$i][$k])) {

                       $this->$k = $v;

                    }else{
                         echo "<p style=\" color:red; \">erreur ( " . $this->fields[$i][$k] . " ) n'est pas un type Closure <br></p>" ;
                    }
                }

            }
         }


        return $this;
    }

    public function variable()
    {
        $this->fields = func_get_args();

        for ($i=0; $i < count($this->fields); $i++) { 

            if (isset($this->fields[$i])) {
                $this->closure = $this->fields[$i];
                $GLOBALS['var'] = $this->closure;

                foreach ($GLOBALS['var'] as $k => $v) {
                   
                    if (array_key_exists( $k ,$this->fields[$i])) {

                       $this->$k = $v;

                    }
                }

            }
         }
        return $this;
    }

    public function send()
    {
        return $this->include_file();
    }

    public function include_file()
    {
        $this->fields = func_get_args();


        $temp = '';

        if ($_GET['p'] == 'documentation') {

            include_once '../Lib/doc/documentation.php';

        } else {

            if (isset($_GET["p"])) {
                $page = $_GET["p"];
            } else {
                $page = Config::Params('home');
            }

            $chemin = [
                0=> [
                    0 => Config::Params('Model'),
                    1 => "Model_$page.php",
                ],
                1 => [
                    0 => Config::Params('Controller'),
                    1 => "Ctrl_$page.php",
                ],
                
                2 => [
                    0 => Config::Params('Views'),
                    1 => "View_$page.php",
                ]
            ];

            foreach ($chemin as $key_chemin => $value_chemin) {

               $GLOBALS['file_ok'] = false;
            
               $directory = $value_chemin[0];

               $iter = new \RecursiveDirectoryIterator($directory);

                 foreach ($GLOBALS['page'] as $key_page => $value_page) {

                    if ($page == $value_page) {
                        foreach (new \RecursiveIteratorIterator($iter) as $file) {

                            if($file->getFilename() != "." && $file->getFilename() != ".." && $file->getFilename() == $chemin[$key_chemin][1]){

                                if (!$GLOBALS['file_ok']) {
                                    
                                    if (file_exists($file->getPath() . "/" . $chemin[$key_chemin][1]) && $file->getFilename() == $chemin[$key_chemin][1]) {

                                        if ($file->getFilename() == $chemin[2][1]) {
                                             $GLOBALS['file_ok'] = true;

                                        }

                                        include_once $file->getPath(). "/" . $chemin[$key_chemin][1];
                                        
                                    }
                                }

                            }
                        }
                    }
                }    
            }

                if (!$GLOBALS['file_ok'] ) {
                     include_once '../Lib/module/error/404.php';
                } 
                
        return $this;
    }
}


}