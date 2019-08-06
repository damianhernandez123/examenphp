<?php

if(isset($_POST["Id"]) && !empty($_POST["Id"])){

    require_once "config.php";
    

    $sql = "DELETE FROM empleados WHERE Id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){

        mysqli_stmt_bind_param($stmt, "i", $param_id);
        

        $param_id = trim($_POST["Id"]);
        

        if(mysqli_stmt_execute($stmt)){

            header("location: index.php");
            exit();
        } else{
            echo "algo paso, vuelvelo a intentarlo.";
        }
    }
             mysqli_stmt_close($stmt);

    

    mysqli_close($link);
} else{

    if(empty(trim($_GET["Id"]))){

        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eliminar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Eliminar empleado</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["Id"]); ?>"/>
                            <br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="index.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>