            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Novo Ativo<small>Insira os dados</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate method="post" action="" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">N° Plaqueta <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="plaqueta" name="plaqueta" required="required" size=11 maxlength=11 class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <input type="hidden" name="oat" value="<?php echo $oatId; ?>">
                      <input type="hidden" name="cliente" value="<?php echo $oatCliente; ?>">
                      <input type="hidden" name="localidade" value="<?php echo $oatLocalId; ?>">
		                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="javascript:window.history.go(-1)" class="btn btn-primary">Voltar</a>
                          <button type="submit" name="ativAdd" class="btn btn-success">Cadastrar</button>
                        </div>
                      </div>
		                </form>
                  </div>
                </div>
              </div>
            </div>

                        <!-- Small modal -->
                        <div class="modal fade bs-example-modal-sm<?php echo $oatId; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="myModalLabel2"><?php echo $oatCliente; ?> | <?php echo $oatLocal; ?></h4>
                                <h6 class="modal-title" id="myModalLabel2"><?php echo $oatSistema; ?> - <?php echo $oatServico; ?></h6>
                                <h6 class="modal-title" id="myModalLabel2"><?php echo $oatData; ?> - <?php echo $oatUsuario; ?></h6>
                              </div>
                              <form id="demo-form2" data-parsley-validate method="post" action="" class="form-horizontal form-label-left">
                                <div class="modal-body">
                                  <h4>Ativo Empresa</h4>
                                  
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <select id="servico" name="filial" required="required" class="form-control col-md-7 col-xs-12" >
                                          <option selected>Filial...</option>
                                          <option value =1>PE</option>
                                          <option value =3>CE</option>
                                          <option value =4>GO</option>
                                          <option value =5>SBO</option>
                                      </select><span class="fa fa-building form-control-feedback" aria-hidden="true"></span>
                                  </div>
                                  
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="text" id="os" name="os" required="required" size=6 maxlength=6 placeholder="OS" class="form-control col-md-7 col-xs-12">
                                      <span class="fa fa-wrench form-control-feedback" aria-hidden="true"></span>
                                  </div>
                                  
                                  <div class="form-group">
                                    <input type="hidden" name="oat" value="<?php echo $oatId; ?>">
                                    <input type="hidden" name="cliente" value="<?php echo $oatCliente; ?>">
                                    <input type="hidden" name="localidade" value="<?php echo $oatLocalId; ?>">
                                  </div>
                                
                                
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                  <button type="submit" name="amarar" class="btn btn-success">Enviar OS</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- /modals -->