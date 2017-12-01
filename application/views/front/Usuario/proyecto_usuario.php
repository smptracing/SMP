<script src="http://kendo.cdn.telerik.com/2017.3.1026/js/kendo.all.min.js"></script>
<div class="right_col" role="main">
    <div>
        <div class="clearfix"></div>
        <div class="col-md-12 col-xs-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><b>USUARIO</b></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!--<button onclick="paginaAjaxDialogo(null,'Registrar Usuario',null,base_url+'index.php/Usuario/itemUsuario','GET',null,null,false,true);" class="btn btn-primary"><span class="fa fa-plus"></span>  NUEVO</button>-->
                    <button onclick="paginaAjaxDialogo(null,'Registrar Usuario',null,base_url+'#','GET',null,null,false,true);" class="btn btn-primary"><span class="fa fa-plus"></span>  Asignar</button>
                    <div class="table-responsive">
                        <table id="table_usuario_proyecto"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <td class="col-md-1 col-xs-12"><input type="checkbox" onchange="checkAll(this)" name="" value=""> Todo</td>
                                    <td class="col-md-2 col-xs-12">Usuario</td>
                                    <td class="col-md-1 col-xs-12">Corrreo Electrónico</td>
                                    <td class="col-md-1 col-xs-12">Tipo de Usuario</td>
                                    <td class="col-md-1 col-xs-12">Opciones</td>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach($lista as $item){ ?>
                                  <tr>
                                    <td>
                                      <input type="checkbox" name="checkbox" value="<?php echo $item->id_pi ?>">
                                    </td>
                                    <td><?= $item->nombre_pi ?></td>
                                    <td><?= $item->codigo_unico_pi ?></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php
$sessionTempCorrecto=$this->session->flashdata('correcto');
$sessionTempError=$this->session->flashdata('error');

if($sessionTempCorrecto){ ?>
    <script>
    $(document).ready(function()
    {
        swal('','<?=$sessionTempCorrecto?>', "success");
    });
    </script>
<?php }

if($sessionTempError){ ?>
    <script>
    $(document).ready(function()
    {
    swal('','<?=$sessionTempError?>', "error");
    });
    </script>
<?php } ?>

<script>

$(document).ready(function()
{
    $('#table_usuario_proyecto').DataTable(
    {
        "language":idioma_espanol
    });
});

function checkAll(ele) {
    var checkboxes = document.getElementsByTagName('input');
    if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox' && checkboxes[i].name == 'checkbox' ) {
                checkboxes[i].checked = true;
            }
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox' && checkboxes[i].name == 'checkbox' ) {
                checkboxes[i].checked = false;
            }
        }
    }
}
</script>
