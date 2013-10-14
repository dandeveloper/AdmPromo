<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin Promoção Rock in Rio</title>
        <?php echo link_tag("assets/css/bootstrap.min.css"); ?>
        <?php echo link_tag("assets/css/estilos.css"); ?>

    </head>
    <body>
        <header>
            <div><?php echo anchor('index.php/login/logoff', 'Fazer logoff', 'class="pull-right"'); ?>
                <h3>Admin Promoção Rock in Rio</h3>
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
            <div id="container">
                <?php
                if ($this->session->flashdata('deletaok')) {
                    echo '<p class="alert alert-success">' . $this->session->flashdata('deletaok') . '</p>';
                } else if ($this->session->flashdata('deletaerro')) {
                    echo '<p class="alert alert-error">' . $this->session->flashdata('deletaerro') . '</p>';
                }
                echo '<div class="novo-usuario">';
                echo anchor('index.php/usuarios/cadastrar_usuario', 'Novo Usuário', 'class="btn btn-primary"');
                echo '</div>';
                $tmpl = array('table_open' => '<table class="table table-hover">');
                $this->table->set_template($tmpl);
                $this->table->set_heading('ID Usuário', 'Login', 'E-mail', 'Ativo', 'Editar', 'Excluir');

                foreach ($usuarios as $usuario) {
                    $ativo = ($usuario->Ativo == 1) ? "Sim" : "Não";
                    $this->table->add_row(
                            $usuario->IdUsuario, $usuario->LoginUsuario, $usuario->EmailUsuario, $ativo, anchor('index.php/usuarios/detalhes_usuario/' . $usuario->IdUsuario, 'Alterar', 'class="btn btn-primary"'), anchor('index.php/usuarios/deleta_usuario/' . $usuario->IdUsuario, 'Excluir', 'class="btn btn-danger" onclick="confirm(\'Você tem Certeza que Dezeja Excluir o Usuário?\')"')
                    );
                }
                echo $this->table->generate('class="table table-hover"');
                ?>
            </div>
        </article>
        <footer class="rodape">
            <p>Developed by Livraria Marca Fácil &reg;</p>
            <script src="http://code.jquery.com/jquery.js"></script>
            <script src="<?php echo site_url("assets/js/bootstrap.min.js"); ?>"></script>
        </footer>
    </body>
</html>
