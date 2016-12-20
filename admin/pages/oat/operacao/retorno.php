        <?php

          $redirecionar_1 = 'oat-operacao.php?acao=retorno';
          $includ_1 = 'admin/pages/oat/system/oat/';
          $includ_ativo = 'admin/pages/oat/system/ativo/';
          $tabAcao = 'oat-operacao.php?acao=retorno';
          $oatStatus = 1;

          include( "admin/pages/oat/system/oat/oatContr.php");

				?>
        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>OS <small>Retorno</small></h3>
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
              <div class="row">


                <?php
                  if(isset($_GET['acao1'])){
                  $acao = $_GET['acao1'];	
                  if($acao=='consulta'){ ?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-ativoAdd"><i class='fa  fa-wrench'></i> Ativo</button>
                  </div>
                </div>
                    
                  <?php  include($includ_1."consulta.php");}
                  }else{
                      include( $includ_1."oatCard.php");
                  }
                ?>



              </div>
            </div>
            <!-- /page content -->

