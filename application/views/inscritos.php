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
                <h3>Admin Promoção Rock in Rio</h3>
            </div>
            <nav>
                <div class="navbar">
                    <div class="navbar-inner">
                        <ul class="nav">
                            <li class="active"><?php echo anchor(base_url('index.php/inscritos'), 'Inscritos'); ?></li>
                            <li><?php echo anchor('index.php/usuarios', 'Administradores'); ?></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <article>
            <div id="container">                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome do Candidato</td>
                            <td>Código</td>
                            <td>Aceita Regulamentos</td>
                            <td>Aceita Receber E-mails</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $result) : ?>
                            <tr>
                                <td><?php echo $result->IdCandidato; ?></td>
                                <td><?php echo $result->NomeCandidato; ?></td>
                                <td><?php echo $result->CodigoPromocao; ?></td>                                
                                <td><?php echo ($result->FlagAceite == 1) ? 'Sim' : 'Não'; ?></td>
                                <td><?php echo ($result->FlagEmail == 1) ? 'Sim' : 'Não'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="total-reg">Total de Inscritos: <span><?php echo $total_inscritos; ?></span></div>
                <div class="pagination"><?php echo $paginacao; ?></div>
            </div>
        </article>
        <footer class="rodape">
            <p>Developed by Livraria Marca Fácil &reg;</p>
            <script src="http://code.jquery.com/jquery.js"></script>
            <script src="<?php echo site_url("assets/js/bootstrap.min.js"); ?>"></script>
        </footer>
    </body>
</html>