				<?php

					$oat = new Oats();
          $usuarios = new Usuarios();
          $clientes = new Clientes();
          $localidades = new Localidades();
          $sistemas = new Sistemas();
          $servicos = new Servicos();
						#ADD
						if(isset($_POST['add1']) OR isset($_POST['add2'])):
              $user = $userNome;
							$cliente = $_POST['cliente'];
              if(isset($_POST['add2'])){
                $localidade = $_POST['localidade'];
                $servico = $_POST['servico'];
                $sistema = $_POST['sistema'];
                $dataOat = date("Y-m-d H:i:s");
                $status = "0";
                $ativo = "0";

                $oat->setUser($user);
                $oat->setCliente($cliente);
                $oat->setLocalidade($localidade);
                $oat->setServico($servico);
                $oat->setSistema($sistema);
                $oat->setDataOat($dataOat);
                $oat->setStatus($status);
                $oat->setAtivo($ativo);
                # Insert
                if($sistema->insert()){
                  echo "OAT aberta com sucesso!";
                }
              }
						endif;
						#ATUALIZAR
						if(isset($_POST['atualizar'])):

              $user = $_POST['user'];
							$cliente = $_POST['cliente'];
              $localidade = $_POST['localidade'];
              $servico = $_POST['servico'];
              $sistema = $_POST['sistema'];
              $dataOat = date("Y-m-d H:i:s");
							$ativo = $_POST['ativo'];

              $oat->setUser($user);
							$oat->setCliente($cliente);
							$oat->setLocalidade($localidade);
              $oat->setServico($servico);
							$oat->setSistema($sistema);
              $oat->setDataOat($dataOat);
              $oat->setStatus($status);
							$oat->setAtivo($ativo);

							if($sistema->update($id)){
								echo "OAT Atualizado com sucesso!";
							}
						endif;
						#DELETAR
						if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
							$id = (int)$_GET['id'];
							if($sistema->delete($id)){
								echo "Deletado com sucesso!";
							}
						endif;
				?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Sistemas <small>Lista de dados</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
              <?php
              if(isset($_GET['acao1']) && $_GET['acao1'] == 'editar'){

                $id = $_GET['id'];
                $resultado = $sistema->find($id);
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="cliente" id="cliente" class="form-control col-md-7 col-xs-12">
                            <?php foreach($cliente->findAll() as $key => $value):if($value->ativo == 0) { ?>
                            <option value="<?php echo $value->nick; ?>"><?php echo $value->nick; ?></option>  
                            <?php } endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descrição <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="descricao" value="<?php echo $resultado->descricao; ?>"  size=30 maxlength=30 required="required" class="form-control col-md-7 col-xs-12">
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
                          <button type="submit" name="atualizar" class="btn btn-success">Salvar</button>
                        </div>
                      </div>

		                </form>
                  </div>
                </div>
              </div>
            </div>

		        <?php }else{ ?>
              <?php
              if(isset($_POST['add1'])){
              ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Nova OAT <small>Insira os dados 2/2</small></h2>
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
                          <select name="sistema" class="form-control col-md-7 col-xs-12" onChange="getStates(this);">
                            <?php foreach($sistemas->findAll() as $key => $value):if($value->ativo == 0) { ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->descricao; ?></option>  
                            <?php } endforeach; ?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Codigo <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="id" required="required" size=10 maxlength=10 style="text-transform:uppercase;" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descrição <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="descricao" required="required" size=30 maxlength=30 class="form-control col-md-7 col-xs-12">
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
                    <h2>Novo OAT <small>Insira os dados 1/2</small></h2>
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

		        <?php 
              }
            } ?>

            <div class="row">
              <!--Tabela Lista-->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista<small>Sistemas</small></h2>
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
                    <p class="text-muted font-13 m-b-30">
                      Dados da tabela.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Descrição</th>
                          <th>Ativo</th>
                          <th>Ação</th>
                        </tr>
                      </thead>

                			<?php foreach($oat->findAll() as $key => $value): ?>
                      <tbody>
                        <tr>
                          <td><?php echo $value->id; ?></td>
                          <td><?php echo $value->descricao; ?></td>
                          <td><?php echo $value->ativo; ?></td>
                          <td>
                            <?php echo "<a href='oat-operacao.php?acao=oat-criar&acao1=editar&id=" . $value->id . "'><i class='fa  fa-edit'></i>Editar </a>"; ?>
                            <?php echo "<a href='oat-operacao.php?acao=oat-criar&acao1=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'><i class='fa  fa-trash-o'></i>Deletar</a>"; ?>
                          </td>
                        </tr>
                      </tbody>
                      <?php endforeach; ?>

                    </table>
                  </div>
                </div>
              </div>
              <!--/Tabela Lista-->
            </div>
          </div>
        </div>
        <!-- /page content -->

