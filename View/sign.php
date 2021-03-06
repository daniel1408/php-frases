<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sing</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    </head>
    <body style="background-color:#F0EEEE">
        
        <form method="post" action="?go=cadastrar">
            <div class="container" style="width:30%; margin: 20px auto; background-color: white; padding: 10px; border-radius: 11px; box-shadow: 0px 7px 40px -1px rgba(0,0,0,0.75);">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-heading">
                            <div class="panel-title text-center">
                                <h3 class="title"><b>Criar Conta</b></h3>
                                <hr />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="FirstName" class="cols-sm-2 control-label">Nome</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="nome" id="nome"  placeholder="Digite seu nome"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Nascimento" class="cols-sm-2 control-label">Nascimento</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="date" class="form-control" name="nascimento" id="nascimento"  placeholder="Digite sua data de nascimento"/>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Username" class="cols-sm-2 control-label">Login</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="usuario" id="usuario"  placeholder="Digite seu nome de usuário"/>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Password" class="cols-sm-2 control-label">Senha</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="senha" id="senha"  placeholder="Digite sua senha"/>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="pwstrength_viewport_progress"></div>
                        <input class="btn  btn-info btn-block" type="submit" value="Cadastrar" id="btnCad">
                        <a href="../index.php" class="btn" style=" margin:6px auto; color:blue; position: relative; float: right"> Voltar</a>
                    </div>
                </div>
            </div>  
        </form>
    </body>
</html>

<?php
if(@$_GET['go'] == 'cadastrar'){
	$nome = $_POST['nome'];
	$nascimento = $_POST['nascimento'];
	$user = $_POST['usuario'];
	$pwd = $_POST['senha'];

	if(empty($nome)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($nascimento)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($user)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}elseif(empty($pwd)){
		echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
	}else{
            
            spl_autoload_register(function ($class_name) {
                include '../Model/' . $class_name . '.php';
            });
                
            try {
                $stmt = AutorDao::selectForUserName($user);
                $row = $stmt->fetch();
                
                if($row['login'] != null){
                    echo "<script>alert('Usuário já existe.');history.back();</script>"; 
                }else{
                    $autor = new Autor();
                    $autor->setNome($nome);
                    $autor->setNascimento($nascimento);
                    $autor->setLogin($user);
                    $autor->setSenha($pwd);
                    
                    AutorDao::insert($autor);
                    echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
                    echo "<meta http-equiv='refresh' content='0, ../'>";
                }
            } catch (PDOException $e) {
                die("Erro:".mysqli_error($stmt));
                echo 'ERROR: ' . $e->getMessage();        
            }
	}
    }

    