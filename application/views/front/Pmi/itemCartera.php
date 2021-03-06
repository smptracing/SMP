<div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                <form class="form-horizontal " name="form-RegistraCarteraInv" id="form-RegistraCarteraInv" method="post"  enctype="multipart/form-data" onSubmit="return false;"  >

                      <div class="item form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Año Apertura Cartera<span class="required">*</span>
                            </label>
                               <div class="col-md-2 col-sm-2 col-xs-12">
                                  <select class="form-control" id="dateAñoAperturaCart" name="dateAñoAperturaCart">
                                  <?php 
                                  if(isset($arrayCartera)){
                                    for($i=2017;$i<2099;$i++){   
                                      if($i==$arrayCartera->anio)
                                        echo '<option selected value="'.$i.'">'.$i.'</option>';
                                      else
                                        echo '<option value="'.$i.'">'.$i.'</option>';  
                                    }   
                                  }
                                  else{
                                    for($i=2017;$i<2099;$i++){   
                                        echo '<option value="'.$i.'">'.$i.'</option>';  
                                    }  
                                  }
                                  ?>
                                  </select>
                               </div>
                      </div>
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Fecha Inicio Cartera<span class="required">*</span>
                            </label>
                               <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input type="date" id="dateFechaIniCart" name="dateFechaIniCart" value="<?php if(isset($arrayCartera)){echo $arrayCartera->fecha_inicio_cartera;} else { echo date('Y-m-d');}?>" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text">
                               </div>
                      </div>
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="name">Fecha Fin Cartera<span class="required">*</span>
                            </label>
                               <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input type="date" id="dateFechaFinCart" name="dateFechaFinCart" value="<?php if(isset($arrayCartera)){echo $arrayCartera->fecha_cierre_cartera;} else { echo date('Y-m-d');}?>" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text">
                               </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Numero Resolucion Cartera <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NumResolucionCart" name="txt_NumResolucionCart" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Numero Resolucion Cartera"  type="text" value="<?php if(isset($arrayCartera->numero_resolucion_cartera)) echo $arrayCartera->numero_resolucion_cartera;?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Adjuntar resolución<span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                                <div> <input type="file" name="Cartera_Resoluacion" ></div>
                                <?php
                                if(isset($arrayCartera->url_resolucion_cartera) and $arrayCartera->url_resolucion_cartera!='' ){
                                ?>
                                <div style="margin-top:5px;">
                                  <a href="../../uploads/cartera/<?php echo $arrayCartera->url_resolucion_cartera; ?>" target="_blank"><i class='fa fa-file fa-2x'></i></a>
                                </div>
                                <?php
                                }
                                ?>
                                
                          </div>

                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                         <button   class="btn btn-success" type="button" id="sendCartera">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                          <button  data-dismiss="modal" class="btn btn-danger">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancelar
                          </button>

                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVO SERVICIO ASOCIADO -->
            </div><!-- /.span -->
        </div><!-- /.row -->
</div>
<script>
  $(function(){
      $("#form-RegistraCarteraInv").submit(function(event){
        event.preventDefault();
        $.ajax({
            url:$("#form-RegistraCarteraInv").attr("action"),
            type:$(this).attr('method'),
            //data:$(this).serialize(),
            //enctype: 'multipart/form-data',
            // dataType: "JSON",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success:function(resp){

              swal("",resp, "success");
              $('#table-CarteraInv').dataTable()._fnAjaxUpdate();

           }
        });
      });
      $("body").on("click","#sendCartera",function(e){
          $('#form-RegistraCarteraInv').data('formValidation').validate();
          if($('#form-RegistraCarteraInv').data('formValidation').isValid()==true){

              $('#form-RegistraCarteraInv').submit();
              $('#form-RegistraCarteraInv').each(function(){ 
                this.reset();
              });
              $('.selectpicker').selectpicker('refresh');
              $('#form-RegistraCarteraInv').data('formValidation').resetForm();
              $('#form-RegistraCarteraInv').off();
              $('#form-RegistraCarteraInv').remove();
              $('#form-RegistraCarteraInv').empty();
              $('#null').modal('hide');
          }  
      });
      $("body").on("change","#dateAñoAperturaCart",function(e){
        $("#dateFechaIniCart").val($("#dateAñoAperturaCart").val()+'-01-01');
        $("#dateFechaFinCart").val($("#dateAñoAperturaCart").val()+'-03-30');
      });
  }); 
  $(document).ready(function(){
    <?php
    if(isset($arrayCartera->id_cartera)){
      ?>
      $("#form-RegistraCarteraInv").attr("action",base_url+"index.php/CarteraInversion/EditCartera/<?php echo $arrayCartera->id_cartera; ?>");
      <?php
    }
    else{
      ?>
      $("#form-RegistraCarteraInv").attr("action",base_url+"index.php/CarteraInversion/AddCartera");
      <?php
    }
    ?>
    $('#form-RegistraCarteraInv').formValidation({
      fields:
      {
        dateFechaFinCart:{
          validators:{
            notEmpty:{
              message: '<b style="color: red;">El campo "Fecha de Inicio" es requerido.</b>'
            }
          }
        },
        dateFechaIniCart:{
          validators:{
            notEmpty:{
              message: '<b style="color: red;">El campo "Fecha Fin" es requerido.</b>'
            }
          }
        },
      }
    });
    
   // listarCarteraAnios();
    
  }); 
</script>