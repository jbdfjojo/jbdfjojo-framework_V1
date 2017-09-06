<?php
/**
 * Created by PhpStorm.
 * User: dafonseca
 * Date: 30/10/2016
 * Time: 13:25
 */

namespace Lib\module\Slides;


use Config\Config;

class Slides
{

    public static function SlideShow( $tab = []){


        ?>
        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="padding-top: 1%">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

            <?php for($i = 1; $i < sizeof($tab); $i++): ?>
                <li data-target="#myCarousel" data-slide-to="<?= $i ?>"></li>
            <?php endfor; ?>
            </ol>

            <!-- Wrapper for slides -->


        <div class="carousel-inner" role="listbox">

            <div class="item active">
                <p align="center"><img src="<?= Config::Params('img') ?><?= $tab[0]['img'] ?>" alt="Chania"></p>
                <div class="carousel-caption">
                    <h3><?= $tab[0]['title'] ?></h3>
                    <p><?= $tab[0]['text'] ?></p>
                </div>
            </div>

         <?php for($i = 1; $i < sizeof($tab); $i++): ?>
             <div class="item">
                 <p align="center"><img src="<?= Config::Params('img') ?><?= $tab[$i]['img'] ?>" alt="Chania"></p>
                 <div class="carousel-caption">
                     <h3><?= $tab[$i]['title'] ?></h3>
                     <p><?= $tab[$i]['text'] ?></p>
                 </div>
             </div>

         <?php endfor; ?>

     </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        <?php

    }
}