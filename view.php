<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="styles.css" rel="stylesheet" type="text/css"/>
    <title>Vista</title>
    <style>
</style>
</head>
<body>

        <div class="logistics">
        <div class="main-menu">
          <div style="width: 75vw;">

            <div>
            <h3 class="my-3">Listado de Máquinas</h3>
                <div class="tabla-upper" style="overflow-x: scroll;">
                  <table class="table tabla">
                      <thead>
                          <tr>
                              <th></th>
                              <th>Máquina</th>
                              <th>Hora encendido</th>
                              <th>Hora apagado</th>
                              <th>Ubicación</th>
                              <th>Disponibilidad</th>
                          </tr>
                      </thead>

                      <tbody>
                          <?php include './mostrarView.php'?>
                      </tbody>
                  </table>
                </div>
                
            </div>

            
          </div> 
        </div>
      </div>
      <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
</body>
</html>
