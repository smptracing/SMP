<html>
  <head>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/dompdf.css">
  </head>
<style>
	#presupuesto li {
		display:inline;
	}
	#presupuesto a {
		text-decoration:none;
		padding:5px;
	}
	.romanos_upper{
	  list-style-type:upper-roman;
	}
	.romanos_lower{
	  list-style-type:lower-roman;
	}
</style>
<body>

  <header>
      <table >
          <tr>
              <td id="header_texto">
    		    <img style="width: 80px;height: 70px; margin-left:-100px;position: absolute; " src="./assets/images/peru.jpg" > &nbsp; &nbsp;
              	<img style="width: 80px;height: 70px; margin-left:600px;position: absolute; " src="./assets/images/logo.jpg" > &nbsp; &nbsp;
              </td>
          </tr>
      </table>
  </header>
  <div style="margin-top: 30px;position: absolute;font-size: 10px;margin-left: 50px;">
              PROYECTO: &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; " <?=$MostraExpedienteNombre->nombre_pi;?>"
  </div>
  <div style="margin-top: 60px;position: absolute;font-size: 8px;margin-left: 100px;">
        <table id="contenido_border" width="790" border=0 cellspacing=0 cellpadding=2 bordercolor="666633">
          <tr>
              <td width="20">  </td>
              <td width="100">&nbsp;&nbsp; META </td>
              <td style="text-align: center;"></td>
              <td>  </td>
              <td style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;  0137-2014 </td>
          </tr>
          <tr>
          	  <td>  </td>
              <td>&nbsp;&nbsp; INVERSIÓN: </td> 
              <td style="text-align: center;"></td>
              <td>  </td>
              <td style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;  S/. 2.252.770,73</td>
          </tr>
          <tr>
              <td>  </td>
              <td style="text-align: left;" >&nbsp;&nbsp; FUENTE DE FINANCIAMINETO: </td>
              <td style="text-align: center;"> </td>
              <td>  </td>
              <td style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;  RECURSO ORDINARIOS </td>
          </tr>
          <tr>
              <td>  </td>
              <td>&nbsp;&nbsp; MODALIDAD: </td>
              <td style="text-align: center;">  </td>
              <td>  </td>
              <td style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;  ADMINISTRACIÓN DIRECTA </td>
          </tr>
          <tr>
              <td>  </td>
              <td>&nbsp;&nbsp; AÑO: </td>
              <td style="text-align: center;"> </td>
              <td>  </td>
              <td style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;  2014 </td>
          </tr>
          <tr>
              <td>  <b>ITEM</b> </td>
              <td>&nbsp;&nbsp;  </td>
              <td style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;  <b>EXPEDIENTE GENERAL</b><br/>  GLOBAL </td>
              <td>  </td>
              <td style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;  <b>COSTO TOTAL</b> </td>
          </tr>
      </table>    
  </div>
  <footer>
      <div id="footer_texto"> </div>
  </footer>
  <div>
  	<div style="text-align: center;margin-top: -50px;">FORMATO FF-05 <br/>PRESUPUESTO RESUMEN</div><br/>
  </div>
		<ul class="romanos_upper" style="margin-top: 140px;font-size:10px;position: absolute;margin-left: 80px;">
			<li>
				<a href="">COMPONENTE </a><a style="margin-left: 40px;" href="">Nuevo nuenvoNuevo nuenvoNuevo nuenvoNuevo nuenvo </a><a style="margin-left: 400px;" href="">2323.343</a>
			</li>
		</ul>
</body>
</html>
