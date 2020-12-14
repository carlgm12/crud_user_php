<?php
	include dirname(__file__,2)."/config/Conexion.php";

	

	/**
	* clase utilitaria modelo para usuarios 
	*/
	class Users
	{
		private $conn;
		private $link;

		function __construct()
		{
			$this->conn   = new Conexion();
			$this->link   = $this->conn->conectarse();
			
		}

		//Trae todos los usuarios registrados
		public function getUsers()
		{
			$query  ="SELECT * FROM usuarios";
			$result =mysqli_query($this->link,$query);
			$data   =array();
			while ($data[]=mysqli_fetch_assoc($result));
				array_pop($data);
			return $data;
		}

		//Crea un nuevo usuario
		public function newUser($data) {
			
			$query  ="INSERT INTO usuarios (nombre, clave, activo) VALUES ('".$data['nombre']."','".$data['nuevopass']."',2)";
			
			$result =mysqli_query($this->link,$query);
			if(mysqli_affected_rows($this->link)>0){
				return true;
			}else{
				return false;
			}
		}

		//Crea un nuevo log
		public function newUserlog($id) {
			
			$query  ="INSERT INTO usuarios_log (fk_id_usuario,Fecha) VALUES (".$id.",NOW())";
			
			$result =mysqli_query($this->link,$query);
			if(mysqli_affected_rows($this->link)>0){
				return true;
			}else{
				return false;
			}
		}

		//Obtiene el usuario por id
		public function getUserById($id=NULL){

			if(!empty($_GET['id'])) {
				$query  ="SELECT * FROM usuarios WHERE idusuario=".$_GET['id'];	
			} else {	
				$query  ="SELECT * FROM usuarios WHERE idusuario=".$id;
				//echo $query;exit();
				
				$result =mysqli_query($this->link,$query);
				
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
					array_pop($data);
					
				return $data;
		   }			
		}

		//Validar Ingreso Usuario
		public function getUserValidar($id=NULL){
			if(!empty($id)){
				$query  ="SELECT * FROM usuarios WHERE idusuario=".$id;
				$result =mysqli_query($this->link,$query);
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
					array_pop($data);
					
				return $data;
			}else{
				return false;
			}
		}

		//Obtiene el usuario por id
		public function setEditUser($data){
			//var_dump($data);exit();
			if(!empty($data['id_usuario'])){
				$query  ="UPDATE usuarios SET nombre='".$data['name']."',clave='".$data['nuevopass']."' WHERE idusuario=".$data['id_usuario'];
				//echo $query;exit();
				$result =mysqli_query($this->link,$query);
				if($result){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}



		//Borra el usuario por id
		public function deleteUser($id=NULL){
			if(!empty($id)){
				$query  ="DELETE FROM usuarios WHERE idusuario=".$id;
				$result =mysqli_query($this->link,$query);
				if(mysqli_affected_rows($this->link)>0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		//Filtro de busqueda
		public function getUsersBySearch($data=NULL){
			if(!empty($data)){
				$query  ="SELECT * FROM users WHERE name LIKE'%".$data."%' OR last_name LIKE'%".$data."%' OR email LIKE'%".$data."%'";
				$result =mysqli_query($this->link,$query);
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
				array_pop($data);
				return $data;
			}else{
				return false;
			}
		}


		//Obtiene el usuario Validado
		public function setValidarUser($Usuario=NULL){
			

			if(!empty($Usuario)){
				
				$usuario_l=$Usuario["usuario"];
				$pass_l=$Usuario["pass"];

				$query  ="SELECT us.idusuario,us.nombre,us.clave,us.activo,ni.nivel,max(lg.Fecha) as Fecha FROM usuarios us inner join usuarios_nivel ni on us.idusuario = ni.idusuarionivel inner join usuarios_log lg on lg.fk_id_usuario = us.idusuario WHERE nombre like '%".$usuario_l."%' and clave = '".$pass_l."'";
				//echo $query;exit();

				$result =mysqli_query($this->link,$query);				
				$data   =array();
				$data[]=mysqli_fetch_assoc($result);
				
				
				if(!empty($data))
				{

					return $data;
				} else {
					return false;
				}

			} 
		}
	} // fin funcion principal
