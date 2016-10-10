  <!-- Header -->
  <?php include("admin/includes/tab/header.php");?>
  <!-- /Header -->

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
            
            if($acao=='oat-clientes'){include("admin/pages/oat-system/clientes.php");}	
            // cadastro
            if($acao=='oat-locadades'){include("admin/pages/oat-system/locadades.php");}	
            // exibicao
            if($acao=='oat-tecnicos'){include("admin/pages/oat-system/tecnicos.php");}
            // edicao
            if($acao=='oat-sistemas'){include("admin/pages/oat-system/sistemas.php");}
                // edicao
            if($acao=='oat-serviços'){include("admin/pages/oat-system/serviços.php");}
                // edicao
            if($acao=='oat-despesas'){include("admin/pages/oat-system/despesas.php");}

          }
        ?>
        <!-- /page content -->

        <!-- footer content -->
        <?php include("admin/includes/tab/footer.php");?>
        <!-- /footer content -->
