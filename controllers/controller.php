<?php
	include dirname(__file__,2).'/models/users.php';
	include dirname(__file__,2).'/libs/Session_util.php';
	

	$users=new Users();
	$session_user=new Session_util();	
	
	//var_dump($_POST); 	
	//Request: creacion de nuevo usuario
	if(isset($_POST['create']))
	{
		

		if($users->newUser($_POST)){
		
			$nuevo=$_POST['nuevopass'];
			$confirm=$_POST['confirmpass'];

			if($nuevo==$confirm) {
					header("location: ../index.php?page=new&id=".$_POST['id_usuario']."&success=true&folder=home");
			} else {
				header('location: ../index.php?page=new&error=true&folder='.$_GET['folder']);	
			}
		}else{
			header('location: ../index.php?page=new&error=true&folder='.$_GET['folder']);
		}
	}


	//Request: editar usuario
	if(isset($_POST['edit']))
	{
		//var_dump($_POST);
		if($users->setEditUser($_POST)){
			$datosid=$users->getUserById($_POST['id_usuario']);
			
			$nuevo=$_POST['nuevopass'];
			$confirm=$_POST['confirmpass'];

			if($nuevo==$confirm) {
					header("location: ../index.php?page=edit&name=".$datosid[0]['nombre']."&id=".$_POST['id_usuario']."&success=true&folder=home");
			} else {
				header("location: ../index.php?page=edit&name=".$datosid[0]['nombre']."&id=".$_POST['id_usuario']."&error=true&folder=home");	
			}	
		} else {
			header('location: ../index.php?page=edit&error=true&folder='.$_GET['folder']);
		}
	}

	//Request: listar ID usuario
	if(isset($_GET['listID']))
	{		
		if($users->getUserById($_GET['listID'])) {
			$datosid=$users->getUserById($_GET['listID']);

			
			header("location: ../index.php?page=edit&name=".$datosid[0]['nombre']."&id=".$datosid[0]['idusuario']."&folder=home");
		} else {
			header('location: ../index.php?page=login&id=1&error=true&folder=login');
		}	
		//print_r($usersID);
	}


	//Request: borrar usuario
	if(isset($_GET['delete']))
	{
		if($users->deleteUser($_GET['id'])) {
			
						
			echo json_encode(["success"=>true]);
		}else{
			echo json_encode(["error"=>true]);
		}
	}

	//Request: listar tabla
	if(isset($_GET['listuser']))
	{
		$query["data"] = $users->getUsers();


			if($users) {
				 
				echo json_encode($query);
				
																		
				
			}else {
				header('location: ../index.php?page=login&id=1&error=true&folder=login');
			}
	}
	

	//Request: Validar usuario
	if(isset($_POST['enviar']))
	{		
		if($users->setValidarUser($_POST)) {	
			
			$datos_usuario=$users->setValidarUser($_POST);
						
			// listado usuarios
			$users =$users->getUsers();

			// iniciar session Key
 			$session_user->init();
			$session_user->add('user_id',$datos_usuario[0]['idusuario']);
			$session_user->add('nombre_id',$datos_usuario[0]['nombre']);
			$session_user->add('nivel_user',$datos_usuario[0]['nivel']);
			$session_user->add('Fecha_user',$datos_usuario[0]['Fecha']);
			$session_user->add('list_user',$users);

			$iduser=$datos_usuario[0]['idusuario'];
			
			// registrar log usuarios
			$users=new Users();

			if($users->newUserlog($iduser)) {			
			
				if(empty($session_user->get('user_id'))){
					header('location: ../index.php?page=login&id=1&error=true&folder=login');
				} else {
					
					$iniciotime = new DateTime();

					$session_user->add('ultima',$iniciotime);
					

					header('location: ../index.php?page=users&id=1&success=true&folder=home');
						
				}

		    } else {
				header('location: ../index.php?page=login&id=1&error=true&folder=login');	
			}
		} else {
			header('location: ../index.php?page=login&id=1&error=true&folder=login');
		}
	}
	
?>