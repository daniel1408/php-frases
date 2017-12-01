<?php
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['user'])){
?>

<html>
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        
        <title>Banco de Frases</title>
        
    </head>
    <body style="background-color:#F0EEEE">        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron" style="background-image: url('http://images5.fanpop.com/image/photos/29300000/Joker-Quotes-jack-napier-29338610-1191-670.jpg'); opacity: 1; color: white">
                        <div style="text-decoration: none; color: white; background-color: black; width: 30%">
                            <a class="btn btn-default" href="../View/list-frases.php" style="margin:5px">Minhas Frases</a>
                            <a class="btn btn-default" href="../View/list-autores.php" style="margin:5px">Autores</a>
                            <a class="btn btn-default" href="../View/logout.php" style="margin:6px">Logout</a>                            
                        </div>
                        <h2 style="background-color: black; width: 50%; height: 45px; padding: 5px"><b>Ola, bem vindo <?php echo $_SESSION['user']?></b></h2>
                        <br>
                        <p style="background-color: black; padding: 5px">Aqui reunimos as frases mais marcantes de varios autores para lhe motivar nessa terrivel e amargurada caminhada que chamam de vida. <b>Mas lembre-se, seja sempre positivo</b></p>
                        
                        
                        <div style="margin-top: 1%">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-inline">
                                <div>
                                    <input class="form-control" type="text" name="parametro" placeholder="Qual frase deseja buscar hoje?" style="width:70%; height: 50px; margin-left: 10%"/>
                                    <input class="btn btn-info" type="submit" value="Buscar" style="height: 48px;"/>
                                </div>
                            </form>
                        </div>
                        
                  </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center"><b>Frases cadastradas</b></h2>
                    
                    <?php
                        spl_autoload_register(function ($class_name) {
                            include '../Model/' . $class_name . '.php';
                        });

                        ini_set('default_charset', 'UTF-8');
                        
                        try {
                            $parametro = filter_input(INPUT_GET, "parametro");
                            if($parametro){             
                                $stmt = FraseDao::selectLike($parametro);
                            }else{
                                $stmt = FraseDao::selectAll();
                            }
                            while($row = $stmt->fetch()) {
                    ?>

                    <div class="card" style="margin: 10px;display: inline-block; width: 35rem; background-color: white; padding: 6px; border-radius: 11px; box-shadow: 0px 7px 40px -1px rgba(0,0,0,0.75); ">
                        <div class="card-body">
                            <h4 style="color:black; font: italic  15px/30px Georgia, serif; " class="card-text"><b>Frase: </b> <?php echo $row['texto']?></h4>                            
                            <h4 style="position: relative; float: right; font: italic  15px/30px Georgia, serif;"><b> Autor: <?php echo $row['autor']?></h4>
                            <h6 class="card-subtitle mb-2 text-muted"><b>Data: <?php echo $row['data']?></b></h6>

                        </div>
                    </div>

                    <?php

                            }
                        } catch (PDOException $e) {
                            echo 'ERROR: ' . $e->getMessage();
                        }
                    ?>        
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    } else {
        header("location: ../index.php");
    }