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
                if($oat->insert()){
                  echo "OAT aberta com sucesso!";
                }
              }
						endif;
						#ATUALIZAR
						if(isset($_POST['edt']) OR isset($_POST['edt2'])):
              $id = $_POST['id'];
              $user = $userNome;
							$cliente = $_POST['cliente'];
              if(isset($_POST['edt2'])){
                $localidade = $_POST['localidade'];
                $servico = $_POST['servico'];
                $sistema = $_POST['sistema'];
                $dataOat = date("Y-m-d H:i:s");
                $status = "0";
                $ativo = $_POST['ativo'];

                $oat->setUser($user);
                $oat->setCliente($cliente);
                $oat->setLocalidade($localidade);
                $oat->setServico($servico);
                $oat->setSistema($sistema);
                $oat->setDataOat($dataOat);
                $oat->setStatus($status);
                $oat->setAtivo($ativo);

                if($oat->update($id)){
                  echo "OAT Atualizado com sucesso!";
                }
              }
						endif;
						#DELETAR
						if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
							$id = (int)$_GET['id'];
							if($oat->delete($id)){
								echo "Deletado com sucesso!";
							}
						endif;
            
				?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>OAT <small>Solicitar</small></h3>
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
          if(isset($_GET['acao1'])){
            $acao = $_GET['acao1'];	
            
            // cadastro
           if($acao=='editar'){include("admin/pages/oat/operacao/criar/edt.php");}	
            // exibicao
           if($acao=='oat-retorno'){include("admin/pages/oat-operacao/oatRetorno.php");
           }
          }else{
		          //include("pages/inicio.php");
                include("admin/pages/oat/operacao/criar/add.php");
          }
        ?>

            <div class="row">
              <!--Tabela Lista-->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>OAT<small>Solicitadas</small></h2>
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
                          <th>Usuario</th>
                          <th>Cliente</th>
                          <th>Localidade</th>
                          <th>Servico</th>
                          <th>Sistema</th>
                          <th>Data Solitação</th>
                          <th>Ativo</th>
                          <th>Ação</th>
                        </tr>
                      </thead>

                			<?php foreach($oat->findAll() as $key => $value):if($value->ativo == 0 && $value->status == 0) {
                        $oatId = $value->id;
                        $oatUsuario = $value->nickuser;
                        $oatCliente = $value->cliente;
                        $oatLocalId = $value->localidade;
                        $oatFilial = $value->filial;
                        $oatOs = $value->os;
                        $oatServId = $value->servico;
                        $oatSistId = $value->sistema;
                        $oatDataSol = $value->data_sol;
                        $oatAtivo = $value->ativo;
                        foreach($localidades->findAll() as $key => $value):if($value->id == $oatLocalId) {
                          $oatLocal = $value->nome;
                        }endforeach;             
                        foreach($servicos->findAll() as $key => $value):if($value->id == $oatServId) {
                          $oatServico = $value->descricao;
                        }endforeach;
                        foreach($sistemas->findAll() as $key => $value):if($value->id == $oatSistId) {
                          $oatSistema =  $value->descricao;
                        }endforeach;
                        
                      ?>
                      <tbody>
                        <tr>
                          <td><?php echo $oatId; ?></td>
                          <td><?php echo $oatUsuario; ?></td>
                          <td><?php echo $oatCliente; ?></td>
                          <td><?php echo $oatLocal; ?></td>
                          <td><?php echo $oatServico; ?></td>
                          <td><?php echo $oatSistema; ?></td>
                          <td><?php echo $oatDataSol; ?></td>
                          <td><?php echo $oatAtivo; ?></td>
                          <td>
                            <?php echo "<a href='oat-operacao.php?acao=oat-criar&acao1=editar&id=" . $oatId . "'><i class='fa  fa-edit'></i>Editar </a>"; ?>
                            <?php echo "<a href='oat-operacao.php?acao=oat-criar&acao1=deletar&id=" . $oatId . "' onclick='return confirm(\"Deseja realmente deletar?\")'><i class='fa  fa-trash-o'></i>Deletar</a>"; ?>
                          </td>
                        </tr>
                      </tbody>
                      <?php }endforeach; ?>

                    </table>
                  </div>
                </div>
              </div>
              <!--/Tabela Lista-->
            </div>
          </div>
        </div>
        <!-- /page content -->

