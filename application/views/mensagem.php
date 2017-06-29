<script type="text/javascript">
    $(document).ready(function() {
        $('#open-modal-mensagem-button').on("click",function(e) {
            $('#modalMensagem').modal('show');
        });
        $("#btn-close").on("click", function(e){
            $("#modalMensagem").modal('hide');
        });

    });
</script>

<article class="row" id="inicio">

    <!--modal mensagem !-->
    <div class="modal fade" id="modalMensagem">
        <?php
        echo form_open('mensagem/inserirMensagem',array('id'=>'formMensagem','name'=>'formMensagem','role'=>'form') );
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Mensagem</h4>
            </div>
            <div class="modal-body" id="ModalBodyFatness">
                <div class="form-group">
                    <?php echo form_label('Mensagem ','dsc_mensagem',array('class'=>'required')); ?>
                    <?php echo form_input(array("type"=>"text","name"=>"inputMensagem","id"=>"dscMensagem",'class'=>'parametros-group form-control','autofocus'=>'autofocus')); ?>
                    <?php echo form_input(array("type"=>"hidden","name"=>"inputForum","id"=>"idForum","value"=>$idForum)); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit"  class="btn btn-primary">Gravar</button>
                <button id='btn-close' type="reset" class="btn btn-default">Cancelar</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>

    <div id="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-5 col-sm-offset-1">
                <div class="well"></br>
                    <button type="button" id="open-modal-mensagem-button" class="btn btn-default">Escrever</button>
                    <?php echo '<h3>'.$tituloForum.'</h3>'; ?>
                    </br>
                    <?php
                        if($mensagens == null ) {
                            echo "Não existe mensagens nesse fórum! Seja o primeiro a publicar :)";
                        }else{
                            foreach($mensagens as $mensagem){
//                                echo '<tr><td><a href="/projeto/index.php/forum/deletarForum?id='.$linha->idn_forum.'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                echo '<i>'.$mensagem['dsc_nome'].'</i> diz: '.$mensagem['dsc_mensagem'].'<br/>';
                            }
                        }
                     ?>
                    </br></br></br>
                </div>
            </div>
        </div>
    </div>

</article>


