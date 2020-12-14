class Users{
    constructor(){}

    deleteUser(id){
		if(confirm("Esta seguro de eliminar el usuario?")){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response   = JSON.parse(this.responseText);
				var msgSuccess = document.getElementById('msgSuccess');
				var msgDanger   = document.getElementById('msgDanger');
				if(response.success){
					// alert("El usuario ha sido borrado de la base de datos.");
					msgSuccess.style.display = 'inherit';
					msgSuccess.innerHTML     = 'El usuario ha sido borrado de la base de datos.';
					msgDanger.style.display  = 'none';

					//Elimina el registro de la tabla
					var row    = document.getElementById('row'+id);
					var parent = row.parentElement;
        			parent.removeChild(row);


					// location.reload(true);
				}else if(response.error){
					// alert("No se ha podido eliminar el registro");
					msgDanger.style.display  = 'inherit';
					msgDanger.innerHTML      = 'No se ha podido eliminar el registro';
					msgSuccess.style.display = 'none';
				}
			}
			};
			xhttp.open("GET", "./controllers/controller.php?delete=true&id="+id, true);
			xhttp.send();
		}
	} //fin delete user

	refrescartabla() {
		//alert();
		$.ajax({
					url: './controllers/controller.php?listuser=true',
					type: 'POST',
					
						success: function(data) {
							//alert(data);
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
														
							$('#ttuser').html(tt);

							//window.location.href = './index.php?page=users&folder=home';						            
						}
			}); //fin ajax
	}

	trim(stringToTrim) {
		return stringToTrim.replace(/^\s+|\s+$/g,"");
	}
	
}