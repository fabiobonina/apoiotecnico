				<?php

					$oats = new Oats();
          $usuarios = new Usuarios();
          $clientes = new Clientes();
          $localidades = new Localidades();
          $sistemas = new Sistemas();
          $servicos = new Servicos();
          $descricoes = new Descricoes();
          $ativos = new Ativos();

          #ATIVO ADD
          if(isset($_POST['ativAdd'])):
            if(!isset($_POST['cliente']) OR !isset($_POST['localidade']) OR !isset($_POST['plaqueta'])){
              echo "Dados incopletos";
            }
            $cliente = $_POST['cliente'];
            $localidade = $_POST['localidade'];
            $plaqueta = $_POST['plaqueta'];

            $ativos->setCliente($cliente);
            $ativos->setLocalidade($localidade);
            $ativos->setPlaqueta($plaqueta);
            # Insert
            if($ativos->insert()){
              echo "Descricao salva com sucesso!";
              header("Refresh: 1, oat-operacao.php?acao=oat-retorno&acao1=consulta&id=". $oat );	
            }
          endif;

          #ATIVO Editar
          if(isset($_POST['ativEdt'])):
            if(!isset($_POST['cliente']) OR !isset($_POST['localidade']) OR !isset($_POST['plaqueta']) OR !isset($_POST['cod'])){
              echo "Dados incopletos";
            }
            $cliente = $_POST['cliente'];
            $localidade = $_POST['localidade'];
            $plaqueta = $_POST['plaqueta'];

            $ativos->setCliente($cliente);
            $ativos->setLocalidade($localidade);
            $ativos->setPlaqueta($plaqueta);

            if($ativos->update($id)){
              echo "Descricao salvo com Sucesso!";
              header("Refresh: 1, oat-operacao.php?acao=oat-retorno&acao1=consulta&id=". $oat);	
            }
					endif;

          #DESCRICAO ADD
          if(isset($_POST['descAdd'])):
            if(!isset($_POST['oat']) OR !isset($_POST['descricao'])){
              echo "Dados incopletos";
            }
            $oat = $_POST['oat'];
            $descricao = $_POST['descricao'];

            $descricoes->setOat($oat);
            $descricoes->setDescricao($descricao);
            # Insert
            if($descricoes->insert()){
              echo "Descricao salva com sucesso!";
              header("Refresh: 1, oat-operacao.php?acao=oat-retorno&acao1=consulta&id=". $oat );	
            }
          endif;

          #DESCRICAO Editar
          if(isset($_POST['descEdt'])):
            if(!isset($_POST['oat']) OR !isset($_POST['descricao']) OR !isset($_POST['cod'])){
              echo "Dados incopletos";
            }
            $id = $_POST['cod'];
            $oat = $_POST['oat'];
            $descricao = $_POST['descricao'];

            $descricoes->setOat($oat);
            $descricoes->setDescricao($descricao);

            if($descricoes->update($id)){
              echo "Descricao salvo com Sucesso!";
              header("Refresh: 1, oat-operacao.php?acao=oat-retorno&acao1=consulta&id=". $oat);	
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
              }else{
                  include("admin/pages/oat/operacao/retorno/retorno.php");
              }
            ?>

          </div>
        </div>
        <!-- /page content -->

