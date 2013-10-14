<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin Promoção Rock in Rio</title>
        <?php echo link_tag("assets/css/bootstrap.min.css") ?>
        <?php echo link_tag("assets/css/estilos.css") ?>
    </head>
    <body>
        <header>
            <div><?php echo anchor('index.php/login/logoff', 'Fazer logoff', 'class="pull-right"'); ?>
                <h3>Admin</h3>
            </div>
            <nav>
                <div class="navbar">
                    <div class="navbar-inner">
                        <ul class="nav">
                            <li><?php echo anchor(base_url('index.php/inscritos'), 'Inscritos'); ?></li>
                            <li class="active"><?php echo anchor('index.php/usuarios', 'Administradores'); ?></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <article>
            <div id="container"><?php
                if ($this->session->flashdata('atualizaok')) {
                    echo '<p class="alert alert-success">' . $this->session->flashdata('atualizaok') . '</p>';
                } else if ($this->session->flashdata('atualizaerro')) {
                    echo '<p class="alert alert-error">' . $this->session->flashdata('atualizaerro') . '</p>';
                } ?>
                <div class="formulario">
                    <?php
                    echo form_open('index.php/usuarios/atualiza_usuario', 'class="form-horizontal"');
                    foreach ($dados_usuario as $usuario) {
                        echo form_hidden('id', $usuario->IdUsuario);
                        echo '<div class="control-group">';
                        echo form_label('Login: ', 'login', 'class="control-label"');
                        echo form_input('login', $usuario->LoginUsuario, 'disabled');
                        echo '</div>';
                        echo '<div class="control-group">';
                        echo form_label('E-mail: ', 'email', 'class="control-label"');
                        echo form_input('email', $usuario->EmailUsuario, 'disabled');
                        echo '</div>';
                        echo '<div class="control-group">';
                        echo form_label('Senha: ', 'SenhaUsuario', 'class="control-label"');
                        echo form_password('SenhaUsuario', '', 'required');
                        echo '</div>';
                        echo '<div class="control-group">';
                        echo form_label('Confirme a Senha: ', 'confirma_senha', 'class="control-label"');
                        echo form_password('confirma_senha', '', 'required');
                        echo '</div>';
                        echo '<div class="control-group">';
                        echo form_submit('button', 'Salvar', 'class="btn btn-success"');
                    }
                    if (strlen(validation_errors()) > 0) {
                        echo '<div class="alert alert-success">' . validation_errors() . '</div>';
                    }
                    echo form_close();
                    ?>
                </div>
            </div>
        </article>
        <footer class="rodape">
            <p>Developed by Livraria Marca Fácil &reg;</p>
            <script src="http://code.jquery.com/jquery.js"></script>
            <script src="<?php echo site_url("assets/js/bootstrap.min.js"); ?>"></script>
        </footer>
    </body>
</html>
</body>
</html>