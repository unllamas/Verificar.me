<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movil extends Base_Controller {

	public function __construct(){
		parent::__construct();

		//Carga de Modelo
		$this->load->model('modulo_usuario/usuario_model');


	}

	public function login()
	{
  		$login_correo = $this->input->post('f_login_correo');
		$login_password = $this->input->post('f_login_password');
		// $login_password = md5($login_password);
		
		$validacion = $this->usuario_model->login($login_correo, $login_password);

		if($validacion){
			$usuario = array(
				'conectado' => 1, 
				'usuario_id' => $validacion->id, 
				'usuario_validado' => $validacion->validado, 
				'usuario_nombre' => $validacion->nombre, 
				'usuario_apellido' => $validacion->apellido, 
				'usuario_nombre_completo' => $validacion->apellido.' '.$validacion->nombre, 
				'usuario_correo' => $validacion->correo
			);
		}else{
			$usuario = array();
		}
    		return $usuario;
	}

	public function obtenerLocalesUsuario(){
		//Obtener id usuario y obtener los locales a los que 
		//pertenece en la por la tabla "persona-locales" luego devolver un array con los locales
		
		$idUsuario = $this->input->get('idUsuario');
		

	}
	
	public function insertarHora(){
		//Obtiene el id usuario y la hora de entrada o salida diferenciada por una letra al principio del texto (E o S)
		// y la inserta en la bd del usuario
		
		$idUsuario = $this->input->get('idUsuario');
		$hora = $this->input->get('hora');
	}
  
}