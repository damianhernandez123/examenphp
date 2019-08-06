<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>inicio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">

    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">detalles de empleado</h2>
						<div class="col-md-12">
                        <a href="create.php" class="btn btn-success pull-right">Agregar un nuevo empleado</a>
                    </div>
					</div>
                    <?php
                    require_once "config.php";
                    
                    $sql = "SELECT * FROM empleados";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nombre</th>";
                                        echo "<th>Direccion</th>";
                                        echo "<th>Salario</th>";
                                        echo "<th>Seleccion</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['Id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['Adress'] . "</td>";
                                        echo "<td>" . $row['Salary'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['Id'] ."' title='Refrescar ' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['Id'] ."' title='Actualizar ' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['Id'] ."' title='Eliminar ' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";

                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>no se ha formulado.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>