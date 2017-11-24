<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
    </head>
    <body style="background-color:#F0EEEE">
        
       	<form method="post" action="?go=logar">
            <div class="container" style="width:30%; margin: 20px auto; background-color: white; padding: 10px; border-radius: 11px; box-shadow: 0px 7px 40px -1px rgba(0,0,0,0.75);">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="panel-heading">
                            <div class="panel-title text-center">
                                
                                <h3 class="title"><b>Entrar</b></h3>
                                <img src="http://www.jacarebanguela.com.br/wp-content/uploads/2012/05/seumadruga-25-05-2.jpg" style="width:100%">
                                <hr />
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Login</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="usuario" id="usuario"  placeholder="Digite o nome de usuário"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="senha" class="cols-sm-2 control-label">Senha</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="senha" id="senha"  placeholder="Digite sua senha"/>
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Entrar" class="btn  btn-info btn-block" id="entrar">
                        <a href="./View/sing-view.php" class="btn" style=" margin:6px auto; color:blue; position: relative; float: right"> Criar Conta</a>
                    </div>
                </div>
            </div>
        </form>
        
    </body>
</html>
    
<?php
if(@$_GET['go'] == 'logar'){
	$user = $_POST['usuario'];
	$pwd = $_POST['senha'];

	if(empty($user)){
		echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
	}elseif(empty($pwd)){
		echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
	}else{
                try {
                    $conn = new PDO('mysql:host=127.0.0.1;dbname=frases', "daniel", "Furiosa");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stmt = $conn->prepare("SELECT * FROM autor WHERE login = '$user' and senha = '$pwd'");
                    $stmt->execute();

                    $row = $stmt->fetch();
                    if($row['login'] != null){
                        session_start();
                        $_SESSION['user'] = $user;
                        $_SESSION['pwd'] = $pwd;
                        echo "<script>alert('Usuário logado com sucesso.');</script>";
                        echo "<meta http-equiv='refresh' content='0, ./View/home.php'>";
                        #header("location: View/home.php");
                    }else{
                        echo  "<script>alert('Usuário e senha não correspondem.');</script>";
                        echo "<meta http-equiv='refresh' content='0, ./index.php'>";
                        #header("location: index.php");
                    }
                } catch (PDOException $e) {
                    echo 'ERROR: ' . $e->getMessage();
                }
	}
}
