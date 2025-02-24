<div class="box-content">
    <h2><i class="fa-solid fa-circle-user"></i> <?php echo $_SESSION['nome'];?></h2>

    <div class="perfil-box">
        <?php if($_SESSION['img'] != '') { ?>
            <img src="<?php echo INCLUDE_PATH_PAINEL;?>uploads/<?php echo $_SESSION['img'];?>">
        <?php }else { ?>
            <i class="fa-solid fa-user"></i>
        <?php } ?>
        <div class="perfil-info">
            <h2>Usuário: <?php echo $_SESSION['user'];?></h2>
            <h2>Cargo: <?php echo Painel::pegaCargo($_SESSION['cargo']);?></h2>
        </div>
    </div>
</div>