<?php
    verificaPermissaoPagina(1);

    $usuariosOnline = Painel::listUserOnline();
    $getUserTotalToday = Painel::getUserTotalToday();
    $getUserTotal = Painel::getUserTotal();
    $painelUsers = Painel::painelUsers();
?>

<div class="box-content left w100">
    <h2><i class="fa-solid fa-table-columns"></i> Painel de controle - <?php echo NOME_EMPRESA;?></h2>
    <div class="box-metricas">
        <div class="box-metrica-single">
            <h2>Usuários Online</h2>
            <p><?php echo count($usuariosOnline);?></p>
        </div>
        <div class="box-metrica-single">
            <h2>Visitas Hoje</h2>
            <p><?php echo $getUserTotalToday;?></p>
        </div>
        <div class="box-metrica-single">
            <h2>Visitas Totais</h2>
            <p><?php echo $getUserTotal;?></p>
        </div>
    </div>
</div>

<div class="box-content left w100">
    <h2><i class="fa-brands fa-chrome"></i> Usuários Online</h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col left w50">
                <h2>IP</h2>
            </div>
            <div class="col left w50">
                <h2>Última Ação</h2>
            </div>
            <div class="clear"></div>
        </div>

        <?php if(count($usuariosOnline) == 0) { ?>
        <p class="ninguem-online">Sem dispositivos conectados</p>
        <?php }
        foreach ($usuariosOnline as $key => $value) { ?>
        <div class="row">
            <div class="col left w50">
                <h2><?php echo $value['ip'];?></h2>
            </div>
            <div class="col left w50">
                <h2><?php echo date('d/m/Y H:i:s', strtotime($value['ultima_acao']));?></h2>
            </div>
            <div class="clear"></div>
        </div>
        <?php }?>

    </div>
</div>

<div class="box-content left w100">
    <h2><i class="fa-brands fa-chrome"></i> Usuários do Painel</h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col left w33">
                <h2>Nome</h2>
            </div>
            <div class="col left w33">
                <h2>Usuário</h2>
            </div>
            <div class="col left w33">
                <h2>Cargo</h2>
            </div>
            <div class="clear"></div>
        </div>

        <?php foreach($painelUsers as $key => $value) { ?>
            <div class="row">
            <div class="col left w33">
                <h2><?php echo $value['nome'];?></h2>
            </div>
            <div class="col left w33">
                <h2><?php echo $value['usuario'];?></h2>
            </div>
            <div class="col left w33">
                <h2><?php echo Painel::pegaCargo($value['cargo']);?></h2>
            </div>
            <div class="clear"></div>
            </div>
        <?php } ?>
        
    </div>
</div>