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
            
            if($acao=='clientes'){include("admin/pages/oat/system/cliente/clientes.php");}	
            // cadastro
            if($acao=='localidades'){include("admin/pages/oat/system/localidade/localidades.php");}	
            // exibicao
            if($acao=='tecnicos'){include("admin/pages/oat/system/tecnico/tecnicos.php");}
            // edicao
            if($acao=='sistemas'){include("admin/pages/oat/system/sistema/sistemas.php");}
                // edicao
            if($acao=='servicos'){include("admin/pages/oat/system/servico/servicos.php");}
                // edicao
            if($acao=='despesas'){include("admin/pages/oat/system/despesa/despesas.php");}

          }
        ?>
        <!-- /page content -->

        <!-- footer content -->
        <?php include("admin/includes/tab/footer.php");?>
        <!-- /footer content -->
