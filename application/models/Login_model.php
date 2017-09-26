<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	/*function login($usuario,$Password)
	{
		$resultados = $this->db->query("select usuario from USUARIO WHERE usuario='".$usuario."'  and contrasenia='".$Password."' ");
		if ($resultados->num_rows()>0) 
		{
			return $resultados->row();
		}
		else
		{
			return false;
		}
	}*/
	function login($usuario, $password) 
	{
        $this->db->select('*');  
        $this->db->from('USUARIO');
        $this->db->join('USUARIO_TIPO', 'USUARIO_TIPO.id_usuario_tipo=USUARIO.id_usuario_tipo', 'INNER');  
        $this->db->where('usuario', $usuario);
        $this->db->where('contrasenia', $password);
        $this->db->where('activo', 1);
        return $this->db->get();
    }
    function recuperarMenu($usuario) 
	{
        $query=$this->db->query("EXEC sp_recuperarMenuUsuario ".$usuario);
        $result=$query->result_array();
        return $result;
    
    }
    function Reporte_Login()
    {
    	$query = $this->db->query("select f.id_funcion,f.nombre_funcion, count (f.id_funcion) as cantidad_pip, 
		sum(py.costo_pi) as costo_total, sum(cast (py.num_beneficiarios as int)) as total_beneficiarios
		from proyecto_inversion py inner join grupo_funcional gf on py.id_grupo_funcional = gf.id_grup_funcional
		inner join division_funcional df on gf.id_div_funcional = df.id_div_funcional inner join funcion f on df.id_funcion =   f.id_funcion group by f.id_funcion,f.nombre_funcion");
		return $query->result();
    }

}