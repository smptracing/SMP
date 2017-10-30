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
			'AplicativoMovil/listadoProyectoGrupoFuncional',
			'AplicativoMovil/listadoProyectoDivisionFuncional',
			'AplicativoMovil/listadoProyectoFuncion',
			'AplicativoMovil/listadoNoPipPorTipoNoPip',
			'AplicativoMovil/index',
			'AplicativoMovil/listaTotalDeUbicacionesProyecto',
			'AplicativoMovil/DatosGeneralesdelPip',
			'AplicativoMovil/GraficarPip',
			'AplicativoMovil/',
			'AplicativoMovil/Pips',				
		);
		if(in_array($url, $libres)) 
		{
			echo $CI->output->get_output();
		}
		else
		{

			$menu=[];
			foreach ($CI->session->userdata('menu') as $item) {
				array_push($menu,$item['urlSubmenu']);
			}
			$menuUsuario=[];
			foreach ($CI->session->userdata('menuUsuario') as $item) {
				array_push($menuUsuario,$item['urlSubmenu']);
			}
			if($CI->session->userdata('nombreUsuario')){
				if(in_array($url,$menu)){
					if(in_array($url,$menuUsuario)){
						echo $CI->output->get_output();
					}	
					else{
						redirect('Login/muestralog');		
					}
				}
				else{
					echo $CI->output->get_output();
				}
			}
			/*
			if($CI->session->userdata('nombreUsuario')){
				echo $CI->output->get_output();	
			}*/
			else {
				redirect('Login/muestralog');
			}
			
		}

	}

}
