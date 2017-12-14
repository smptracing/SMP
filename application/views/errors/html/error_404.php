
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$ci = new CI_Controller();
$ci =& get_instance();
$ci->load->helper('url');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eng" lang="eng">

<!-- Mirrored from adraft.x10.mx/space-404/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Dec 2017 16:21:26 GMT -->
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Lost in Space - Error 404</title>
	<link href='http://fonts.googleapis.com/css?family=Bangers&amp;v2' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/css_404/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/css_404/main.css" />
	<script src="<?= base_url() ?>assets/js/scripts_404/jquery162.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/js/scripts_404/spritely05.js" type="text/javascript"></script>
	<script type="text/javascript">
		(function($) {
			$(document).ready(function() {
				$('#astronaut')
					.sprite({fps: 30, no_of_frames: 1})
					.spRandom({top: 30, bottom: 200, left: 30, right: 200})
				$('#space').pan({fps: 40, speed: 3, dir: 'right', depth: 50});
			});
		})(jQuery);
	</script>
</head>
<body>
<div id="container">
	<div id="stage" class="stage">
		<div id="space" class="stage"></div>
		<div id="astronaut" class="stage">
			<div id="text_1">SMP,<br />tenemos un<br />problema!</div>
			<div id="text_2">Error 404!</div>
			<div id="text_3">El universo<br />que estas buscando<br />no existe</div>
			<div id="text_4">Intente visitar otra dimension</div>
			<div id="text_5">
				<ul>
					<li><a href="<?= base_url() ?>">Regresar al Inicio</a></li>
				</ul>
			</div>
			<div class="search_box">
				<form id="searchform" action="#" method="get">
					<input id="s" class="inputField" type="text" name="s" onblur="if (this.value == '') {this.value = 'Or search for new one...';}" onfocus="if (this.value == 'Or search for new one...') {this.value = '';}" value="Or search for new one..." />
					<input id="searchsubmit" class="btn-search" type="submit" value="" />
				</form>
			</div>
		</div>
	</div>
</div>
</body>


</html>
