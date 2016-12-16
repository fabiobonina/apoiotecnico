				<style>

.tg  {
    border-spacing:0;
    border:none;
    margin-top: 10px;
    border-radius: 20px;
    border: 1px solid #d4d4d4;
    box-shadow: 1px 1px 1px #d4d4d4;
    width: 178px;
    height: 100px;
    float: left;
    margin-left: 10px;
    background-color:#efefef;
    }
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 25px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 25px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg .tb-header{font-weight:bold;font-size:15px;color:#333333;}
.tg .tg-teste{font-size:0px;}
.tg .tg-body1{font-weight:bold; font-size:15px;color:#3166ff;text-align:center}
.tg .tg-body2{font-weight:bold; font-size:13px;color:#3166ff}
.tg .tg-body3{font-size:12px;color: #333333;}
.tg .tg-body4{font-size:10px;color:#333333;}
.tg .tg-footer{text-align:right}

</style>

        <?php

					$oat = new Oats();
          $usuarios = new Usuarios();
          $clientes = new Clientes();
          $localidades = new Localidades();
          $sistemas = new Sistemas();
          $servicos = new Servicos();
						#ADD
						if(isset($_POST['cadastrar'])):
              $user = $_POST['usuario'];
							$localidade = $_POST['localId'];
              foreach($localidades->findAll() as $key => $value):if($value->id == $localidade) {
              $cliente = $value->cliente;
              }endforeach;
              $servico = $_POST['servico'];
              $sistema = $_POST['sistema'];
              $data = $_POST['data'];
              $dataOat = date("Y-m-d H:i:s");
              $status = "0";
              $ativo = "0";

              $oat->setUser($user);
              $oat->setCliente($cliente);
              $oat->setLocalidade($localidade);
              $oat->setServico($servico);
              $oat->setSistema($sistema);
              $oat->setData($data);
              $oat->setDataOat($dataOat);
              $oat->setStatus($status);
              $oat->setAtivo($ativo);
              # Insert
              if($oat->insert()){
                echo '<div class="alert alert-success">
					          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Inserido com sucesso!</strong> Redirecionando ...
                    </div>';
                 header("Refresh: 1, oat-operacao.php?acao=criar");	
              }

						endif;
						#ATUALIZAR
						if(isset($_POST['editar'])):
              $oatId = $_POST['oatId'];
              $user = $_POST['usuario'];
							$data = $_POST['data'];
							$localidade = $_POST['localId'];
              foreach($localidades->findAll() as $key => $value):if($value->id == $localidade) {
              $cliente = $value->cliente;
              }endforeach;
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
                $oat->setData($data);
                $oat->setDataOat($dataOat);
                $oat->setStatus($status);
                $oat->setAtivo($ativo);

                if($oat->update($oatId)){
                  echo '<div class="alert alert-success">
					          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Atualizada com sucesso!</strong> Redirecionando ...
                    </div>';
                  header("Refresh: 1, oat-operacao.php?acao=criar");	
                }
						endif;
						#DELETAR
						if(isset($_GET['acao1']) && $_GET['acao1'] == 'deletar'):
							$oatId = (int)$_GET['oatId'];
							if($oat->delete($oatId)){
								echo '<div class="alert alert-success">
					          <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Deletada com sucesso!</strong> Redirecionando ...
                    </div>';
                header("Refresh: 1, oat-operacao.php?acao=criar");	
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
              if($acao=='edt'){include("admin/pages/oat/operacao/criar/edt.php");}	
                // exibicao
              if($acao=='add'){include("admin/pages/oat/operacao/criar/add.php");
              }
              
              }
            ?>

            <div class="row">
              <!--Tabela Lista-->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><form data-parsley-validate method="get" action="">
                      <a type="submit" href="oat-operacao.php?acao=criar&acao1=add" ><i class='fa  fa-plus'></i>Solicitar OS</a>
		                </form></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                  </div>
                </div>
              </div>
              <!--/Tabela Lista-->

              <?php foreach($oat->findAll() as $key => $value):if($value->ativo == 0 && $value->status == 0 ) {
                        $oatId = $value->id;
                        $oatUsuario = $value->nickuser;
                        $oatCliente = $value->cliente;
                        $oatLocalId = $value->localidade;
                        $oatFilial = $value->filial;
                        $oatOs = $value->os;
                        $oatServId = $value->servico;
                        $oatSistId = $value->sistema;
                        $oatData = $value->data;
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
             <div class="col-md-4 col-sm-12 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2><?php echo $oatCliente; ?> | <?php echo $oatLocal; ?></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">
                    <ul class="quick-list">
                      <li><a href="#"><?php echo $oatSistema; ?></a></li>
                      <li><a href="#"><?php echo $oatServico; ?></a></li>
                      <li><i class="fa fa-bar-chart"></i><a href="#"><?php echo $oatUsuario; ?></a></li>
                      <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a></li>
                      <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a></li>
                    </ul>
                    <div class="sidebar-widget">
                      <h3><?php echo $oatFilial; ?> | <?php echo $oatOs; ?></h3>
                      <canvas width="150" height="80" id="foo" class="" style="width: 70px; height: 20px;"></canvas>
                      <div class="goal-wrapper">
                        <span class="gauge-value pull-left"></span>
                        <span id="gauge-text" class="gauge-value pull"><?php echo $oatData; ?></span>
                        <span id="goal-text" class="goal-value pull-right"></span>
                      </div>
                      <img src="images/geolocation.png" alt="">
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><?php echo "<a href='oat-operacao.php?acao=criar&acao1=edt&oatId=" . $oatId . "'><i class='fa  fa-edit'></i>Editar </a>"; ?></li>
                    &nbsp;
                    <li><?php echo "<a href='oat-operacao.php?acao=criar&acao1=deletar&oatId=" . $oatId . "' onclick='return confirm(\"Deseja realmente deletar?\")'><i class='fa  fa-trash-o'></i>Deletar</a>"; ?></li>
                    &nbsp;
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
                </div>
              </div>
            </div>


<?php }endforeach; ?>

 

              </div>
            </div>
          </div>

<style>

.tg  {
    border-spacing:0;
    border:none;
    margin-top: 10px;
    border-radius: 20px;
    border: 1px solid #d4d4d4;
    box-shadow: 1px 1px 1px #d4d4d4;
    width: 178px;
    height: 100px;
    float: left;
    margin-left: 10px;
    background-color:#efefef;
    }
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 25px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 25px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg .tb-header{font-weight:bold;font-size:15px;color:#333333;}
.tg .tg-teste{font-size:0px;}
.tg .tg-body1{font-weight:bold; font-size:15px;color:#3166ff;text-align:center}
.tg .tg-body2{font-weight:bold; font-size:13px;color:#3166ff}
.tg .tg-body3{font-size:12px;color: #333333;}
.tg .tg-body4{font-size:10px;color:#333333;}
.tg .tg-footer{text-align:right}

/*body {
    margin:0;
    padding:0;
    color:#000;
    background:#fff;
}*/
#geral {
    width:33%;
    margin:0 auto;
    background:#ddd;
    margin-top: 10px;
    float: left;
    margin-left: 10px;
}

#cabecalho {
    padding:10px;
    background:#fdd;
}
#conteudo-1 {
    float:left;
     /* diminuimos a largura para não quebrar o layout. 
      * valor antigo 220
      */
    width:20%;
    padding:3px;
    background:#bfb;
    text-align:center;
    font-size: 10px;
    color:#3166ff;
}
#conteudo-2-lado1 {
    float:left;
    width:35%;
    padding:5px;
    background:#ddf;
    font-size: 10px;

}
#conteudo-2-lado2 {
    float:left;
    /*diminuimos a largura para não quebrar o layout
    * valor antigo 220
    */
    width:35%;
    padding:5px;
    background:#dff;
    color:#333333;
    font-size: 10px;
}
#conteudo-3-lado1 {
    float:left;
    width:35%;
    padding:5px;
    background:#ddf;

}
#conteudo-3-lado3 {
    float:left;
    /*diminuimos a largura para não quebrar o layout
    * valor antigo 220
    */
    width:35%;
    padding:5px;
    background:#dff;
    color:#333333;
    font-size: 8px;
}
#conteudo-2-lado3 {
    float:right;
    /*diminuimos a largura para não quebrar o layout
    * valor antigo 220
    */
    width:10%;
    padding:25px;
    background:#dff;
    color:#333333;
    
}
#rodape {
    clear:both;
    padding:10px;
    background:#ff9;
}


</style>
                			<?php foreach($oat->findAll() as $key => $value):if($value->ativo == 0 && $value->status == 0 ) {
                        $oatId = $value->id;
                        $oatUsuario = $value->nickuser;
                        $oatCliente = $value->cliente;
                        $oatLocalId = $value->localidade;
                        $oatFilial = $value->filial;
                        $oatOs = $value->os;
                        $oatServId = $value->servico;
                        $oatSistId = $value->sistema;
                        $oatData = $value->data;
                        $oatAtivo = $value->ativo;
                        $oatDataSol = $value->data_sol;
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


<div id="geral">
    <div id="cabecalho"><?php echo $oatCliente; ?> | <?php echo $oatLocal; ?></div>
    <div id="principal">
        <div id="conteudo-1" rows="3"><h5 font-size="5"><?php echo $oatFilial; ?> | <?php echo $oatOs; ?></h5><br/><h7><?php echo $oatData; ?></h7></div>
        <div id="conteudo-2">
            <div id="conteudo-2-lado1"><?php echo $oatSistema; ?></div>
            <div id="conteudo-2-lado2"><?php echo $oatServico; ?></div>
            <div id="conteudo-2-lado3" >GPS</div>
            <div id="conteudo-3-lado1"><?php echo $oatUsuario; ?></div>
            <div id="conteudo-3-lado2">Sol. <?php echo $oatDataSol; ?></div>
        </div>
    </div>
    <div id="rodape">
    OS     CON
      <?php echo "<a href='oat-operacao.php?acao=criar&acao1=edt&oatId=" . $oatId . "'><i class='fa  fa-edit'></i>Editar </a>"; ?>&nbsp;
      <?php echo "<a href='oat-operacao.php?acao=criar&acao1=deletar&oatId=" . $oatId . "' onclick='return confirm(\"Deseja realmente deletar?\")'><i class='fa  fa-trash-o'></i>Deletar</a>"; ?></div>
</div>


<?php }endforeach; ?>

        </div>
        <!-- /page content -->

