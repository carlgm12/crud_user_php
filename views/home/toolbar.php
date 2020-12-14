<?php 
$nivelusuario=$session_user->get('nivel_user');


?>
<div class="row toolbar">
	<div class="col-2">
		<!--<a href="./index.php?page=users&folder=home" title="Usuarios">
			<i class="material-icons btn_toolbar">view_list </i>
		</a>-->
		
		<a href="./index.php?page=users&folder=home"  id="mylink" onclick='objUser.refrescartabla();'  title="Usuarios">
			<i class="material-icons btn_toolbar">view_list </i>
		</a>		
	</div>
	<div class="col-2">
	<?php if($nivelusuario==1) { ?>
		<a href="./index.php?page=new&folder=home" title="Nuevo">
			<i class="material-icons btn_toolbar">add</i>
		</a>
	<?php } ?>	
	</div>	
</div>