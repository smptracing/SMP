<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Criterio extends CI_Model
{
  public function __construct(){
      parent::__construct();
  }     
  function getFactor(){
    $query=$this->db->query("select * from FACTOR;");
    if($query){
      return $query->result_array();
    }
    else{
      return false;
    }
  }
  function getCriterio(){
    $query=$this->db->query("
select C.*,F.nombre_factor,CAST(C.peso as varchar)+' %' as denPeso
from CRITERIO C 
inner join FACTOR F on C.id_factor=F.id_factor;");
    if($query){
      return $query->result_array();
    }
    else{
      return false;
    }
  }
  function getValorizacion($id_proyecto){
/*    $query=$this->db->query("
select C.id_criterio,F.nombre_factor,CAST(C.peso as varchar)+'%' as denPeso,C.nombre_criterio,V.nombre_val,V.puntaje_val,V.id_valorizacion,C.peso
from VALORIZACION V
inner join CRITERIO C on C.id_criterio=V.id_criterio
inner join FACTOR F on F.id_factor=C.id_factor order by id_criterio asc;");*/
    $query=$this->db->query("
select C.id_criterio,F.nombre_factor,CAST(C.peso as varchar)+'%' as denPeso,C.nombre_criterio,V.nombre_val,V.puntaje_val,V.id_valorizacion,C.peso
,E.puntaje_val as  puntaje_valP,E.puntaje_total as  puntaje_totalP
from VALORIZACION V
inner join CRITERIO C on C.id_criterio=V.id_criterio
inner join FACTOR F on F.id_factor=C.id_factor 
LEFT JOIN EVALUACION E on E.id_valorizacion=V.id_valorizacion and E.id_pi=".$id_proyecto."
order by id_criterio asc;");
    if($query){
      return $query->result_array();
    }
    else{
      return false;
    }
  }
  function addPrioridad($id_proyecto,$array){
    $query=$this->db->query("delete from EVALUACION where id_pi=".$id_proyecto);
    $sql='';
    foreach ($array as $item) {
      if($item[0]!='')
        $sql.="insert into EVALUACION(id_pi,id_valorizacion,puntaje_val,puntaje_total) values(".$id_proyecto.",".$item[0].",".$item[1].",".$item[2].");";
    }
    $query=$this->db->query($sql);
    if($query){
      return true;
    }
    else{
      return false;
    }
  }
}