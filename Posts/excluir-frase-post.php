<?php header("Content-Type: text/html; charset=ISO-8859-1",true);?>

<?php
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['user'])){
        $id = filter_input(INPUT_GET, "id");
        
        spl_autoload_register(function ($class_name) {
            include '../Model/' . $class_name . '.php';
        });
        
        try {
            $stmt = FraseDao::delete($id);
            header("Location: ../View/list-frases.php");

        } catch (PDOException $e) {
            die("Erro:".mysqli_error($stmt));
            echo 'ERROR: ' . $e->getMessage();        
        }

} else {
    header("location: ../index.php");
}