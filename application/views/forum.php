<script type="text/javascript">
    function validaForum(){
        // Validações
        $("#formForum").validate({
            rules: {
                inputTituloForum: {
                    required : true
                },
                inputDscForum: {
                    required : true
                }
            },
            messages: {
                inputTituloForum: {
                    required: 'Informe o título do fórum'
                },
                inputDscForum:{
                    required: 'Informe a descrição do fórum'
                }
            }
        });
        return $("#formForum").valid();
    }
    $(document).ready(function() {
        $('#open-modal-forum-button').on("click",function(e) {
            $('#modalForum').modal('show');
        });
        $("#btn-close").on("click", function(e){
            $("#modalForum").modal('hide');
        });
    });

</script>

<article class="row" id="inicio">

    <!--modal forum !-->
    <div class="modal fade" id="modalForum">
        <?php
        echo form_open('forum/cadastrarForum',array('id'=>'formForum','name'=>'formForum','role'=>'form', 'onsubmit'=>'return validaForum()') );
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cadastrar Fórum</h4>
            </div>
            <div class="modal-body" id="ModalBodyFatness">
                <div class="form-group">
                    <?php echo form_label('Nome ','dsc_titulo_forum',array('class'=>'required')); ?>
                    <?php echo form_input(array("type"=>"text","name"=>"inputTituloForum","id"=>"tituloForum",'class'=>'parametros-group form-control','autofocus'=>'autofocus')); ?>
                    <?php echo form_label('Descrição ','dsc_forum',array('class'=>'required')); ?>
                    <?php echo form_input(array("type"=>"text","name"=>"inputDscForum","id"=>"dscForum",'class'=>'parametros-group form-control','autofocus'=>'autofocus')); ?>
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
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="well"></br>
                    <a href="#" class="btn btn-default pull-right" id="open-modal-forum-button" >
                        <span class="glyphicon glyphicon-plus"></span> Adicionar Fórum
                    </a>
                    <?php echo form_open( '/forum/selectForum',array( 'id'=>'forum','name'=>'forum')); ?>
                    <h3>Fórum</h3>
                    </br>
                    <table class="table">
                        <?php
                            //  print_r($dados);
                            foreach ($dados as $linha){
                                echo '<tr><td><h5><a href ="/projeto/index.php/mensagem?id='.$linha->idn_forum.'&forum='.$linha->dsc_titulo_forum.' " >'.$linha->dsc_titulo_forum.'</a></h5>';
                                echo '<p>'.$linha->dsc_forum.'</p></td>';
                              /*  echo '<td>criado por:' .$linha->dsc_nome.'</td>';*/
                                echo '<td><a href ="/projeto/index.php/forum"><span class="glyphicon glyphicon-pencil pull-right" aria-hidden="true"></span>
                                </a></td>';
                                echo '<td><a href="/projeto/index.php/forum/deletarForum?id='.$linha->idn_forum.'"><span class="glyphicon glyphicon-trash pull-right" aria-hidden="true"></span>
                                </a></td></tr>';} ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</article>
