<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('autentificar'))
{
    function autentificar()
    {
        $CI = & get_instance();

        $controlador = $CI->uri->segment(1);
        $accion = $CI->uri->segment(2);
        $parametro = $CI->uri->segment(3);

        $url = ($accion=='' ? $controlador : $controlador.'/'.$accion);

        if($parametro!='')
        {
            $url = $controlador.'/'.$accion.'/'.$parametro;
        }
        $libres = array(
            '/',
            'Login/muestralog',
            'Login/ingresar',
            'Login/logout',
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
            'Usuario/accesodenegado'
        );
        if(in_array($url, $libres))
        {
            echo $CI->output->get_output();
        }
        else
        {   /*
            if($CI->session->userdata('idPersona'))
            {
                echo $CI->output->get_output();
                if(autorizar($url))
                {
                    echo $CI->output->get_output();
                }
                else
                {
                    echo $CI->output->get_output();
                    redirect('Usuario/accesodenegado');
                }
            }
            else
            {
            	redirect('Login/muestralog');
            }*/
        }

    }
}
function autorizar($url)
{
    $CI = & get_instance();
    $CI->load->model('Model_Usuario');
    $listaRutasPermitidas = $CI->Model_Usuario->listaUrlAsignado($CI->session->userdata('idPersona'));
    $arrayPermitido = [];
    foreach ($listaRutasPermitidas as $key => $value)
    {
        $arrayPermitido[] = $value->url;
    }
    array_push($arrayPermitido, "Inicio");
    if(in_array($url, $arrayPermitido))
    {
        return true;
    }
    else
    {
        return false;
    }
}
