<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login Promoção Rock in Rio</title>
        <?php echo link_tag("assets/css/bootstrap.min.css"); ?>
        <?php echo link_tag("assets/css/estilos.css"); ?>
    </head>
    <body>
        <div class="container">            
            <div id="modal" class="modal hide fade">
                <div class="modal-header">
                    <h3>Tela de Login</h3>
                </div>
                <div class="modal-body">
                    <?php
                    $atributos = array('class' => 'form-horizontal');
                    echo form_open('index.php/login/validar', $atributos);
                    echo '<div class="control-group">';
                    echo form_label('Login', 'login', 'class="control-label"');
                    echo form_input('login', '', 'class="input-xlarge" maxlength="32"');
                    echo '</div>';
                    echo '<div class="control-group">';
                    echo form_label('Senha', 'senha', 'class="control-label"');
                    echo form_password('senha', '', 'class="input-xlarge" maxlength="32"');
                    echo '</div>';
                    echo '<div class="control-group">';
                    echo form_submit('submit', 'Entrar', 'class="btn btn-large btn-success pull-right"');
                    echo '</div>';
                    if($this->session->flashdata('validarerro')){
                        echo '<p class="alert alert-error">' . $this->session->flashdata('validarerro') . '</p>';
                    }
                    echo form_close();                    
                    ?>
                </div>
            </div>                        
        </div>     
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="<?php echo site_url("assets/js/bootstrap.min.js"); ?>"></script>
        <script language="javascript">
            $('#modal').modal({
                backdrop: 'static',
                show: true,
                keyboard: false
            });
        </script>
    </body>
</html>