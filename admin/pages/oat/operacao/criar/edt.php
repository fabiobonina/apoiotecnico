            <?php
            $id1 = $_GET['id'];
            $resultado = $oat->find($id1);

            if(isset($_POS['edt1'])){
                $id = $_POS['id'];
                $resultado = $oat->find($id);
            ?>
		    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar sistema <small>Altere os dados</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
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
                                echo '<option value =',$resultado->localidade,'>',$resultado->localidade,'</option>';
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
                                echo '<option value =',$resultado->servico,'>',$resultado->servico,'</option>';
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
                            <?php echo '<select id="servico" name="servico" class="form-control col-md-7 col-xs-12" >';
                                echo '<option value =',$resultado->sistema,'>',$resultado->sistema,'</option>';
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
                        S:<input type="radio" class="flat" name="ativo" id="ativo0" value="0" <?php if($resultado->ativo == 0){?>checked="" <?php }?>  required />
                        N:<input type="radio" class="flat" name="ativo" id="ativo1" value="1" <?php if($resultado->ativo == 1){?>checked="" <?php }?>/>
                      </p>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $resultado->id; ?>"><br />
		                <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a type="submit" href="oat-operacao.php?acao=oat-criar" class="btn btn-primary">Cancelar</a>
                          <button type="submit" name="edt2" class="btn btn-success">Salvar</button>
                        </div>
                      </div>
		            </form>
                  </div>
                </div>
              </div>
            </div>
            <?php }else{ ?>
            <!--Editar-->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar OAT <small>Etapa 1/2</small></h2>
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
                        		<?php echo '<select id="cliente" name="cliente" class="form-control col-md-7 col-xs-12" ">';
                                      echo '<option value =',$resultado->cliente,'>',$resultado->cliente,'</option>';
                                      foreach($clientes->findAll() as $key => $value):if($value->ativo == 0) {
                                      echo '<option value =',$value->nick,'>',$value->nick,'</option>';
                                      }endforeach; echo '</select></br>';
                                ?>	
                        </div>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $resultado->id; ?>"><br />
		                  <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a type="submit" href="oat-operacao.php?acao=oat-criar" class="btn btn-primary">Cancelar</a>
                          <button type="submit" name="edt1" class="btn btn-success">Avançar</button>
                        </div>
                      </div>
		            </form>
                  </div>
                </div>
              </div>
            </div>

		<?php }?>