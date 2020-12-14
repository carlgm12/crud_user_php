<?php

  $title="Ingrese su Usuario y Clave";

  
?>
<form action="./controllers/controller.php?folder=home" method="POST">
  <div class="row">
    <div class="col text-center">
        <strong>Ingrese Datos de Usuario</strong>
    </div>
  </div>
  <div class="form-group">
  	 <label for="name">Usuario</label>
    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa Usuario" autofocus required value="">
  </div>
  
  <div class="form-group">
  	 <label for="name">Clave</label>
    <input type="password" class="form-control" id="pass" name="pass" autofocus placeholder="Ingrese Clave" required>	
  </div>
   

  <div class="form-group text-center">
  	<input type="submit" name="enviar" value="enviar" class="btn btn-primary">
  </div>

  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				La informacion ha sido actualizada.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Error al ingresar una clave y usuario por favor intente de nuevo
			</div>
	<?php
  		}
  	?>
  </div>
  <input type="hidden" name="id" value="1">
</form>