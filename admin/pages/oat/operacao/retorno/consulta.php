      <?php

      $id = $_GET['id'];
      $resultado = $oats->find($id);
      $oatId = $resultado->id;
      $oatUsuario = $resultado->nickuser;
      $oatFilial = $resultado->filial;
      $oatOs = $resultado->os;
      $oatCliente = $resultado->cliente;
      $oatLocalId = $resultado->localidade;
      foreach($localidades->findAll() as $key => $value):if($value->id == $oatLocalId) {
        $oatLocal = $value->nome;
      }endforeach;             
      foreach($servicos->findAll() as $key => $value):if($value->id == $resultado->servico) {
        $oatServico = $value->descricao;
      }endforeach;
      foreach($sistemas->findAll() as $key => $value):if($value->id == $resultado->sistema) {
        $oatSistema =  $value->descricao;
      }endforeach;
      
      $oatDataSol = $resultado->data_sol; 

      ?>

            <div class="row">
              <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Basic Tables <small>basic table subtitle</small></h2>
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

                    <table class="table1">
                      <tbody>
                      <!--1#-->
                        <tr>
                          <td>OAT:</td>
                          <td>
                            <input type="text" disabled="disabled" name="id" value="<?php echo $oatId; ?>" disabled="disabled" class="col-md-3 col-xs-3">
                          </td>
                          <td>&nbsp;</td>
                          <td>Usuario:</td>
                          <td>
                            <input type="text" disabled="disabled" name="usuario" value="<?php echo $oatUsuario; ?>" class=" col-md-10 col-xs-10">
                          </td>
                          <td>&nbsp;</td>
                          <td>Sistema</td>
                          <td>
                            <input type="text" id="first-name" name="sistema" value="<?php echo $oatSistema; ?>" disabled="disabled" class=" col-md-10 col-xs-10">
                          </td>
                        </tr>
                        <!--/1#-->
                        <td>&nbsp;</td>
                        <!--2#-->
                        <tr>
                          <td >Filial:</td>
                          <td>
                            <input type="text" name="filial" value="<?php echo $oatFilial; ?>" disabled="disabled" class=" col-md-3 col-xs-3">
                          </td>
                          <td>&nbsp;</td>
                          <td >Cliente:</td>
                          <td>
                            <input type="text" name="cliente" value="<?php echo $oatCliente; ?>" disabled="disabled" class="col-md-10 col-xs-10">
                          </td>
                          <td>&nbsp;</td>
                          <td >Serviço:</td>
                          <td>
                            <input type="text" id="first-name" name="servico" value="<?php echo $oatServico; ?>" disabled="disabled" class=" col-md-10 col-xs-10">
                          </td>
                        </tr>
                        <!--/2#-->
                        <td>&nbsp;</td>
                        <!--3#-->
                          <tr>
                            <td>OS:</td>
                          <td>
                            <input type="text" disabled="disabled" name="os" value="<?php echo $oatOs; ?>" class="col-md-3 col-xs-3"><br />
                          </td>
                          <td>&nbsp;</td>
                          <td>Local:</td>
                          <td>
                            <input type="text" id="localidade" name="localidade" value="<?php echo $oatLocal; ?>" disabled="disabled" class="col-md-10 col-xs-10">
                          </td>
                            <td>&nbsp;</td>
                            <td class="pT12 pL4">Data:</td>
                          <td>
                            <input type="text" disabled="disabled" name="dataSol" value="<?php echo $oatDataSol; ?>"class="col-md-10 col-xs-10">
                          </td>
                        </tr>
                        <!--/3#-->
                      </tbody>
                    </table>


                   <form id="demo-form2" data-parsley-validate method="post" action="" class="form-horizontal form-label-left">
                      <input type="hidden" name="id" value="<?php $oatId; ?>"><br />
		                  <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="javascript:window.history.go(-1)" class="btn btn-primary">Voltar</a>
                          <?php echo "<button href='oat-operacao.php?acao=oat-criretornoar&acao1=fechar&id=" . $oatId . "' onclick='return confirm(\"Deseja realmente Fechar OAT?\")' class='btn btn-success'><i class='fa  fa-check-square-o'></i>Fechar OAT</button>"; ?>
                        </div>
                      </div>
		                </form>
                  </div>
                </div>
              </div>
            <div class="row">
              <!--Tabela Ativo-->
              <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Ativo </small>
                    <form data-parsley-validate method="get" action="">
                      <a type="submit" href="oat-operacao.php?acao=oat-retorno&acao1=consulta&id=<?php echo $id ?>&acao2=ativAdd" ><i class='fa  fa-plus'></i>Adicionar</a>
		                </form></h2>
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

                			<?php foreach($ativos->findAll() as $key => $value):if($value->cliente == $oatCliente && $value->localidade == $oatLocal ) { 
                         $ativoId = $value->id;
                         $ativoPlaq = $value->plaqueta;
                        ?>
                      <tbody>
                        <tr>
                          <td><?php echo $ativoPlaq; ?></td>
                          <td>
                            <?php echo "<a href='oat-operacao.php?acao=oat-retorno&acao1=consulta&id=". $oatId ."&acao2=descEdt&cod=".$ativoId."'><i class='fa  fa-edit'></i>Editar</a>"; ?>
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
           if($acao=='descAdd'){include("admin/pages/oat/operacao/retorno/descAdd.php");}	
            // cadastro
           if($acao=='descEdt'){include("admin/pages/oat/operacao/retorno/descEdt.php");}
           if($acao=='ativAdd'){include("admin/pages/oat/operacao/retorno/ativAdd.php");}
           if($acao=='ativEdt'){include("admin/pages/oat/operacao/retorno/ativEdt.php");}
          }else{
        ?>
            <div class="row">
              <!--Tabela Lista-->
              <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Descrição </small>
                    <form data-parsley-validate method="get" action="">
                      <a type="submit" href="oat-operacao.php?acao=oat-retorno&acao1=consulta&id=<?php echo $id ?>&acao2=descAdd" ><i class='fa  fa-plus'></i>Adicionar</a>
		                </form></h2>
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
                            <?php echo "<a href='oat-operacao.php?acao=oat-retorno&acao1=consulta&id=". $oatId ."&acao2=descEdt&cod=".$value->id."'><i class='fa  fa-edit'></i>Editar</a>"; ?>
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
         <?php  }  ?>
