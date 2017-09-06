<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>

    <link rel="stylesheet" href="<?= Config\Config::Params('css') ?>">
    <title><?= Config\Config::Params('title') ?></title>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            </button>
            <a class="navbar-brand" href="#"><?= Config\Config::Params('title') ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php?p=home">Home</a></li>
                <li><a href="index.php?p=test">test</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?p=documentation">documentation</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" id="app" style="  padding-top: 5%;">
    <?php include '../Config/web.php'; ?>
       
</div>

<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= Config\Config::Params('js') ?>"></script>
</body>
</html>