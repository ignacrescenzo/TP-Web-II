<?php

	class BaseDeDatos extends Model{
		static function  conectarBD(){
			$server="localhost";
			$usuario="root";
			//$clave="";
			$clave="ale37376896";
			$baseDeDatos="tpWeb2Db";

			$conexion=mysqli_connect($server, $usuario, $clave, $baseDeDatos) or die("Error al conectar a la base de datos");

			if ($conexion) {
				//echo "conexion exitosa";
			}

			return $conexion;
		}
		
		
	}