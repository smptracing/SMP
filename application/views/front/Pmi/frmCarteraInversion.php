<style>
  #table-CarteraInv > tbody > tr > td
  {
    text-align: center;
    vertical-align: middle;
  }

  #table-CarteraInv > thead > tr > th
  {
    text-align: center;
  }
</style>
<div class="right_col" role="main">
          <div class="">


            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2>CARTERA DE INVERSION<small></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                      </li>
                                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                                      </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content">


                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                      <ul id="myTab" class="nav nav-tabs" role="tablist">
          
                                        <li role="presentation" class="active"><a  href="#tab_CarteraInversion" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> CARTERA DE INVERSION</a>
                                        </li>
                                      </ul>
                                      <div id="myTabContent" class="tab-content">

                            <!-- /  panel de modalidad ejecucion el row -->
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_CarteraInversion" aria-labelledby="profile-tab">

                                              <!-- /tabla de cartera de inersion row -->
                                            <div class="row">

                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" class="btn btn-primary" data-toggle="modal"

                                                             onclick=paginaAjaxDialogo('null','Registrar',{},base_url+"index.php/CarteraInversion/itemCartera",'GET',null,null,false,true);
                                                            ><span class="fa fa-plus-circle"></span> Nuevo</button>
                                                          <div class="x_title">


                                                            <ul class="nav navbar-right panel_toolbox">

                                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                              </li>

                                                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                              </li>

                                                            </ul>

                                                            <div class="clearfix"></div>

                                                          </div>
                                                          <div class="x_content">
                                                            <table id="table-CarteraInv" class="table table-condensed table-striped table-bordered table-hover table table-striped table-bordered nowrap" width="100%">
                                                              <thead>
                                                                 <tr>
                                                                  <th>AÑO DE APERTURA</th>
                                                                  <th>FECHA INICIO CARTERA</th>
                                                                  <th>FECHA FIN CARTERA</th>
                                                                  <th>ESTADO CICLO</th>
                                                                  <th>NRO RESOLUCION</th>
                                                                  <th></th>
                                                                  <th class="col-sm-1"></th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                              </tbody>
                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                            </div>
                                         <!-- / fin  de la tabla de cartera de inersion row -->
                                        </div>
                                <!-- /  fin panel de cartera de inersion el row -->
                                          
                                      </div>
                                    </div>

                                  </div>
                                </div>
              </div>


          </div>
          <div class="clearfix"></div>
        </div>
     </div>




<!-- fin ventana para registrar una modalidad  de ejecucion -->
<div class="modal fade" id="CambioCartera" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
          <input type="text" id="AnioCartera">
          <center><p><h4>Mostrar Cartera 2017</h4></p>
          <button type="button" id="Btn_SiCartera" class="btn btn-info">Si</button>
          <button type="button" class="Btn_NoCartera">No</button></center>
        </div>

      </div>
      
    </div>
  </div>

