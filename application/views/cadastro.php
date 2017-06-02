<script type="text/javascript">
    $(document).ready(function () {
        // Máscaras
        $("#nu_cpf").mask("999.999.999-99");
    });
    function validaLogin(){
        // Validações
        $("#formCadastro").validate({
            rules: {
                dsc_nome: {
                  required : true
                },
                nu_matricula: {
                  required : true
                },
                dsc_email: {
                  required : true
                },
                nu_cpf: {
                    required: true
                },
                senha: {
                    required: true
                }
            },
            messages: {
                dsc_nome: {
                    required: 'Informe seu nome'
                },
                nu_matricula:{
                    required: 'Informe uma matrícula válida'
                },
                dsc_email:{
                    required: 'Informe um email'
                },
                nu_cpf: {
                    required: 'Informe o CPF'
                },
                senha: {
                    required: 'Informe a Senha'
                }
            }
        });
        return $("#formCadastro").valid();
    }

</script>
<article class="row" id="cadastro">
    <div class="container">
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4 col-lg-6 col-lg-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <p1 class="panel-title">Cadastre-se</p1>
                </div>
                <div class="panel-body">
                    <?php echo form_open( '/cadastro/realizaCadastro',array( 'id'=>'formCadastro','name'=>'formCadastro','onsubmit'=>'return validaLogin()')); ?>

                    <div class="form-group">
                        <?php echo form_label( 'Nome ', 'dsc_nome',array( 'class'=>'required')); ?>
                        <?php echo form_input(array( 'id'=>'dsc_nome','name'=>'dsc_nome','class'=>'form-control','autofocus'=>'autofocus'),set_value('dscnome',(isset($dscnome)?$dscnome:'')));?>
                    </div>

                    <div class="form-group">
                        <?php echo form_label( 'Email ', 'dsc_email',array( 'class'=>'required')); ?>
                        <?php echo form_input(array( 'id'=>'dsc_email','name'=>'dsc_email','class'=>'form-control','autofocus'=>'autofocus'),set_value('dscemail',(isset($email)?$email:'')));?>
                    </div>


                    <div class="form-group">
                        <?php echo form_label( 'CPF ', 'nu_cpf',array( 'class'=>'required')); ?>
                        <?php echo form_input(array( 'id'=>'nu_cpf','name'=>'nu_cpf','class'=>'form-control','autofocus'=>'autofocus'),set_value('nucpf',(isset($nucpf)?$nucpf:'')));?>
                    </div>

                    <div class="form-group">
                        <?php echo form_label( 'Senha ', 'senha',array( 'class'=>'required')); ?>
                        <?php echo form_input(array( 'id'=>'senha','name'=>'senha','type'=> 'password','class'=>'form-control'),set_value('dcsenha',(isset($dcsenha)?$dcsenha:'')));?>
                    </div>

                    <div class="form-group">
                        <?php echo form_label( 'Matricula ', 'nu_matricula',array( 'class'=>'required')); ?>
                        <?php echo form_input(array( 'id'=>'nu_matricula','name'=>'nu_matricula','class'=>'form-control'),set_value('numatricula',(isset($numatricula)?$numatricula:'')));?>
                    </div>

                    <div class="form-group" style="padding-top: 20px;">
                        <button id="retornar" onclick="window.location.href='home'" type="button" class="btn btn-default">Voltar</button>

                        <?php echo form_input(array( 'id'=>'submit','type'=>'submit','value'=> 'Cadastrar','class'=>'btn btn-primary pull-right'));?>
                    </div>

                    <?php echo form_close(); ?>

                    <?php if(isset($erro)) { echo "<p class='alert alert-danger col-sm-12' role='alert-danger'>"; echo $erro; echo "</p>"; } ?>
                </div>
            </div>
        </div>
    </div>
</article>