      <?php

      $id = $_GET['id'];
      $resultado = $oat->find($id);
 
      ?>

		    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar sistema <small>Altere os dados</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a></li>
                          <li><a href="#">Settings 2</a></li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate method="post" action="" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Filial <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="filia" name="filial" required="required" size=2 maxlength=2 style="text-transform:uppercase;" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">OS <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="os" name="os" required="required" size=6 maxlength=6 class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="cliente" value="<?php echo $resultado->cliente; ?>"  disabled="disabled" size=30 maxlength=30 required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Localidade <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php foreach($localidades->findAll() as $key => $value):if($value->id == $resultado->localidade) {
                            echo '<input type="text" id="localidade" name="localidade" value=',$value->nome,' disabled="disabled" class="form-control col-md-7 col-xs-12">';
                                }endforeach;
                            ?>	
                        </div>
                      </div>
                      <input type="hidden" id="cliente" name="cliente" value="<?php echo $cliente; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Servico <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php foreach($servicos->findAll() as $key => $value):if($value->id == $resultado->servico) {
                            echo '<input type="text" id="first-name" name="servico" value=',$value->descricao,' disabled="disabled" class="form-control col-md-7 col-xs-12">';
                                }endforeach;
                            ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sistema <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php foreach($sistemas->findAll() as $key => $value):if($value->id == $resultado->sistema) {
                            echo '<input type="text" id="first-name" name="sistema" value=',$value->descricao,' disabled="disabled" class="form-control col-md-7 col-xs-12">';
                                }endforeach;
                            ?>
                        </div>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $resultado->id; ?>"><br />
		                <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a type="submit" href="oat-operacao.php?acao=amarar" class="btn btn-primary">Cancelar</a>
                          <button type="submit" name="amarar" class="btn btn-success">Salvar OS</button>
                        </div>
                      </div>
		                </form>
                  </div>
                </div>
              </div>
            </div>
            <!--Editar-->
