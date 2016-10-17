  <!-- Header -->
  <?php include("admin/includes/tab/header.php");?>
  <!-- /Header -->
      <script src="js/jquery-1.3.2.min.js"></script>
    <script src="js/combo.js"></script>

            <!-- menu profile quick info -->
            <?php include("admin/includes/menu.php");?>
            <!-- /menu footer buttons -->

        <!-- top navigation -->
        <?php include("admin/includes/topo.php");?>
        <!-- /top navigation -->

        <!-- page content -->
        <?php
          if(isset($_GET['acao'])){
            $acao = $_GET['acao'];	
            
            if($acao=='oat-criar'){include("admin/pages/oat-operacao/oatCriar.php");}	
            // cadastro
            if($acao=='oat-amarar'){include("admin/pages/oat-operacao/oatAmarar.php");}	
            // exibicao
            if($acao=='oat-retorno'){include("admin/pages/oat-operacao/oatRetorno.php");}
            // edicao
            if($acao=='oat-finalizar'){include("admin/pages/oat-operacao/oatFinalizar.php");}
                // edicao
            if($acao=='oat-concluidas'){include("admin/pages/oat-operacao/oatConcluidas.php");}

          }
        ?>
        <!-- /page content -->

        <!-- footer content -->
        <?php include("admin/includes/tab/footer.php");?>
        <!-- /footer content -->
