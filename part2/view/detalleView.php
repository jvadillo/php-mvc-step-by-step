<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Ejemplo PHP+PDO+POO+MVC</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>
    </head>
    <body>
        <div class="col-lg-5 mr-auto">
            <form action="index.php?controller=empleados&action=actualizar" method="post">
                <h3>Detalle usuario</h3>
                <hr/>
                <input type="hidden" name="id" value="<?php echo $datos["empleado"]->id ?>"/>
                Nombre: <input type="text" name="nombre" value="<?php echo $datos["empleado"]->nombre ?>" class="form-control"/>
                Apellido: <input type="text" name="apellidos" value="<?php echo $datos['empleado']->apellidos ?>" class="form-control"/>
                Email: <input type="text" name="email" value="<?php echo $datos['empleado']->email ?>" class="form-control"/>
                Telefono: <input type="text" name="telefono" value="<?php echo$datos['empleado']->telefono ?>" class="form-control"/>
                <input type="submit" value="enviar" class="btn btn-success"/>
            </form>
            <a href="index.php" class="btn btn-info">Volver</a>
        </div>
        <footer class="col-lg-12">
            <hr/>
           Ejemplo PHP + PDO + POO + MVC - Jon Vadillo - <a href="http://jonvadillo.es">jonvadillo.es</a> - Copyright &copy; <?php echo  date("Y"); ?>
        </footer>
    </body>
</html>