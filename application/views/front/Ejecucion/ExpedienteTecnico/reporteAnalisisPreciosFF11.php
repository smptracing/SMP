<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/dompdf.css">
</head>
<body>
	<header>
		<table >
			<tr>
				<td id="header_texto" >
					<img style="width: 80px;height: 70px; margin-left:-150px;position: absolute; " src="./assets/images/peru.jpg" > &nbsp; &nbsp;
					<img style="width: 80px;height: 70px; margin-left:400px;position: absolute; " src="./assets/images/logo.jpg" > &nbsp; &nbsp;
				</td>

			</tr>
		</table>
	</header>
	<footer>
		<div id="footer_texto"> </div>
	</footer>

	<div>
		<div style="text-align: center;margin-top: -50px;">FORMATO FF-11<br/><br/>
			ANÁLISIS DE PRECIOS UNITARIOS
		</div><br/><br><br/>
		<div class="row" style="text-align:center;padding: 10px;margin-top: -40px;">
			PROYECTO : &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; " <?=$MostraExpedienteNombre->nombre_pi;?>"
		</div><br><br><br><br>
		<div class="row" style="text-align:center;padding: 10px;margin-top: -40px;">
			EXPEDIENTE GLOBAL 
		</div>
	</div>
		<div style="margin-top: 70px;position: absolute;font-size: 8px;margin-left: -10px;">
				<table id="contenido_border" width="760" cellspacing=0 cellpadding=2>
					<tr>
							<td> </td>
							<td> DESCRIPCIÓN </td>
							<td> Unidad </td>
							<td> Cantidad </td>
							<td>&nbsp;&nbsp; P.Unitario </td>
							<td>&nbsp;&nbsp; Parcial </td>
							<td>&nbsp;&nbsp; Parcial </td>
					</tr>
					<?php  foreach ($listarpreciosunitarios as  $Itemp) {?>
					<tr>
						<td> <?= $Itemp->numeracion?> </td>
						<td> <?= $Itemp->desc_partida?> </td>	
						<td > <?= $Itemp->descripcion?> </td>
						<td> <?= $Itemp->cantidad?> </td>
						<td> <?= $Itemp->precio_unitario?> </td>	
						<td> <?= $Itemp->precio_unitario?> </td>							
					</tr>
					<?php } ?>

					<!--<tbody>
					<?php $i=0; foreach($listarpreciosunitarios as  $Itemp){  ?>
					<tr>
						<td>
							<div id="compomente" >
							<b style="text-transform: capitalize;"> <?=$Itemp->desc_recurso?>.</b> <br/> 
							</div>
							<?php foreach($listarpreciosunitarios as $index => $item){ ?>
									<tr>
										<td> <?= $Itemp->numeracion?> </td>
										<td> <?= $Itemp->desc_partida?> </td>	
										<td> <?=$Itemp->descripcion?> </td>
										<td> <?= $Itemp->cantidad?></td>
										<td> <?= $Itemp->precio_unitario?> </td>	
									</tr>
							<?php } ?>
						</td>
					</tr>
					<?php } ?>
				  </tbody>-->

				</table>    
			</div>
</html>
