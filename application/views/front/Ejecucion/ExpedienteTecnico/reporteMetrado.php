
<?php
function mostrarMetaAnidada($meta)
{
	$htmlTemp='';

	$htmlTemp.='<div>'.
		$meta->desc_meta.' '.
		'<div style="background: white;">';
	if(count($meta->childMeta)==0)
	{
		$texto="";
		foreach($meta->childPartida as $key => $value)
		{
			$htmlTemp.='<div  style="color: blak;text-transform: capitalize;width: 300px;" class="liPartida">'.
				'<b>'.$value->desc_partida.'  '.
			'</div>';
			$htmlTemp.='<div style="color: black;text-transform: capitalize;width: 100px; margin-left: 1550px; margin-top: -200px; position:absolute;" class="liPartida">'.
				''.$texto.'   '.
			'</div>';
			$htmlTemp.='<div style="color: blak;width: 100px;text-transform: capitalize; margin-left: 670px; margin-top: -15px; position:absolute;" class="liPartida">'.
				'<b  margin-left: 670px; position:absolute"> '.$value->descripcion.'</b>     '.$value->cantidad.''.
			'</div>';
		}
	}

	foreach($meta->childMeta as $key => $value)
	{
		$htmlTemp.=mostrarMetaAnidada($value);
	}

	$htmlTemp.='</div>'.
	'</div>';
	return $htmlTemp;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="text-align:center;">
	<div class="row" style="text-align:center;">
		METRADO
	</div>
	<div class="row" style="text-align:center;font-size:12px; border-color: red; margin-left: 10px;">
	PROY: "INSTALACION DEL SERVICIO DE SEGUIMIENTO Y MONITOREO DE LOS PIP EN SERVICIO "
	</div><br/><br/>
	<div class="row" >
		<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 12px;">
					
			<b style="margin-right: 500px;">ÍTEM </b> <b style="margin-left:-100px; text-align: center; position: absolute;">DESCRIPCIÓN </b> <b> UNIDAD DE MEDIDA</b> <b> TOTAL</b><br/><br/>
				
			<table id="ulComponenteMetaPartida" style="list-style-type: upper-roman;font-size: 10px">
				<thead>
					
				</thead>
				  <tbody>
					<?php $i=0; foreach($MostraExpedienteTecnicoExpe->childComponente as $key => $value){  ?>
							<tr>
								<td>
									
									<div id="compomente" >
									I.	COMPONENTE I:<b style="text-transform: capitalize;"> <?=$value->descripcion?>.</b> <br/> 
									</div>
									<?php foreach($value->childMeta as $index => $item){ ?>
											<div id="meta" style="text-transform: capitalize;text-transform: uppercase;">
												<?=mostrarMetaAnidada($item);?>
											</div>
									<?php } ?>
								</td>
							</tr>
					<?php } ?>
				  </tbody>
			</table>
		</div>
	</div>

</body>
</html>