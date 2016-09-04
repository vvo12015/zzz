<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://twbs.docs.org.ua/favicon.ico">

    <title><?php echo $this->getTitle(); ?></title>
    
        <link href="../../css/style.css" rel="stylesheet">
        <link href="../../css/bootstrap.css" rel="stylesheet">
        <link href="../../css/bootstrap.css.map" rel="stylesheet">
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../../css/bootstrap-theme.css.map" rel="stylesheet">
        <link href="../../css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="../../css/theme.css" rel="stylesheet">

    </head>
    

  <body role="document">
        <header>
         <?php include ROOT . DS . '/app/layouts/layoutMenu.php';?>
        </header>
      <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6 filtr-msg pd-mr">
    <form method="post" action="<?php \filter_input(INPUT_SERVER, 'REQUEST_URI'); ?>" class="form-inline">
        <div class="form-group">   
            <select name = 'sort_category' class="form-control">
                <option value='name'>ім'я</option>
                <option value='email'>e-mail</option>
                <option value='date'>Дата</option>
            </select>
            </div>    
            <div class="form-group">      
                <select name = 'sort_type' class="form-control">
                    <option value='ASC'>A-Z</option>
                    <option value='DESC'>Z-A</option>
                </select>
            </div>
            <div class="form-group">  
            <button class="btn btn-default btn-sm" type="submit">Відсортувати</button>
        </div>
    </form>
          </div>
               <div class="col-md-3"></div>
      </div>
        <?php
            include(ROOT . DS . 'app/views/index/'.$content_view.'.php');
        ?>
    </body>
</html>

    <script src="../../js\jquery-3.1.0.min.js"></script>
    <script src="../../js\bootstrap.min.js"></script>
    <script src="../../js\bootstrap.js"></script>
    <script src="../../js\npm.js"></script>