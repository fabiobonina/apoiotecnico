				<?php

					$oats = new Oats();
          $usuarios = new Usuarios();
          $clientes = new Clientes();
          $localidades = new Localidades();
          $sistemas = new Sistemas();
          $servicos = new Servicos();
          $descricoes = new Descricoes();

          #DESCRICAO ADD
          if(isset($_POST['DescAdd'])):
            $oat = $_POST['oat'];
            $descricao = $_POST['descricao'];

            $descricoes->setOat($oat);
            $descricoes->setDescricao($descricao);
            # Insert
            if($descricoes->insert()){
              echo "Descricao salva com sucesso!";
              header("Refresh: 1, oat-operacao.php?acao=oat-retorno&acao1=consulta&id=' $oat '");	
            }
          endif;

          #DESCRICAO Editar
          if(isset($_POST['descEdt'])):
            $oat = $_POST['oat'];
            $descricao = $_POST['descricao'];

            $descricoes->setOat($oat);
            $descricoes->setDescricao($descricao);

            if($descricao->update($id)){
              echo "Descricao salvo com Sucesso!";
              header("Refresh: 1, oat-operacao.php?acao=oat-retorno&acao1=consulta&id=' $oat '");	
            }
					endif;
						#RETORNO
						if(isset($_POST['retorno'])):
              $id = $_POST['id'];
              $os = $_POST['os'];
              $dataFech = date("Y-m-d H:i:s");
              $status = "2";

              $oats->setOs($os);
              $oats->setDataFech($dataFech);
              $oats->setStatus($status);

              if($oats->retrono($id)){
                echo "OAT Fechada!";
                header("Refresh: 1, oat-operacao.php?acao=oat-retrono");	
              }
						endif;

				?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>OAT <small>Abertas</small></h3>
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
              if($acao=='consulta'){include("admin/pages/oat/operacao/retorno/consulta.php");}
              if($acao=='descEdt'){include("admin/pages/oat/operacao/retorno/descEdt.php");}
              }else{
                  include("admin/pages/oat/operacao/retorno/retorno.php");
              }
            ?>

          </div>
        </div>
        <!-- /page content -->

