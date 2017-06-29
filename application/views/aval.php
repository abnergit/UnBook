<script type="text/javascript">
    function validaAval(){
        // Validações
        $("#formAval").validate({
            rules: {
                inputTituloAval: {
                    required : true
                },
                inputDscAval: {
                    required : true
                }
            },
            messages: {
                inputTituloAval: {
                    required: 'Informe o nome do professor'
                },
                inputDscAval:{
                    required: 'Informe a avaliação'
                }
            }
        });
        return $("#formAval").valid();
    }
    $(document).ready(function() {
        $('#open-modal-aval-button').on("click",function(e) {
            $('#modalAval').modal('show');
        });
        $("#btn-close").on("click", function(e){
            $("#modalAval").modal('hide');
        });
    });

</script>

<article class="row" id="inicio">

    <!--modal aval !-->
    <div class="modal fade" id="modalAval">
        <?php
        echo form_open('Aval/cadastrarAval',array('id'=>'formAval','name'=>'formAval','role'=>'form', 'onsubmit'=>'return validaAval()') );
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cadastrar Professor</h4>
            </div>
            <div class="modal-body" id="ModalBodyFatness">
                <div class="form-group">
                    <?php echo form_label('Nome ','dsc_titulo_aval',array('class'=>'required')); ?>
                    <?php echo form_input(array("type"=>"text","name"=>"inputTituloAval","id"=>"tituloAval",'class'=>'parametros-group form-control','autofocus'=>'autofocus')); ?>
                    <?php echo form_label('Descrição ','dsc_aval',array('class'=>'required')); ?>
                    <?php echo form_input(array("type"=>"text","name"=>"inputDscAval","id"=>"dscAval",'class'=>'parametros-group form-control','autofocus'=>'autofocus')); ?>
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
                    <button type="button" id="open-modal-aval-button" class="btn btn-default">Adicionar Professor</button>
                    <?php echo form_open( '/aval/selectAvals',array( 'id'=>'aval','name'=>'aval')); ?>
                    <h3>Professor</h3>
                    </br>
                        <table class="table">
                            <?php
                                //  print_r($dados);
                                foreach ($dados as $linha){
                                    echo '<tr><td><a href="/projeto/index.php/aval/deletarAval?id='.$linha->idn_aval.'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </a></td>';
                                    echo '<td><a href ="/projeto/index.php/aval"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a></td>';;
                                    echo '<td><a href ="/projeto/index.php/mensagem?id='.$linha->idn_aval.'&aval='.$linha->dsc_titulo_aval.' " >'.$linha->dsc_titulo_aval.'</a></td></tr>';
                                }
                                echo form_close();
                            ?>
                        </table>
                    </br></br></br>
                </div>
            </div>
        </div>
    </div>
</article>


