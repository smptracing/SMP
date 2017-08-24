<html>
  <head>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/dompdf.css">
      <style type="text/css">
      	tr
      	{
			font-family: courier new;
      	}
      </style>
  </head>

<body>

  <header>
      <table >
          <tr>
              <td id="header_texto" >
                  <div>FORMATO FF-01  	&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;		GOBIERNO REGIONAL DE APURIMAC</div>
              </td>
			  <tr>
					<td id="header_texto" >
						<img style="width: 80px;height: 70px; margin-left:-150px;position: absolute; " src="./assets/images/peru.jpg" > &nbsp; &nbsp;
						<img style="width: 80px;height: 70px; margin-left:420px;position: absolute; " src="./assets/images/logo.jpg" > &nbsp; &nbsp;
					</td>
			   </tr>
          </tr>
      </table>
  </header>
  <footer>
      <div id="footer_texto">DIRECTIVA PARA FORMUMACIÓN, EJECUCIÓN Y SUPERVISIÓN DE PROYECTOS EL LA FASE DE INVERSION POR <br/>ADMINISTRACIÓN DIRECTA O ENCARGO </div>
  </footer>

  <div>
  	<div style="text-align: center;margin-top: -40px;">FORMATO FF-01<br/>
  	FICHA TECNICA DEL PROYECTO</div><br/>
  	<table id="contenido_border" width="550" border=1 cellspacing=0 cellpadding=2 bordercolor="666633" >
  		<thead>
	  		<tr>
	              <th id="header_texto">
	                1 &nbsp; &nbsp;Nombre de la Unidad Ejecución
	              </th>
	              <th id="header_texto">
	               &nbsp; Gobierno Regional Apurímac
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	               &nbsp; &nbsp;  &nbsp; &nbsp; 1.1 &nbsp; &nbsp; Dirección 
	              </th>
	              <th id="header_texto">
	               &nbsp; <?=$listarExpedienteFicha001->direccion_ue;?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 1.2 &nbsp; &nbsp; Distrito/Provincia/Departamento 
	              </th>
	              <th id="header_texto">
	               &nbsp;  <?= $listarExpedienteFicha001->distrito_provincia_departamento_ue ?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 1.3 &nbsp; &nbsp; Teléfono 
	              </th>
	              <th id="header_texto">
	               &nbsp; <?= $listarExpedienteFicha001->telefono_ue ?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 1.4 &nbsp; &nbsp; RUC 
	              </th>
	              <th id="header_texto">
	               &nbsp; <?= $listarExpedienteFicha001->ruc_ue ?>
	              </th>
	        </tr>
			
			<tr>
	              <th id="header_texto">
	                2 &nbsp; &nbsp;Nombre del Proyecto
	              </th>
	              <th id="header_texto" style=" text-align: center;">
	               &nbsp; <?= $listarExpedienteFicha001->nombre_pi ?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 2.1 &nbsp; &nbsp; Ubicación distrital donde se plantea su ejecución 
	              </th>
	              <th id="header_texto">
	               &nbsp; <?= $listarExpedienteFicha001->provincia ?> 
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 2.2 &nbsp; &nbsp; Codigo único 
	              </th>
	              <th id="header_texto">
	               &nbsp; <?= $listarExpedienteFicha001->codigo_unico_pi ?> 
	              </th>
	        </tr>

	        <tr>
	              <th id="header_texto">
	                3 &nbsp; &nbsp;Costo Total Proyecto(Pre Invesión)
	              </th>
	              <th id="header_texto">
	               &nbsp;S/. <?= $listarExpedienteFicha001->costo_total_preinv_et ?> 
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 3.1 &nbsp; &nbsp; Costo Directo 
	              </th>
	              <th id="header_texto">
	               &nbsp;S/. <?= $listarExpedienteFicha001->costo_directo_preinv_et ?> 
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 3.2 &nbsp; &nbsp; Costo Indirecto 
	              </th>
	              <th id="header_texto">
	               &nbsp;S/. <?= $listarExpedienteFicha001->costo_indirecto_preinv_et ?>  
	              </th>
	        </tr>

	        <tr>
	              <th id="header_texto">
	                4 &nbsp; &nbsp;Costo Total Proyecto(Invesión)
	              </th>
	              <th id="header_texto">
	               &nbsp;S/. <?= $listarExpedienteFicha001->costo_total_inv_et ?> 
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 4.1 &nbsp; &nbsp; Costo Directo
	              </th>
	              <th id="header_texto">
	               &nbsp;falta
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 4.2 &nbsp; &nbsp; Costo General
	              </th>
	              <th id="header_texto">
	               &nbsp;S/. <?= $listarExpedienteFicha001->gastos_generales_et ?> 
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 4.3 &nbsp; &nbsp; Gasto de Supervisión 
	              </th>
	              <th id="header_texto">
	               &nbsp;S/. <?= $listarExpedienteFicha001->gastos_supervision_et ?> 
	              </th>
	        </tr>

	        <tr>
	              <th id="header_texto">
	                5 &nbsp; &nbsp; Función Programática 
	              </th>
	              <th id="header_texto">
	               &nbsp; 
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 5.1 &nbsp; &nbsp; FUNCIÓN
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $listarExpedienteFicha001->funcion_et ?> 
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 5.2 &nbsp; &nbsp; PROGRAMA
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $listarExpedienteFicha001->programa_et ?> 
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 5.3 &nbsp; &nbsp; SUB PROGRAMA
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $listarExpedienteFicha001->sub_programa_et ?>  
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 5.4 &nbsp; &nbsp; PROYECTO
	              </th>
	              <th id="header_texto" style=" text-align: center;">
	               &nbsp;<?= $listarExpedienteFicha001->proyecto_et ?>  
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 5.5 &nbsp; &nbsp; COMPONENTE 
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $listarExpedienteFicha001->componente_et ?>   
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 5.6 &nbsp; &nbsp; META 
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $listarExpedienteFicha001->meta_et ?>  
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 5.7 &nbsp; &nbsp; FUENTE DE FINANCIAMIENTO
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $listarExpedienteFicha001->fuente_financiamiento_et ?>   
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 5.8 &nbsp; &nbsp; MODALIDAD DE EJECUCIÓN 
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $listarExpedienteFicha001->modalidad_ejecucion_et ?> 
	              </th>
	        </tr>
			
			<tr>
	              <th id="header_texto">
	                6 &nbsp; &nbsp; Tiempo de Ejecución del Proyecto 
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $listarExpedienteFicha001->tiempo_ejecucion_pi_et ?> 
	              </th>
	        </tr>

	        <tr>
	              <th id="header_texto">
	                7 &nbsp; &nbsp; Número de Beneficiario Indirecto del Proyecto 
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $listarExpedienteFicha001->num_beneficiarios_indirectos ?>  
	              </th>
	        </tr>

	        <tr>
	              <th id="header_texto">
	                8 &nbsp; &nbsp; Nombre del Responsable de la Elavoración del Proyecto 
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $responsableElaboracion->nombres?> <?= $responsableElaboracion->apellido_p?>  <?= $responsableElaboracion->apellido_m?>  
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 8.1 &nbsp; &nbsp; Profesíon
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $responsableElaboracion->especialidad?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 8.2 &nbsp; &nbsp; DNI
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $responsableElaboracion->dni?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 8.3 &nbsp; &nbsp; Registro Profesíon N°
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $responsableElaboracion->num_registro_prof?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 8.4 &nbsp; &nbsp; Dirección
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $responsableElaboracion->direccion?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 8.5 &nbsp; &nbsp; Teléfono 
	              </th>
	              <th id="header_texto">
	               &nbsp; <?= $responsableElaboracion->telefonos?>
	              </th>
	        </tr>

	        <tr>
	              <th id="header_texto">
	                9 &nbsp; &nbsp; Nombre del Responsable de la Ejecución del proyecto' 
	              </th>
	              <th id="header_texto">
	               &nbsp; <?= $responsableEjecucion->nombres?> <?= $responsableEjecucion->apellido_p?>  <?= $responsableEjecucion->apellido_m?>  
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 9.1 &nbsp; &nbsp; Profesíon
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $responsableEjecucion->num_registro_prof?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 9.2 &nbsp; &nbsp; DNI
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $responsableEjecucion->dni?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 9.3 &nbsp; &nbsp; Registro Profesíon N°
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $responsableEjecucion->num_registro_prof?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 9.4 &nbsp; &nbsp; Dirección 
	              </th>
	              <th id="header_texto">
	               &nbsp; <?= $responsableEjecucion->direccion?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                &nbsp; &nbsp; &nbsp; &nbsp; 9.5 &nbsp; &nbsp; Teléfono 
	              </th>
	              <th id="header_texto">
	               &nbsp;<?= $responsableEjecucion->telefonos?>
	              </th>
	        </tr>


	        <tr>
	              <th colspan="2" id="header_texto">
	                10 &nbsp; &nbsp; Sustento para la presentación del proyecto<br/>
	                	<div style="text-align:left; position: relative;" > &nbsp; &nbsp; &nbsp; &nbsp; 10.1 &nbsp; &nbsp; Decripción de la Presentación del proyecto<br>
							<?= $listarExpedienteFicha001->desc_situacion_actual_et ?>   
	                	</div>
	              </th>
	             
	        </tr>

         </thead>

  	</table>

  	<table id="contenido_border" style="margin-top: 10px;" width="565" border=1 cellspacing=0 cellpadding=2 bordercolor="666633" >
  		<thead>
	  		<tr>
	              <th id="header_texto">
	                11 &nbsp; &nbsp;Revelación económica 
	                <br>
					<?= $listarExpedienteFicha001->relevancia_economica_et ?>  
	              </th>
	        </tr>
	    </thead>
	</table>

	<table id="contenido_border" style="margin-top: 10px;" width="565" border=1 cellspacing=0 cellpadding=2 bordercolor="666633" >
  		<thead>
	  		<tr colspan="4">
	              <th  id="header_texto">
	                12 &nbsp; &nbsp;Resumen del proyecto(descripción general)
	                <br>
						<?= $listarExpedienteFicha001->resumen_pi_et ?> 	 
	              </th>
	        </tr>

	    </thead>
	</table>

	<table id="contenido_border" style="margin-top: -2px;" width="565" border=1 cellspacing=0 cellpadding=2 bordercolor="666633" >
	        <tr>
	              <th width="20">
	              	13
	              </th>
	              <th style="text-align: left;">
	              N° de Folios
	              </th>
	              <th>
	              	<?= $listarExpedienteFicha001->num_folios ?> 	 
	              </th>
	        </tr>
	    <thead>
	</table>

	<table id="contenido_border" style="margin-top: -2px; " width="565"  border=1 cellspacing=0 cellpadding=2 bordercolor="666633" >
	        <tr colspan="4">
	              <th  id="header_texto">
	                14 &nbsp; &nbsp;Fotografias(04 minimo)
	                <br>
	               <center> 
					<?php foreach($ImagenesExpediente as $item){ ?>
		                <img style="width: 230px;height: 130px; position: relative; " src="./uploads/ImageExpediente/<?= $item->desc_img?>" > &nbsp; &nbsp;
					<?php } ?>
	                </center>
	              </th>
	        </tr>
	    <thead>
	</table>

  </div>


</body>
</html>
