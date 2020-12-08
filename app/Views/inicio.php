<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Crud</title>
</head>
<body background="<?php echo base_url();?>/fondo.jpg">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><?php echo session('nombre') ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url('/salir') ?>">Salir <span class="sr-only">(current)</span></a>
        </li>
        
      </ul>
      
    </div>
  </nav>
  <div class="container">
    <h1 style="color: white;">CRUD con Codeigniter</h1>
    <div class="row">
      <div class="col-sm-4" style="background-color: #FFFFFF">
        <form method="POST" action="<?php echo base_url().'/crear' ?>">
          <label for="concepto">Concepto de gasto:</label>
          <input type="text" name="concepto" id="concepto" class="form-control">
          <label for="monto">Monto de pago</label>
          <input type="text" name="monto" id="monto" class="form-control">
          <label for="fecha">Fecha</label>
          <input type="DATE" name="fecha" id="fecha" class="form-control">
          <br>
          <button class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
    <hr>
    <h2 style="color: white;">Listado de Gastos diarios</h2>

    <div class="row">
      <div class="col-sm-12">
        <div class="table table-responsive">
          <table class="table table-hover table-bordered">
            <tr>
              <th>Concepto de Gasto</th>
              <th>Monto de gasto</th>
              <th>Fecha</th>
            </tr>
            <?php foreach($datos as $key): ?>
              <tr>
                <td><?php echo $key->concepto ?></td>
                <td><?php echo $key->monto ?></td>
                <td><?php echo $key->fecha ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript">
    let mensaje = '<?php echo $mensaje ?>';

    if (mensaje =='1'){
      swal(':D','Agregado con exito','success');

    }else if(mensaje == '0'){
      swal(':(','Fallo al agregar','error');  
    }
  </script>
</body>
</html>