<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('autentificar')) 
{

	function autentificar() 
	{
		$CI = & get_instance();

		$controlador = $CI->uri->segment(1);
		$accion = $CI->uri->segment(2);

		$url = $controlador.'/'.$accion;
		$libres = array(
			'/',
			'Login/muestralog',
			'Login/ingresar',			
		);

		if(in_array($url, $libres)) 
		{
			echo $CI->output->get_output();
		}
		else
		{
			if($CI->session->userdata('nombreUsuario'))
			{
				echo $CI->output->get_output();
				
			}
			else 
			{
				redirect('Login/muestralog');
			}
			
		}

	}

}
