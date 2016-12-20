      <?php

      $oatId = $_GET['oat'];
      $resultado = $oats->find($oatId);
      $oatUsuario = $resultado->nickuser;
      $oatFilial = $resultado->filial;
      $oatOs = $resultado->os;
      $oatCliente = $resultado->cliente;
      $oatLocalId = $resultado->localidade;           
      $oatServId = $resultado->servico;
      $oatSistId = $resultado->sistema;
      $oatData = $resultado->data;
      $oatAtivo = $resultado->ativo;
      $oatDataSol = $resultado->data_sol;
      $oatStatus = $resultado->status;
      foreach($localidades->findAll() as $key => $value):if($value->id == $oatLocalId) {
          $oatLocal = $value->nome;
          $oatLat = $value->latitude;
          $oatLong = $value->longitude;
      }endforeach;             
      foreach($servicos->findAll() as $key => $value):if($value->id == $oatServId) {
        $oatServico = $value->descricao;
      }endforeach;
      foreach($sistemas->findAll() as $key => $value):if($value->id == $oatSistId) {
        $oatSistema =  $value->descricao;
      }endforeach;
      
      $oatDataSol = $resultado->data_sol; 

      ?>

                  <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2><?php echo $oatCliente; ?> | <?php echo $oatLocal; ?></h2>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div class="dashboard-widget-content">
                          <ul class="quick-list">
                            <li><a href="#"><?php echo $oatSistema; ?></a></li>
                            <li><a href="#"><?php echo $oatServico; ?></a></li>
                            <li><a href="#"><?php echo $oatUsuario; ?></a></li>
                            <li><a href="#">Sol. <?php echo $oatDataSol; ?></a></li>
                            <li><a href="#">N° AOT: <?php echo $oatId; ?></a></li>
                          </ul>
                          <div class="sidebar-widget">
                            <h3><?php echo $oatFilial; ?> | <?php echo $oatOs; ?></h3>
                            <canvas width="150" height="80" id="foo" class="" style="width: 70px; height: 20px;"></canvas>
                            <div class="goal-wrapper">
                              <span class="gauge-value pull-left"></span>
                              <span id="gauge-text" class="gauge-value pull"><?php echo $oatData; ?></span>
                              <span id="goal-text" class="goal-value pull-right"></span>
                            </div>
                              <?php 
                              if($oatLat <> 0 && $oatLong <> 0){
                              echo "<a href='https://maps.google.com/maps?q=". $oatLat ."%2C". $oatLong ."&z=17&hl=pt-BR' target='_blank'><img src='images/geolocation.png' alt=''></a>";
                              }else{
                              echo "<a ><img src='images/geolocation-sem.png'></a>";
                              }
                              ?>
                          </div>
                        </div>
                          <div class="ln_solid"></div>
                        <ul class="nav navbar-right panel_toolbox">
                          <?php if($oatStatus == 1){ ?>
                          <form id="demo-form2" data-parsley-validate method="post" action="" class="form-horizontal form-label-left">
                            <input type="hidden" name="oat" value="<?php echo $oatId; ?>"><br />
                            <a href="<?php echo $redirecionar_1; ?>" class="btn btn-primary btn-xs">Voltar</a>
                            <button type="button" class="btn btn-dark btn-xs" data-toggle="modal" data-target=".modal-oatEdt<?php echo $oatId; ?>"><i class='fa  fa-edit'></i> EDT</a></button>
                            <?php echo "<button type='submit' name='fechar' ' onclick='return confirm(\"Deseja realmente Fechar OAT?\")' class='btn btn-success btn-xs'><i class='fa  fa-check-square-o'></i>Encerrar OAT</button>"; ?>
                          </form>
                          <?php }else{       ?>
                          <li><a href="<?php echo $redirecionar_1; ?>" class="btn btn-primary">Voltar</a></li>
                          <li><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm<?php echo $oatId; ?>"><i class='fa  fa-sign-in'></i> OS</button></li>
                          <li><button type="button" class="btn btn-dark btn-xs" data-toggle="modal" data-target=".modal-oatEdt<?php echo $oatId; ?>"><i class='fa  fa-edit'></i> ALT</a></button></li>
                          <?php echo "<a href='". $redirecionar_1 ."&acao1=deletar&oatId=" . $oatId . "' class='btn btn-danger btn-xs' onclick='return confirm(\"Deseja realmente deletar?\")'><i class='fa  fa-trash-o'></i> DEL</a>"; ?>
                          <li><a href="<?php echo $redirecionar_1; ?>" class="btn btn-primary">Voltar</a></li>
                          <?php echo "<button type='submit' name='fechar' ' onclick='return confirm(\"Deseja realmente Fechar OAT?\")' class='btn btn-success'><i class='fa  fa-check-square-o'></i>Fechar OAT</button>"; ?>
                          
                          <?php } ?>
                        </ul>
                      </div>
                      <?php include( $includ_1."edt.php"); ?>
                    </div>
                  </div>
            <div class="row">
              <!--Tabela Ativo-->
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Ativo </small>

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
                    <table id="table" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>N.Plaqueta</th>
                          <th>Ação</th>
                        </tr>
                      </thead>

                			<?php foreach($ativos->findAll() as $key => $value):if($value->cliente == $oatCliente && $value->localidade == $oatLocalId ) { 
                         $ativoId = $value->id;
                         $ativoPlaq = $value->plaqueta;
                        ?>
                      <tbody>
                        <tr>
                          <td><?php echo $ativoPlaq; ?></td>
                          <td>
                            <?php echo "<a href='oat-operacao.php?acao=finalizar&acao1=consulta&oat=". $oatId ."&acao2=ativEdt&cod=".$ativoId."'><i class='fa  fa-edit'></i>Editar</a>"; ?>
                            <?php echo "<a href='oat-operacao.php?acao=finalizar&acao1=consulta&oat=" . $oatId . "&acao2=ativDel&cod=".$ativoId." ' onclick='return confirm(\"Deseja realmente deletar?\")'><i class='fa  fa-trash-o'></i>Deletar</a>"; ?>
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

        <?php
          if(isset($_GET['acao2'])){
            $acao = $_GET['acao2'];
           if($acao=='descCons'){include("admin/pages/oat/operacao/finalizar/descCons.php");}	
            // cadastro
           if($acao=='descEdt'){include("admin/pages/oat/operacao/finalizar/descEdt.php");}
           if($acao=='ativAdd'){include("admin/pages/oat/operacao/finalizar/ativAdd.php");}
           if($acao=='ativEdt'){include("admin/pages/oat/operacao/finalizar/ativEdt.php");}
          }else{
        ?>
            <div class="row">
              <!--Tabela Lista-->
              <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Descrição </small></h2>
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
                    <table id="table" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Descrição</th>
                          <th>Ação</th>
                        </tr>
                      </thead>

                			<?php foreach($descricoes->findAll() as $key => $value):if($value->oat == $oatId ) { ?>
                      <tbody>
                        <tr>
                          <td><?php echo $value->id; ?></td>
                          <td><?php echo $value->descricao; ?></td>
                          <td>
                            <?php echo "<a href='oat-operacao.php?acao=finalizar&acao1=consulta&oat=". $oatId ."&acao2=descEdt&cod=".$value->id."'><i class='fa  fa-edit'></i>Editar</a>"; ?>
                            <?php echo "<a href='oat-operacao.php?acao=finalizar&acao1=consulta&oat=". $oatId. "&acao2=descCons&cod=".$value->id."'><i class='fa  fa-eye'></i>Visializar</a>";?>
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
         <?php  }  
         
         include( $includ_ativo."ativoAdd.php");
         
         ?>

         