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
        <form action="index.php?controller=empleados&action=alta" method="post" class="col-lg-5">
            <h3>Añadir usuario</h3>
            <hr/>
            Nombre: <input type="text" name="nombre" class="form-control"/>
            Apellido: <input type="text" name="apellidos" class="form-control"/>
            Email: <input type="text" name="email" class="form-control"/>
            Telefono: <input type="text" name="telefono" class="form-control"/>
            <input type="submit" value="enviar" class="btn btn-success"/>
        </form>
        
        <div class="col-lg-7">
            <h3>Usuarios</h3>
            <hr/>
        </div>
        <section class="col-lg-7 usuario" style="height:400px;overflow-y:scroll;">
            <?php foreach($empleados as $empleado) {?>
                <?php echo $empleado["id"]; ?> -
                <?php echo $empleado["nombre"]; ?> -
                <?php echo $empleado["email"]; ?> -
                <?php echo $empleado["telefono"]; ?>
                <hr/>
            <?php } ?>
        </section>
		
        <footer class="col-lg-12">
            <hr/>
           Ejemplo PHP + PDO + POO + MVC - Jon Vadillo - <a href="http://jonvadillo.es">jonvadillo.es</a> - Copyright &copy; <?php echo  date("Y"); ?>
        </footer>
    </body>
</html>