<?php
     

	$nivelusuario=$session_user->get('nivel_user');
	$users=$session_user->get('list_user');
		
	//calular salida del sistema --s  
	$iniciotiempo=$session_user->get('ultima'); 
	$timefin = new DateTime();
	$interval = $iniciotiempo->diff($timefin);
	
	if($interval->format('%i')==3) {
	 $url="http://localhost/CRUD_USER_PHP/index.php?page=logout&id=2&folder=login";
	 header("Location: ".$url);
	}

	$title="Listado de Usuarios";

	include 'toolbar.php';
?>
<div class="row">
	<div class="col text-center">
		<i class="material-icons" style="font-size: 80px;">people</i>
	</div>
</div>
<div class="row">
	<div class="col">
		<form action="./index.php" method="post" accept-charset="utf-8" class="form-inline">
			<div class="form-group mx-sm-3 mb-2">
    			<!--<input type="text" class="form-control" name="dataSearch" autofocus required placeholder="Buscador" value="<?= $dataSearch;  ?>">-->
  			</div>
  			<!--<button type="submit" name="btnSearch" class="btn btn-primary mb-2">Buscar</button>-->
		</form>
	</div>
</div>
<div class="table-responsive">
		<table id="myTable" class="table table-striped table-bordered table-hover table-sm">
			<thead class="thead-dark">
				<th>Id</th>
				<th class="text-center">Nombres</th>
			<?php if($nivelusuario==1) { ?>					
				<th class="text-center">Acciones</th>
			<?php } ?>	
			</thead>
			<tbody id="ttuser">
			
			<?php


			if(count($users)>0){

			foreach ($users as $column =>$value) {
			?>


			<tr id="row<?= $value['idusuario']; ?>">
				<td><?= $value['idusuario']; ?></td>
				<td><?= $value['nombre'].' '?></td>
				<td class="text-center">
				<?php if($nivelusuario==1) { ?>
					<a href="./controllers/controller.php?listID=<?= $value['idusuario'].' ' ?>" title="Editar usuario: <?= $value['nombre'].' '?>">
						<i class="material-icons btn_edit">edit</i>
					</a>
					
					<a href="#" onclick="objUser.deleteUser(<?= $value['idusuario'] ?>)" id="btnDeleteUser" title="Borrar usuario: <?= $value['nombre'].' ' ?>">
						<i class="material-icons btn_delete">delete_forever</i>
					</a>
				<?php } ?>	
				</td>								
			</tr>
				<?php
				}
				}else{
				?>
			<tr>
				<td colspan="5">
					<div class="alert alert-info">
					No se encontraron usuarios.
					</div>
				</td>
			</tr>
			<?php
			}
			?>
			</tbody>
		</table>
</div>

	<div class="row">
		<div class="col">
			<div class="alert alert-success" id="msgSuccess" style="display: none;"></div>
			<div class="alert alert-danger" id="msgDanger" style="display: none;"></div>
		</div>
	</div>
<script type='text/javascript'> 
//$(document).ready(function(){
/*	
$(document).ready(function(){

	var tt='';

	$('#ttuser').html(tt);
	
	function refrescartabla() {
		$('#ttuser').html(tt);

		$.ajax({
				url: './controllers/controller.php?listuser=true',
				type: 'POST',
				
					success: function(data) {
						alert(data);
						
						var Objson =trim(data);
						
						var myJSON = JSON.stringify(Objson);
						var codes = jQuery.parseJSON(Objson);
						
						var tt='';
							
						for (var i=0; i<codes.data.length; i++) {
							tt+='<tr id='+codes.data[i].idusuario+'>';
							tt+='<td>'+codes.data[i].idusuario+'</td>';
							tt+='<td>'+codes.data[i].nombre+'</td>';
							tt+="<td><a href='./controllers/controller.php?listID="+codes.data[i].idusuario+" title='Editar usuario:"+codes.data[i].nombre+"'><i class='material-icons btn_edit'>edit</i></a>";
							tt+="<a href='#' onclick='objUser.deleteUser("+codes.data[i].idusuario+")' id='btnDeleteUser' title='Borrar usuario: "+codes.data[i].nombre+"'><i class='material-icons btn_delete'>delete_forever</i></a></td>";	
							tt+='</tr>';
							//alert();
						}	
								
						$('#ttuser').html(tt);						            
					}
		}); //fin ajax
	}
 
});*/

/*
function refrescartabla() {
	$.ajax({
				url: './controllers/controller.php?listuser=true',
				type: 'POST',
				
					success: function(data) {
						alert(data);
						$('#ttuser').html('');

						var Objson =trim(data);
						
						var myJSON = JSON.stringify(Objson);
						var codes = jQuery.parseJSON(Objson);
						
						var tt='';
							
						for (var i=0; i<codes.data.length; i++) {
							tt+='<tr id='+codes.data[i].idusuario+'>';
							tt+='<td>'+codes.data[i].idusuario+'</td>';
							tt+='<td>'+codes.data[i].nombre+'</td>';
							tt+="<td><a href='./controllers/controller.php?listID="+codes.data[i].idusuario+" title='Editar usuario:"+codes.data[i].nombre+"'><i class='material-icons btn_edit'>edit</i></a>";
							tt+="<a href='#' onclick='objUser.deleteUser("+codes.data[i].idusuario+")' id='btnDeleteUser' title='Borrar usuario: "+codes.data[i].nombre+"'><i class='material-icons btn_delete'>delete_forever</i></a></td>";	
							tt+='</tr>';
							//alert();
						}	
						
						$('#ttuser').replaceWith($('#ttuser',tt));
						//$('#ttuser').html(tt);						            
					}
		}); //fin ajax
}

function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}
*/

</script> 