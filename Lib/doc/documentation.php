<style>
    .nav.navbar-nav.doc a {
        width: 150px;
    }
</style>

<div class="row">
    <div class="col-md-3">
        <nav class="navbar navbar-default sidebar" role="navigation" style="position: fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-sidebar-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                    <ul class="nav navbar-nav doc">
                        <li><a href="#config">config<span style="font-size:16px;"
                                                          class="pull-right hidden-xs showopacity glyphicon glyphicon-menu-right"></span></a>
                        </li>
                        <br>
                        <li><a href="#route">route <span style="font-size:16px;"
                                                         class="pull-right hidden-xs showopacity glyphicon glyphicon-menu-rightglyphicon glyphicon-menu-right"></span></a>
                        </li>
                        <br>
                        <li><a href="#template">template <span style="font-size:16px;"
                                                               class="pull-right hidden-xs showopacity glyphicon glyphicon-menu-rightglyphicon glyphicon-menu-right"></span></a>
                        </li>
                        <br>
                        <li><a href="#module">module<span style="font-size:16px;"
                                                          class="pull-right hidden-xs showopacity glyphicon glyphicon-menu-right"></span></a>
                        </li>
                        <br>
                        <li><a href="#formulaire">formulaire<span style="font-size:16px;"
                                                                  class="pull-right hidden-xs showopacity glyphicon glyphicon-menu-right"></span></a>
                        </li>
                        <br>
                        <li><a href="#sql">sql<span style="font-size:16px;"
                                                    class="pull-right hidden-xs showopacity glyphicon glyphicon-menu-right"></span></a>
                        </li>
                        <br>
                        <li><a href="#slides">slides<span style="font-size:16px;"
                                                          class="pull-right hidden-xs showopacity glyphicon glyphicon-menu-right"></span></a>
                        </li>
                        <br>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="col-md-9">
        <div style="text-align: center">
            <h1><u>documentation du framework</u></h1>

            <br>
            <p id="config">&nbsp;</p><br><br>
            <p><u>config</u></p>
            <p>Comment configurer le framework ?</p>
            <p> Toutes les configurations sont gérer par config.php</p>
            <p> Toutes les route sont gérer par web.php</p>
            <p>comme le framework est basé sur le systeme MVC vous devez respercter une certaine nomanclature pour les
                noms de
                fichier</p>
            <p> View_page.php pour vos vue</p>
            <p> Ctrl_page.php pour vos controller</p>
            <p> Model_page.php pour vos model</p>
            <p>Initialiser le module route où vous souhaitez que vos pages apparaissent</p>
            <pre class="formatCode" style="width: 400px; margin-left: 25%;">
      < ?php include '../Config/web.php' ?>
            </pre>


            <p id="route">&nbsp;</p><br><br>
            <p><u>route</u></p>
            <p> Comment configurer les routes ??</p>
            <p>le framework charge automatiquement les pages depuis la racine du dossier Views grace au variable GET</p>
            <p>exemple "index.php?p=home" </p>
            <p> chargera en 1er le Model Model_home.php</p>
            <p> chargera en 2eme le Controller Ctrl_home.php</p>
            <p> chargera en 3eme la pages Views_home.php</p>
            <p>grâce au framework une variable défini dans le controller sera disponible dans sa vue sans pour autant
                l'appeler
                au
                préalable</p>
            <p>vous pouvez si vous le souhaitez creer une autre architecture voir ci-desous</p>
            <p>( MAIS ATTENTION vous devez garder la meme architecure dans les dossier Views, Controller et Model</p>
            <pre class="formatCode" style="width: 500px; margin-left: 20%">
                Views
                   |-- View_home.php
                   |-- test
                        |-- View_test.php
                Controller
                   |-- Ctrl_home.php
                   |-- test
                        |-- Ctrl_test.php
                Model
                   |-- Model_home.php
                   |-- test
                        |-- Model_test.php
            </pre>
            <p>vous disposer de trois methodes pour geres les routes</p>
            <pre class="formatCode" style="width: 500px; margin-left: 20%">
        ->get('page_1', 'page_2')
        ->where([
                  'nom_function1' => function () {} ,
                  'nom_function2' => function () {}
                ])
        ->variable([
                    'nom_variable1' => 'contenu_variable1',
                    'nom_variable2' => 'contenu_variable2'
                   ])
</pre>
            <p>detail des trois methodes</p>
            <p>get() => permet d'ajouter une nouvelle route en declarant les nom de vos page qui se situe dans le fichier wiews
                         <br>( ATTENTION a bien ajouter vos pages pour qu'elle soit prise en compte par le framework
                )</p>
            <p>where() => ajouter dans le tableau les function qui seront disponible dans toutes vos pages</p>
            <p>variable() => ajouter dans le tableau les variables qui seront disponible dans toutes vos pages </p>
            <p>les methodes where() et variable() sont optionnelles elles ne servent que si vous souhaitez envoyer a toutes vos
                pages des
                variables
                ou
                des functions</p>
            <p>comment appeler une function ou une variable dans vos pages? </p>
            <pre class="formatCode" style="width: 500px; margin-left: 20%">
    variable => $this->test
    function => $this->name('oky')
</pre>


            <p id="template">&nbsp;</p><br><br>
            <p><u>template</u></p>
            <p> Comment modifier le template ??</p>
            <p> vous pouvez changer le template par default si vous le souhaitez mais vous devez absolument avoir
                les elements suivant</p>
            <p>
            <ul style="text-align: justify">
                <li>head
                    <ul>
                        <li>css
                            <ul>
                                <li>bootstrap css =>
                                    https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css
                                </li>
                                <li>bootstrap theme =>
                                    https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css
                                </li>
                                <li>semantic-ui css =>
                                    https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.css
                                </li>
                                <li>jquery-ui css => //code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css</li>
                            </ul>
                        </li>
                        <li>script
                            <ul>
                                <li> jquery => https://code.jquery.com/jquery-1.12.4.js</li>
                                <li>jquery-ui => https://code.jquery.com/ui/1.12.1/jquery-ui.js</li>
                                <li>ckeditor => //cdn.ckeditor.com/4.5.11/full/ckeditor.js</li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>script en bas de pages
                    <ul>
                        <li>function de demarrage de datepicker()</li>
                        <li><pre>
                              $( function() {
                                  $( "#datepicker" ).datepicker();
                              } );
                                 </pre>
                        </li>
                        <li>bootstrap js => https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js</li>
                    </ul>
                </li>
            </ul>
            </p>
            <p>une fois que vous avez mis tout les elements il vous reste plus qu'a configurer le template par default
                dans config.php</p>

            <br>
            <p id="module">&nbsp;</p><br><br>
            <p><u>module</u></p>
            <p>comment appeler un module ?</p>
            <p>Chaque module dispose d'une class qui gère son fonctionnement exemple pour le module formulaire </p>
            <pre class="formatCode" style="width: 400px; margin-left: 25%">
          use \Lib\module\formulaire\
          Formulaire::contact();
</pre>
            <br>

            <p id="formulaire">&nbsp;</p><br><br>
            <p><u>formulaire</u></p>
            <p>vous avez trois module deja pret ( contact, inscription, connexion )</p>
            <pre class="formatCode" style="width: 550px; margin-left: 18%">

          \Lib\module\formulaire\Formulaire::contact();
          \Lib\module\formulaire\Formulaire::inscription();
          \Lib\module\formulaire\Formulaire::connexion();

</pre>
            <p>Si vous ne souhaitez pas utiliser le module formulaire, il vous est possible de le créer vous-même!!</p>
            <p> 1/ On ouvre le formulaire <br> ( ATTENTION a bien mettre le use a la premiere ligne de la pages ou vous souhaitez l'apeller )</p>
            <p> 2/ On le compose</p>
            <p> 3/ On ferme le formulaire</p>
            <pre class="formatCode" style="width: 720px; margin-left: 8%">

    use Lib\module\formulaire\Formulaire;        

    Formulaire::form_open();

    Formulaire::input( 'pseudo' , 'pseudo', 'erreur', 'text', 'pseudo', 'class="test"' );
    Formulaire::input( 'pass' , 'pass', 'erreur', 'password', 'pass', 'class="test"' );

    Formulaire::form_close();
</pre>
            <p> Détail des fonctions disponible :</p>
            <pre class="formatCode" style="width: 980px; margin-left: -8%">

    Formulaire::form_open ($name = 'formulaire')

    Formulaire::input($label = '', $name = '', $msg_error = '', $type = 'text', $placeholder = '', $class = '', $autre = '')
    Formulaire::textarea($name = '', $label = 'message', $msg_error = '', $class = '', $autre = '')
    Formulaire::datepicker($label = 'date', $name = '', $msg_error = '', $class = '', $autre = '')
    Formulaire::editor($label = 'editor', $name = '', $msg_error = '', $value = '', $class = '', $autre = '')

    Formulaire::form_close ($name = 'envoyer')


</pre>
            <br>

            <p id="sql">&nbsp;</p><br><br>
            <p id=""><u>sql</u></p>
            <p>comment cree une requete sql ?</p>
            <p>le framewok dispose d'un QueryBuilder qui vous permettra de cree votre requete simplement</p>
            <p> exemple de requete sql </p>
            <pre class="formatCode" style="width: 650px; margin-left: 12%">
      $query = new \Lib\database\bdd();

      $requete = $query->select('*')->from('posts')->send();

      $requete = $query->insert('posts', ['title', 'body'])
                 ->values(':title', ':body')
                 ->tab([ 'title' => 'titre 3', 'body' => 'contenu 3'])
                 ->send();

      $requete = $query->update('posts')->set('title = :title', 'body = :body')
                 ->where('id = :id')
                 ->tab([ 'title' => 'tato', 'body' => 'huhu', 'id' => 3])
                 ->send();
</pre>
            <br>
            <p> le principe est simple vous la construiser comme une requete normal </p>
            <p> chaque mot-clé est une méthode et dans les paramètres de la méthode la valeur qui lui est associée </p>
            <p> exemple </p>
            <pre class="formatCode" style="width: 500px; margin-left: 20%">
    $query = new \Lib\database\bdd();

    $requete = $query->select('*')->from('posts')->send();
    $requete = query('SELECT * FROM posts')->fetch();
</pre>


            <br>
            <p id="slides">&nbsp;</p><br><br>
            <p><u>Slides</u></p>
            <p> vous avez la possibilité d'appeler un slide pour vos images exemple ci-dessous</p>
            <pre class="formatCode" style="width: 410px; margin-left: 26%">
\Lib\module\Slides\Slides::SlideShow([
    [
        'img' => 'johanna.jpeg',
        'title' => 'titre 1',
        'text' => 'images 1'
    ],
    [
        'img' => 'mayfourblocknature.jpg',
        'title' => 'titre 2',
        'text' => 'images 2'
    ],
    [
        'img' => 'trolltunga.jpg',
        'title' => 'titre 3',
        'text' => 'images 3'
    ],
]);
    </pre>

            <br><br><br><br><br><br>
        </div>
    </div>
</div>
