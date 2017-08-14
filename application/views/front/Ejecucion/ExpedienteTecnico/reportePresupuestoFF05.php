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
  	<div style="text-align: center;margin-top: -50px;">FORMATO FF-05<br/><br/>
  	PRESUPUESTO RESUMEN</div><br/>
  	<table style="margin-top: 132px;position: absolute;font-size: 8px;margin-left: 80px;" id="contenido_border" width="700" border=0 cellspacing=0 cellpadding=2 bordercolor="666633">	
  		<tr>
              <td> <b> I </b> </td>
              <td style="text-align: left;"><b>COMPONENTE I :</b> </td>
              <td>  </td>
              <td style="text-align: right;"> 2323.343</td>
          </tr>
  	</table>

<ul id="presupuesto" style="background-color: #f5f5f5;list-style-type: upper-roman;">
	<li><a href="#">Elemento 1</a></li>
	<li><a href="#">Elemento 2</a></li>
	<li><a href="#">Elemento 3</a></li>
	<li><a href="#">Elemento 4</a></li>
</ul>

  </div>

</body>
</html>
