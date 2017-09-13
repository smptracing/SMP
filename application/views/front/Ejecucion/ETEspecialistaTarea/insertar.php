<link rel="stylesheet" href="<?=base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/bootstrap-select.css">
<h4 style="padding: 5px;margin: 0px;">Actividad: <span style="color: #2f9bfb;">Sistema de seguimiento y mon</span></h4>
<hr style="margin: 3px;">
<?php foreach($listaEspecialidad as $key => $value){ ?>
	<?=$value->nombre_esp?>
<?php } ?>
<script src="<?=base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/dist/js/bootstrap-select.js"></script>