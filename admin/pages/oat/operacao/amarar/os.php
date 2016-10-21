      <?php

      $id = $_GET['id'];
      $resultado = $oat->find($id);
 
      ?>
    <table width="100%" border='0'>
        <td colspan="11" name="cliente">Cunsulta Pessoas</td>
        <tr>
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tbody>
                <tr class="bg_vrd_b">
                    <td>
                        <table cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td>Codigo:</td>
                                    <td>&nbsp;</td>
                                    <td>CPF:</td>
                                    <td>&nbsp;</td>
                                    <td>RG:</td>
                                    <td>&nbsp;</td>
                                    <td>Dt. Nascimento:</td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="codPessoa"  value="<%= pessoas.getCodigo()%>" disabled="disabled" id="cpf" style="width:150px" class="box"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="cpf" value="<%= pessoas.getCpf()%>" disabled="disabled" id="matricula" style="width:150px" class="box"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="identidade" value="<%= pessoas.getIdentidade()%>" disabled="disabled" id="matricula" style="width:150px" class="box"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="nascimento" value="<%= pessoas.getNascimento()%>" disabled="disabled" id="matricula" style="width:150px" class="box"></td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="pT12 pL4">Nome:</td>
                                    <td>&nbsp;</td>
                                    <td class="pT12 pL4">Sexo:</td>
                                    <td>&nbsp;</td>
                                    <td class="pT12 pL4">Estado de Civil</td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="pT5 pL4"><input type="text" name="nome" value="<%= pessoas.getNome()%>" disabled="disabled" id="nome" style="width:450px"  class="box"></td>
                                    <td>&nbsp;</td>
                                    <td class="pT5 pL4"><input type="text" name="nome" value="<%= pessoas.getSexo()%>" disabled="disabled" id="nome" style="width:150px" class="box"></td>
                                    <td>&nbsp;</td>
                                    <td class="pT5 pL4"><input type="text" name="nome" value="<%= pessoas.getEstadoCivil()%>" disabled="disabled" id="nome" style="width:150px" class="box"></td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="pT12 pL4">Email:</td>
                                    <td>&nbsp;</td>
                                    <td class="pT12 pL4">Telefone:</td>
                                    <td>&nbsp;</td>
                                    <td class="pT12 pL4">Celular:</td>
                                </tr>
                                <tr>
                                    <td colspan="1" class="pT5 pL4"><input type="text" name="email" value="<%= pessoas.getEmail()%>" disabled="disabled" id="nome" style="width:450px" class="box"></td>
                                    <td>&nbsp;</td>
                                    <td class="pT5 pL4"><input type="text" name="telefoneFixo" value="<%= pessoas.getTelefoneFixo()%>" disabled="disabled" id="matricula" style="width:150px" class="box"></td>
                                    <td>&nbsp;</td>
                                    <td><input type="text" name="telefoneCelular" value="<%= pessoas.getTelefoneCelular()%>" disabled="disabled" id="matricula" style="width:150px" class="box"></td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <%
                                        }
                                    }
                                %>
                            </tbody>

                        </table>
                <tr>
                    <td>&nbsp;</td>
                </tr>




		    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar sistema <small>Altere os dados</small></h2>
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
                    <br />
                    <form id="demo-form2" data-parsley-validate method="post" action="" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Filia <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="filia" name="filia" required="required" size=6 maxlength=6 style="text-transform:uppercase;" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">OS <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="os" name="os" required="required" size=30 maxlength=30 class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cliente <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="cliente" value="<?php echo $resultado->cliente; ?>"  disabled="disabled" size=30 maxlength=30 required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Localidade <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php foreach($localidades->findAll() as $key => $value):if($value->id == $resultado->localidade) {
                            echo '<input type="text" id="first-name" name="localidade" value=',$value->nome,' disabled="disabled" class="form-control col-md-7 col-xs-12">';
                                }endforeach;
                            ?>	
                        </div>
                      </div>
                      <input type="hidden" id="cliente" name="cliente" value="<?php echo $cliente; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Servico <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php foreach($servicos->findAll() as $key => $value):if($value->id == $resultado->servico) {
                            echo '<input type="text" id="first-name" name="servico" value=',$value->descricao,' disabled="disabled" class="form-control col-md-7 col-xs-12">';
                                }endforeach;
                            ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sistema <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php foreach($sistemas->findAll() as $key => $value):if($value->id == $resultado->sistema) {
                            echo '<input type="text" id="first-name" name="sistema" value=',$value->descricao,' disabled="disabled" class="form-control col-md-7 col-xs-12">';
                                }endforeach;
                            ?>
                        </div>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $resultado->id; ?>"><br />
		                <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a type="submit" href="oat-operacao.php?acao=oat-amarar" class="btn btn-primary">Cancelar</a>
                          <button type="submit" name="edt2" class="btn btn-success">Salvar OS</button>
                        </div>
                      </div>
		            </form>
                  </div>
                </div>
              </div>
            </div>
            <!--Editar-->
