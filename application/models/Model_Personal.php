<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_Personal extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }

    //division funcional

    public function GetPersonal($flat, $id_oficina, $nombres, $apellido_p, $apellido_m, $dni, $direccion, $telefonos, $correo, $grado_academico, $especialidad, $fecha_nac)
    {
        $personal = $this->db->query("execute sp_GestionarPersona'" . $flat . "'"); //listar de division funcional
        if ($personal->num_rows() > 0) {
            return $personal->result();
        } else {
            return null;
        }

    }
    public function AddPersonal($flat, $id_oficina, $nombres, $apellido_p, $apellido_m, $dni, $direccion, $telefonos, $correo, $grado_academico, $especialidad, $fecha_nac)
    {
        $personal = $this->db->query("execute sp_GestionarPersona'" . $flat . "','" . $id_oficina . "','" . $nombres . "','" . $apellido_p . "','" . $apellido_m . "','" . $dni . "','" . $direccion . "','" . $telefonos . "','" . $correo . "','" . $grado_academico . "','" . $especialidad . "','" . $fecha_nac . "'"); //listar de division funcional
        if ($personal->num_rows() > 0) {
            return $personal->result();
        } else {
            return null;
        }

    }
    public function UpdatePersonal($flat, $id_oficina, $nombres, $apellido_p, $apellido_m, $dni, $direccion, $telefonos, $correo, $grado_academico, $especialidad, $fecha_nac)
    {
        $this->db->query("execute sp_GestionarPersona'" . $flat . "','" . $id_oficina . "','" . $nombres . "','" . $apellido_p . "','" . $apellido_m . "','" . $dni . "','" . $direccion . "','" . $telefonos . "','" . $correo . "','" . $grado_academico . "','" . $especialidad . "','" . $fecha_nac . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function BuscarPersona($text_buscarPersona){
       $personal = $this->db->query("execute sp_BuscarPersona'".$text_buscarPersona."' "); //listar de division funcional
       if ($personal->num_rows() > 0) {
            return $personal->result();
        } else {
            return null;
        }
    }

}
