
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <?php header("Content-Type: text/html; charset=ISO-8859-1",true);?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Logout</title>        
    </head>
    <body>
        <div class="container">
            <?php
                session_start();
                session_destroy();
                echo "Logout feito com sucesso. Clique no botao abaixo para fazer o Login novamente.";
            ?>
            <div>
                <a class="btn btn-default" href="index.php" style="margin:5px">Login</a>
            </div>
            
        </div>
        
    </body>
</html>