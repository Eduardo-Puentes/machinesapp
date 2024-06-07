<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <title>Login</title>
    <style>
@media (width <= 780px) {
    .tabla-upper {
      width: 67.5% !important;
    }
  }

</style>
</head>
<body>
    <div class="logistics">


            <div style="display: flex; justify-content: center; align-items: center; width: 100vw; height: 100vh;">
            <div class="tabla-upper" style="background-color: white; width: 25vw; padding: 30px;border-radius: 14px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                <h2 style="text-align:center;">Inicia Sesión</h2>
                <form action="login_back.php" method="post">
                <div style="margin-top: 20px; margin-bottom: 20px;">
                <span>Usuario</span>
                <input class="form-control" type="text" id="user" name="user" required>
                </div>
                <div style="margin-top: 20px; margin-bottom: 20px;">
                <span>Contrseña</span>
                <input class="form-control" type="password" id="password" name="password" required>
                </div>
                <button class="btn" type="submit" style="width: 80%; margin-left: 10%; background-color: #4880FF; color: white;">Entrar</button>
            </form>
            </div>
</div>


        </div>
      </div>
      <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
</body>
</html>
