
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
            <img src="http://4.bp.blogspot.com/-OohWGAi2yPs/UCs3j8XhtLI/AAAAAAAADFc/Fe2-IK7q0Kg/s640/C%C3%B3pia-2-de-Melhores-frases-do-Seu-Madruga.2.jpg">
            <?php
                session_start();
                session_destroy();
            ?>
            <h2 class="text-center"><b>Logout feito com sucesso. Clique no botao abaixo para fazer o Login novamente.</b></h2>
            <div>
                <a class="btn btn-default btn-block btn-lg" href="../index.php" style="margin:5px">Login</a>
            </div>
        </div>
    </body>
</html>