
              <?php
              if(isset($_POST['add1'])){
              ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Nova OAT <small>Etapa 2/2</small></h2>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Localidade <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo '<select id="localidade" name="localidade" class="form-control col-md-7 col-xs-12" >';
                                foreach($localidades->findAll() as $key => $value):if($value->ativo == 0 && $value->cliente == $cliente) {
                                echo '<option value =',$value->id,'>',$value->nome,'</option>';
                                }endforeach;
                                echo '</select></br>';
                            ?>	
                        </div>
                      </div>
                      <input type="hidden" id="cliente" name="cliente" value="<?php echo $cliente; ?>"  size=30 maxlength=30 required="required" class="form-control col-md-7 col-xs-12">
                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Servico <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo '<select id="servico" name="servico" class="form-control col-md-7 col-xs-12" >';
                                foreach($servicos->findAll() as $key => $value):if($value->ativo == 0) {
                                echo '<option value =',$value->id,'>',$value->descricao,'</option>';
                                }endforeach;
                                echo '</select></br>';
                            ?>	
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sistema <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo '<select id="sistema" name="sistema" class="form-control col-md-7 col-xs-12" >';
                                foreach($sistemas->findAll() as $key => $value):if($value->ativo == 0) {
                                echo '<option value =',$value->id,'>',$value->descricao,'</option>';
                                }endforeach;
                                echo '</select></br>';
                            ?>
                        </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ativo <span class="required">*</span></label>
                        <p>
                          S:<input type="radio" class="flat" name="ativo" id="ativo0" value="0" checked="" required />
                          N:<input type="radio" class="flat" name="ativo" id="ativo1" value="1" />
                        </p>
                      </div>

		                <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a type="submit" href="oat-operacao.php?acao=oat-criar" class="btn btn-primary">Cancelar</a>
                          <button type="submit" name="add2" class="btn btn-success">Cadastrar</button>
                        </div>
                      </div>
		                </form>
                  </div>
                </div>
              </div>
            </div>
            <?php }else{ ?>
		        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Novo OAT <small>Etapa 1/2</small></h2>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        				<?php echo '<select id="cliente" name="cliente" class="form-control col-md-7 col-xs-12" onchange="buscar_cidades();">';
                                      foreach($clientes->findAll() as $key => $value):if($value->ativo == 0) {
                                      echo '<option value =',$value->nick,'>',$value->nick,'</option>';
                                      }endforeach; echo '</select></br>';
                                ?>	
                        </div>
                      </div>
                          <label>Cliente:</label>
                      <input type="text" id="txtCliente" name="txtCliente" size="60"/>
		                  <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a type="submit" href="oat-operacao.php?acao=oat-criar" class="btn btn-primary">Cancelar</a>
                          <button type="submit" name="add1" class="btn btn-success">Avançar</button>
                        </div>
                      </div>
		                </form>
                  </div>
                </div>
              </div>
            </div>
        <!--Cliente-->

        <?php } ?>