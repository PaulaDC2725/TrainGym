<?php
	
	class Conexion{
		public function getConection(){
			$user="root";
			$pass="";
			$host="localhost";
			$db="gimnasiobd";

			$conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
			return $conexion;
		}

	}

?>