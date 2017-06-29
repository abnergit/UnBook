<script type="text/javascript">
    $(document).ready(function () {
        // Máscaras
        $("#nu_cpf").mask("999.999.999-99");
    });
    </script>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">

        <ul class="nav navbar-nav">
            <li class="active"><a href=#page-top >Inicio</a></li>
            <li><a class="page-scroll" href="#sobre">Sobre</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                <ul id="login-dp" class="dropdown-menu">
                    <li>
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo form_open( 'logar/validandoLogin',array( 'id'=>'formLogin','name'=>'formLogin','onsubmit'=>'return validaLogin()')); ?>

                                <div class="form-group">
                                    <?php echo form_label( 'CPF ', 'nu_cpf',array( 'class'=>'required')); ?>
                                    <?php echo form_input(array( 'id'=>'nu_cpf','name'=>'nu_cpf','class'=>'form-control','autofocus'=>'autofocus'),set_value('nucpf',(isset($nucpf)?$nucpf:'')));?>
                                </div>

                                <div class="form-group">
                                    <?php echo form_label( 'Senha ', 'senha',array( 'class'=>'required')); ?>
                                    <?php echo form_input(array( 'id'=>'senha','name'=>'senha','type'=> 'password','class'=>'form-control'),set_value('dcsenha',(isset($dcsenha)?$dcsenha:'')));?>
                                </div>

                                <div class="form-group" style="padding-top: 20px;">
                                    <?php echo form_input(array( 'id'=>'submit','type'=>'submit','value'=> 'Login','class'=>'btn btn-primary pull-right'));?>
                                    <a href='<?php echo base_url('index.php/login/lembrarSenha ');?>'>Esqueci minha senha</a><br />
                                    <a href='<?php echo base_url('index.php/login/novoEmail');?>'>Alterar e-mail</a>
                                </div>

                                <?php echo form_close(); ?>

                                <?php if(isset($erro)) { echo "<p class='alert alert-danger col-sm-12' role='alert-danger'>"; echo $erro; echo "</p>"; } ?>
                            </div>
                            <div class="bottom text-center">
                                Novo aqui? <?php echo form_input(array('id'=>'submitCadastro','type'=>'button','value'=> 'Cadastre-se','class'=>'btn btn-primary','onclick'=>"location.href='".base_url('index.php/Cadastro')."'"));?>

                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
