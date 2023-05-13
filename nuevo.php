<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>

<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <h4>Nuevos registro</h4>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="row g-3" method="POST" action="guarda.php" autocomplete="off">

                        <div class="col-md-4">
                            <label for="names" class="form-label">Nombres</label>
                            <input type="text" id="names" name="names" class="form-control" required autofocus>
                        </div>

                        <div class="col-md-8">
                            <label for="addres" class="form-label">Direccion</label>
                            <input type="text" id="addres" name="addres" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label for="sex" class="form-label">Sexo</label>
                            <input type="text" id="sex" name="sex" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label for="age" class="form-label">Edad</label>
                            <input type="number" id="age" name="age" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label for="age" class="form-label">Password</label>
                            <input type="text" id="password" name="password" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <a class="btn btn-secondary" href="adminpage.php">Regresar</a>
                            <button type="submit" class="btn btn-primary" name="registro">Guardar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html>