<html>
  <head>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dompdf.css">
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
              <!-- <?php echo base_url(); ?>assets/css/dompdf.css" -->
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
  <!-- <footer>
  	<br>
      <div id="footer_texto">DIRECTIVA PARA FORMUMACIÓN, EJECUCIÓN Y SUPERVISIÓN DE PROYECTOS EL LA FASE DE INVERSION POR <br/>ADMINISTRACIÓN DIRECTA O ENCARGO </div>
  </footer> -->
	<br><br>
  <div>FORMATO FF-01</div><br/>
  	<table id="contenido_border" width="550" border=1 cellspacing=0 cellpadding=2 bordercolor="666633" style="text-align: left;" >
  		<thead>
	  		<tr>
	              <th id="header_texto">
	                1.Nombre de la Unidad Ejecución
	              </th>
	              <th id="header_texto">
	               Gobierno Regional Apurímac
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                1.1. Dirección 
	              </th>
	              <th id="header_texto">
	               <?=$listarExpedienteFicha001->direccion_ue;?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                1.2. Distrito/Provincia/Departamento 
	              </th>
	              <th id="header_texto">
	               <?= $listarExpedienteFicha001->distrito_provincia_departamento_ue ?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                 1.3. Teléfono 
	              </th>
	              <th id="header_texto">
	               <?= $listarExpedienteFicha001->telefono_ue ?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                1.4. RUC 
	              </th>
	              <th id="header_texto">
	                <?= $listarExpedienteFicha001->ruc_ue ?>
	              </th>
	        </tr>
			
			<tr>
	              <th id="header_texto">
	                2. Nombre del Proyecto
	              </th>
	              <th id="header_texto" style=" text-align: center;">
	               <?= $listarExpedienteFicha001->nombre_pi ?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                2.1. Ubicación distrital donde se plantea su ejecución 
	              </th>
	              <th id="header_texto">
	               <?= $listarExpedienteFicha001->provincia ?> 
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	               2.2. Codigo único 
	              </th>
	              <th id="header_texto">
	              <?= $listarExpedienteFicha001->codigo_unico_pi ?> 
	              </th>
	        </tr>

	        <tr>
	              <th id="header_texto">
	                3. Costo Total Proyecto(Pre Invesión)
	              </th>
	              <th id="header_texto">
	               S/. <?= $listarExpedienteFicha001->costo_total_preinv_et ?> 
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                 3.1. Costo Directo 
	              </th>
	              <th id="header_texto">
	               S/. <?= $listarExpedienteFicha001->costo_directo_preinv_et ?> 
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	               3.2. Costo Indirecto 
	              </th>
	              <th id="header_texto">
	               S/. <?= $listarExpedienteFicha001->costo_indirecto_preinv_et ?>  
	              </th>
	        </tr>

	        <tr>
	              <th id="header_texto">
	                4. Costo Total Proyecto(Invesión)
	              </th>
	              <th id="header_texto">
	               S/. <?= $listarExpedienteFicha001->costo_total_inv_et ?> 
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                4.1. Costo Directo
	              </th>
	              <th id="header_texto">
	              falta
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                4.2. Costo General
	              </th>
	              <th id="header_texto">
	               S/. <?= $listarExpedienteFicha001->gastos_generales_et ?> 
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                4.3. Gasto de Supervisión 
	              </th>
	              <th id="header_texto">
	               S/. <?= $listarExpedienteFicha001->gastos_supervision_et ?> 
	              </th>
	        </tr>

	        <tr>
	              <th id="header_texto">
	                5. Función Programática 
	              </th>
	              <th id="header_texto">
	               &nbsp; 
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                5.1. FUNCIÓN
	              </th>
	              <th id="header_texto">
	               <?= $listarExpedienteFicha001->funcion_et ?> 
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                5.2. PROGRAMA
	              </th>
	              <th id="header_texto">
	               <?= $listarExpedienteFicha001->programa_et ?> 
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                5.3. SUB PROGRAMA
	              </th>
	              <th id="header_texto">
	               <?= $listarExpedienteFicha001->sub_programa_et ?>  
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	               5.4. PROYECTO
	              </th>
	              <th id="header_texto" style=" text-align: center;">
	              <?= $listarExpedienteFicha001->proyecto_et ?>  
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                5.5. COMPONENTE 
	              </th>
	              <th id="header_texto">
	               <?= $listarExpedienteFicha001->componente_et ?>   
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	               5.6. META 
	              </th>
	              <th id="header_texto">
	               <?= $listarExpedienteFicha001->meta_et ?>  
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                5.7. FUENTE DE FINANCIAMIENTO
	              </th>
	              <th id="header_texto">
	               <?= $listarExpedienteFicha001->fuente_financiamiento_et ?>   
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	               5.8. MODALIDAD DE EJECUCIÓN 
	              </th>
	              <th id="header_texto">
	               <?= $listarExpedienteFicha001->modalidad_ejecucion_et ?> 
	              </th>
	        </tr>
			
			<tr>
	              <th id="header_texto">
	                6. Tiempo de Ejecución del Proyecto 
	              </th>
	              <th id="header_texto">
	               <?= $listarExpedienteFicha001->tiempo_ejecucion_pi_et ?> 
	              </th>
	        </tr>

	        <tr>
	              <th id="header_texto">
	                7. Número de Beneficiario Indirecto del Proyecto 
	              </th>
	              <th id="header_texto">
	               <?= $listarExpedienteFicha001->num_beneficiarios_indirectos ?>  
	              </th>
	        </tr>

	        
	        <tr>
	              <th id="header_texto">
	               8.2. DNI
	              </th>
	              <th id="header_texto">
	               <?= $responsableElaboracion->dni?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                8.3. Registro Profesíon N°
	              </th>
	              <th id="header_texto">
	              <?= $responsableElaboracion->num_registro_prof?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	               8.4. Dirección
	              </th>
	              <th id="header_texto">
	               <?= $responsableElaboracion->direccion?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                8.5. Teléfono 
	              </th>
	              <th id="header_texto">
	              <?= $responsableElaboracion->telefonos?>
	              </th>
	        </tr>

	        <tr>
	              <th id="header_texto">
	                9. Nombre del Responsable de la Ejecución del proyecto' 
	              </th>
	              <th id="header_texto">
	               <?= $responsableEjecucion->nombres?> <?= $responsableEjecucion->apellido_p?>  <?= $responsableEjecucion->apellido_m?>  
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	               9.1. Profesíon
	              </th>
	              <th id="header_texto">
	               <?= $responsableEjecucion->num_registro_prof?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	               9.2. DNI
	              </th>
	              <th id="header_texto">
	               <?= $responsableEjecucion->dni?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	               9.3. Registro Profesíon N°
	              </th>
	              <th id="header_texto">
	               <?= $responsableEjecucion->num_registro_prof?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	                9.4. Dirección 
	              </th>
	              <th id="header_texto">
	               <?= $responsableEjecucion->direccion?>
	              </th>
	        </tr>
	        <tr>
	              <th id="header_texto">
	               9.5. Teléfono 
	              </th>
	              <th id="header_texto">
	             <?= $responsableEjecucion->telefonos?>
	              </th>
	        </tr>


	        <tr>
	              <th colspan="2" id="header_texto">
	                10. Sustento para la presentación del proyecto<br/>
	                	<div style="text-align:left; position: relative;" >10.1. Decripción de la Presentación del proyecto<br>
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
	                11. Revelación económica 
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
	                12. Resumen del proyecto(descripción general)
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
	                14. Fotografias(04 minimo)
	                <br>
	               <center> 
					<?php foreach($ImagenesExpediente as $item){ ?>
		                <img style="width: 230px;height: 130px; position: relative; " src="./uploads/ImageExpediente/<?= $item->desc_img?>" > 
					<?php } ?>
	                </center>
	              </th>
	        </tr>
	    <thead>
	</table>

  </div>


</body>
</html>
