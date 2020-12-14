<?php

 $users_name=$_GET['name'];
 $users_id=$_GET['id'];

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
<form id="editform" action="./controllers/controller.php?folder=home" method="POST">
  <div class="row">
    <div class="col text-center">
      <i class="material-icons" style="font-size: 80px;">edit</i>
    </div>
  </div>
  <div class="form-group">
  	 <label for="name">Nombres</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Tus nombres" autofocus required value="<?php echo $users_name; ?>">
  </div>
  
  <div class="form-group">
  	 <label for="name">Nueva Clave</label>
    <input type="password" class="form-control" id="nuevopass" name="nuevopass" autofocus placeholder="Ingrese Clave" required>	
  </div>
  <div class="form-group">
  	 <label for="name">Confirmar Clave</label>
    <input type="password" class="form-control" id="confirmpass" name="confirmpass" autofocus placeholder="Confirme Clave" required>	
  </div> 

  <div class="form-group text-center">
  	<input type="submit" name="edit" value="Editar" onclick="objUser.editUser()" class="btn btn-primary">
    
    <input type="hidden" name="id_usuario" value="<?php echo $users_id; ?>" class="btn btn-primary">
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
				Ha ocurrido un error al editar la información, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
</form>