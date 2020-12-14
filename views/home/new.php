<?php
	include 'toolbar.php';

	//calular salida del sistema --s  
	$iniciotiempo=$session_user->get('ultima'); 
	$timefin = new DateTime();
	$interval = $iniciotiempo->diff($timefin);
	
	if($interval->format('%i')==3) {
	 $url="http://localhost/CRUD_USER_PHP/index.php?page=logout&id=2&folder=login";
	 header("Location: ".$url);
	}

?>
<form id="newform" action="./controllers/controller.php?folder=home" method="POST">
  <div class="row">
    <div class="col text-center">
      <i class="material-icons" style="font-size: 80px;">add</i>
    </div>
  </div>
  <div class="form-group">
  	 <label for="name">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" autofocus placeholder="ingrese nombre" required>
  </div>
  <div class="form-group">
  	 <label for="name">Clave</label>
    <input type="password" class="form-control" id="nuevopass" name="nuevopass" autofocus placeholder="Ingrese Clave" required>	
  </div>
  <div class="form-group">
  	 <label for="name">Confirmar Clave</label>
    <input type="password" class="form-control" id="confirmpass" name="confirmpass" autofocus placeholder="Confirme Clave" required>	
  </div> 
     
  <div class="form-group text-center">
  	<input type="submit" name="Crear" value="Crear" onclick="objUser.addUser()" class="btn btn-primary">
	<input type="hidden" class="form-control" id="create" name="create" value="1">	
  </div>


  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				El usuario ha sido creado.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al crear el usuario, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
</form>