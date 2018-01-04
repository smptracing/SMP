<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Personal extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //division funcional
    public function GetPersonal($flat, $skip, $numberRow, $valueSearch)
    {
        $personal=$this->db->query("execute sp_GestionarPersona '" . $flat . "', null, null, null, null, null, null, null, null, null, null, null, null, ".$skip.",".$numberRow.", '".$valueSearch."'");//listar de division funcional

        return $personal->result();
    }

    public function CountPersonalParaPaginacion($flat, $valueSearch)
    {
        $personal=$this->db->query("execute sp_GestionarPersona '" . $flat . "', null, null, null, null, null, null, null, null, null, null, null,null, 0, 0, '".$valueSearch."'");//listar de division funcional

        return $personal->result();
    }

    public function addPersona($data)
    {
        $this->db->insert('PERSONA',$data);
        return $this->db->affected_rows();
    }
    public function UpdatePersonal($data,$id_persona)
    {
        $this->db->set($data);
        $this->db->where('id_persona', $id_persona);
        $this->db->update('PERSONA');
        return $this->db->affected_rows();
    }
    public function EliminarPersonal($id_persona)
    {
          $this->db->where('id_persona',$id_persona);
          $this->db->delete('PERSONA');
          if($this->db->affected_rows()>0){
          return true;
          }
          else{
            return false;
          }
    }
    public function BuscarPersonaCargo($text_buscarPersona, $skip, $numberRow, $valueSearch)
    {
       $personalFormulador = $this->db->query("execute sp_PesonaCargo_r '".$text_buscarPersona."', ".$skip.", ".$numberRow.", '".$valueSearch."'"); //listar de division funcional

       return $personalFormulador->result();
    }
    public function CountPaginacionPersonaCargo($text_buscarPersona,$skip,$numberRow,$valueSearch)
    {
       $personalFormulador = $this->db->query("select count(*) as cantidad from PERSONA inner join ASIGNACION_PERSONA ON ASIGNACION_PERSONA.id_persona=PERSONA.id_persona INNER JOIN CARGO ON CARGO.id_cargo=ASIGNACION_PERSONA.id_cargo WHERE desc_cargo='".$text_buscarPersona."' and (nombres like '%'+'".$valueSearch."'+'%') "); //listar de division funcional
      return $personalFormulador->result();
    }
    public function CountPaginacionPersonaActividad($skip,$numberRow,$valueSearch)
    {
       $personalFormulador = $this->db->query("select count(*) as cantidad from PERSONA WHERE  (nombres like '%'+'".$valueSearch."'+'%') "); //listar de division funcional
      return $personalFormulador->result();
    }

    public function BuscarPersonaActividad($skip,$numberRow,$valueSearch){
       $persona = $this->db->query("execute sp_PersonaActividad_r '".$skip."','".$numberRow."','".$valueSearch."' "); //listar de division funcional
            return $persona->result();
    }

    public function BuscarPersona($text_buscarPersona)
    {
       $personal = $this->db->query("execute sp_BuscarPersona '".$text_buscarPersona."' "); //listar de division funcional
       if ($personal->num_rows() > 0) {
            return $personal->result();
        } else {
            return null;
        }
    }
    public function listarPersona()
    {
       $personal = $this->db->query("select id_persona,CONCAT(nombres,' ', apellido_p,' ',apellido_m)as nombreCompleto from PERSONA");

        return $personal->result();

    }

    public function verTodo()
    {
        $personal = $this->db->query("select * from PERSONA");

        return $personal->result();
    }

    public function ResponsableExpedieteElaboracion($id_ExpedienteTecnico)
    {
       $responsable = $this->db->query(" select * from ET_RESPONSABLE INNER JOIN PERSONA ON ET_RESPONSABLE.id_persona=PERSONA.id_persona INNER JOIN ET_TIPO_RESPONSABLE on ET_RESPONSABLE.id_tipo_responsable_et=ET_TIPO_RESPONSABLE.id_tipo_responsable_et where id_et='".$id_ExpedienteTecnico."' and codigo_tipo_responsable_et='001' ");

      return $responsable->result()[0];

    }
     public function ResponsableExpedieteEjecucion($id_ExpedienteTecnico)
    {
       $responsable = $this->db->query(" select * from ET_RESPONSABLE INNER JOIN PERSONA ON ET_RESPONSABLE.id_persona=PERSONA.id_persona INNER JOIN ET_TIPO_RESPONSABLE on ET_RESPONSABLE.id_tipo_responsable_et=ET_TIPO_RESPONSABLE.id_tipo_responsable_et where id_et='".$id_ExpedienteTecnico."' and codigo_tipo_responsable_et='002' ");

      return $responsable->result()[0];

    }
    public function ListarPersonalUsuario()
    {
        $personal = $this->db->query("select p.* from PERSONA p LEFT JOIN USUARIO u on u.id_persona=p.id_persona where U.id_persona IS NULL");
        //$personal = $this->db->query("select p.* from PERSONA");
        return $personal->result();
    }

    public function GetEspecilidad()
    {
         $especialidad = $this->db->query("select * from ESPECIALIDAD");
        return $especialidad->result();
    }
}
