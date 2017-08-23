<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/dompdf.css">
	<style>
	.romanos_upper{
	  list-style-type:upper-roman;
	}
	.romanos_lower{
	  list-style-type:lower-roman;
	}
  </style>
</head>
<?php
function mostrarMetaAnidada($meta)
{
	$htmlTemp='';

	$htmlTemp.='<div style="margin-top:2px;" width="100"><div width="5" style="position:absolute;">'.$meta->numeracion.'</div><div width="5" style="margin-left:-450px;">'.$meta->desc_meta.'</div>';
	if(count($meta->childMeta)==0)
	{
		$texto="";
		foreach($meta->childPartida as $key => $value)
		{
			$htmlTemp.='<div width="100"><b width="100" style="position:absolute; ">'.$value->numeracion.'</b><b style="margin-left:-368px;">'.$value->desc_partida.'</b> '.
			'</div><br/>';
			$htmlTemp.='<table border="0px" style="margin-left:370px;margin-top:-30px;"><tr><td width="100" >'.$value->descripcion.'</td><td width="100">'.$value->cantidad.'</td></tr></table>';

		}
	}

	foreach($meta->childMeta as $key => $value)
	{
		$htmlTemp.=mostrarMetaAnidada($value);
	}

	$htmlTemp.='<div>'.
	'';
	return $htmlTemp;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="text-align:center;">
	<header>
			<table>
				<tr>
					<td id="header_texto" style="margin-top: 50px;position: absolute;">
						<div><center> GOBIERNO REGIONAL DE APURÍMAC </center> </div>
						<div><center> "Año de la promoción de la industria responsable y de compromiso climático" </center> </div>
					</td>
				</tr>
				<tr>
					<td id="header_texto" >
						<img style="width: 80px;height: 70px;margin-left:-150px;position: absolute; " src="./assets/images/peru.jpg" > &nbsp; &nbsp;
						<img style="width: 80px;height: 70px; margin-left:420px;position: absolute; " src="./assets/images/logo.jpg" > &nbsp; &nbsp;
					</td>
				</tr>
			</table>
	</header>
	<div class="row" style="text-align:center; margin-top: -10px;">
		METRADO
	</div>
	<div class="row"  style="text-align:center;font-size:9px; margin-top: 20px; border-color: red; margin-left: 10px;">
	PROY: " <?=$MostraExpedienteNombre->nombre_pi;?>"
	</div><br/><br/>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 10px;">
					
			<b style="margin-right: 500px;">ÍTEM </b> <b style="margin-left:-240px; text-align: center; position: absolute;">DESCRIPCIÓN </b> <b style="writing-mode: vertical-lr; transform: rotate(-90deg);position: absolute;margin-top: 15px;margin-left:30px;"> UNIDAD <br/>DE<br> MEDIDA</b> <b style="writing-mode: vertical-lr;transform: rotate(-90deg);position: absolute;margin-top: 15px;margin-left:130px;"> TOTAL</b><br/><br/>
				
			<div id="ulComponenteMetaPartida" style="font-size: 10px;margin:10px; position:absolute;border:0px solid red;" WIDTH=50%>
				<ol class="romanos_upper">

					<?php $i=0; foreach($MostraExpedienteTecnicoExpe->childComponente as $key => $value){  ?>
							
									<div style="text-align: left;" >
									<b style="margin-left: 10px;position: absolute;"><?=$value->numeracion?></b><b style="margin-left: 60px;text-transform: uppercase;"> <?=$value->descripcion?></b> <br/> 
									</div>
									<?php foreach($value->childMeta as $index => $item){ ?>
											<div id="meta" style="text-transform: capitalize;text-transform: uppercase;">
												<?=mostrarMetaAnidada($item);?>
											</div>
									<?php } ?>
							
					<?php } ?>
				</ol>
			</div>
		</div>
	</div>

</body>
</html>