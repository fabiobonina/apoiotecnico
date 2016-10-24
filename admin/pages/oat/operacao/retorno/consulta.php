      <?php

      $id = $_GET['id'];
      $resultado = $oats->find($id);
 
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
                            <input type="text" disabled="disabled" name="id" value="<?php echo $resultado->id; ?>" disabled="disabled" class="col-md-3 col-xs-3">
                          </td>
                          <td>&nbsp;</td>
                          <td>Usuario:</td>
                          <td>
                            <input type="text" disabled="disabled" name="usuario" value="<?php echo $resultado->nickuser; ?>" class=" col-md-10 col-xs-10">
                          </td>
                          <td>&nbsp;</td>
                          <td>Sistema</td>
                          <td>
                            <?php foreach($sistemas->findAll() as $key => $value):if($value->id == $resultado->sistema) {
                            echo '<input type="text" id="first-name" name="sistema" value=',$value->descricao,' disabled="disabled" class=" col-md-10 col-xs-10">';
                                }endforeach;
                            ?>
                          </td>
                        </tr>
                        <!--/1#-->
                        <td>&nbsp;</td>
                        <!--2#-->
                        <tr>
                          <td >Filial:</td>
                          <td>
                            <input type="text" name="filial" value="<?php echo $resultado->filial; ?>" disabled="disabled" class=" col-md-3 col-xs-3">
                          </td>
                          <td>&nbsp;</td>
                          <td >Cliente:</td>
                          <td>
                                <input type="text" name="cliente" value="<?php echo $resultado->cliente; ?>" disabled="disabled" class="col-md-10 col-xs-10">
                          </td>
                          <td>&nbsp;</td>
                          <td >Serviço:</td>
                          <td>
                              <?php foreach($servicos->findAll() as $key => $value):if($value->id == $resultado->servico) {
                              echo '<input type="text" id="first-name" name="servico" value=',$value->descricao,' disabled="disabled" class=" col-md-10 col-xs-10">';
                                  }endforeach;
                              ?>
                          </td>
                        </tr>
                        <!--/2#-->
                        <td>&nbsp;</td>
                        <!--3#-->
                          <tr>
                            <td>OS:</td>
                          <td>
                            <input type="text" disabled="disabled" name="os" value="<?php echo $resultado->os; ?>" class="col-md-3 col-xs-3"><br />
                          </td>
                          <td>&nbsp;</td>
                          <td>Local:</td>
                          <td>
                            <?php foreach($localidades->findAll() as $key => $value):if($value->id == $resultado->localidade) {
                              echo '<input type="text" id="localidade" name="localidade" value=',$value->nome,' disabled="disabled" class="col-md-10 col-xs-10">';
                              }endforeach;
                            ?>	
                          </td>
                            <td>&nbsp;</td>
                            <td class="pT12 pL4">Data:</td>
                          <td>
                            <input type="text" disabled="disabled" name="dataSol" value="<?php echo $resultado->data_sol; ?>"class="col-md-10 col-xs-10">
                          </td>
                        </tr>
                        <!--/3#-->
                      </tbody>
                    </table>


                   <form id="demo-form2" data-parsley-validate method="get" action="" class="form-horizontal form-label-left">
                      <input type="hidden" name="id" value="<?php $id; ?>"><br />
		                  <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a type="submit" href="oat-operacao.php?acao=oat-retorno&acao1=consulta&id=<?php $id ?>" class="btn btn-primary">Cancelar</a>
                          <a type="submit" href="oat-operacao.php?acao=oat-retorno&acao1=consulta&id=<?php $id ?>&acao2=descAdd" class='btn btn-success' ><i class='fa  fa-edit'></i>Editar </a>"; ?>
                        </div>
                      </div>
		                </form>
                  </div>
                </div>
              </div>

        <?php
          if(isset($_GET['acao2'])){
            $acao = $_GET['acao2'];
           if($acao=='descAdd'){include("admin/pages/oat/operacao/retorno/descAdd.php");}	
            // cadastro
           if($acao=='descEdt'){include("admin/pages/oat/operacao/retorno/descEdt.php");}
          }else{
        ?>
            <div class="row">
              <!--Tabela Lista-->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista<small>Descrição</small></h2>
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
                        </tr>
                      </thead>

                			<?php foreach($descricoes->findAll() as $key => $value):if($value->oat == $id ) { ?>
                      <tbody>
                        <tr>
                          <td><?php echo $value->id; ?></td>
                          <td><?php echo $value->descricao; ?></td>
                          <td>
                            <?php echo "<a href='oat-operacao.php?acao=oat-retorno&acao1=consultat&id=" . $id . "'><i class='fa  fa-edit'></i>Amarar OS </a>"; ?>
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
