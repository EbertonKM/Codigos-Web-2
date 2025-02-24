<?php
$url = explode('/', $_GET['url']);
$categoria = array('nome' => '', 'slug' => '', 'id' => '');

if(isset($url[1]) && !empty($url[1])){
    $tabela = TABELA_CATEGORIAS;
    $verificaCategoria = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE slug = ?");
    $verificaCategoria->execute(array($url[1]));
    
    if($verificaCategoria->rowCount() == 0){
        $categoria = array('nome' => '', 'slug' => '', 'id' => '');
    } else {
        $categoria = $verificaCategoria->fetch();
    }
}

$porPagina = 9;

if(!isset($url[1]) || (isset($url[1]) && !isset($url[2]))){
?>

<section class="header-noticias">
    <div class="center">
        <h2><i class="fa-solid fa-bell"></i></h2>
        <h2>Acompanhe as últimas notícias do portal</h2>
    </div>
</section>

<section class="container-portal">
    <div class="center">
        <div class="sidebar">
            <div class="box-content-sidebar">
                <h3><i class="fas fa-search"></i> Pesquisar: </h3>
                <form method="post" action="">
                    <input type="text" name="parametro" placeholder="Digite..." required>
                    <input type="submit" name="buscar" value="Pesquisar">
                </form>
            </div>

            <div class="box-content-sidebar">
                <h3><i class="fas fa-list"></i> Selecione a Categoria: </h3>
                <form>
                    <select name="categoria" id="categoria-select">
                        <option value="">Todas as categorias</option>
                        <?php
                            $categorias = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id DESC");
                            $categorias->execute();
                            $categorias = $categorias->fetchAll();
                            foreach ($categorias as $key => $value) {
                        ?>
                        <option <?php if(isset($url[0]) && $url[0] == $value['slug']) echo 'selected'; ?> 
                                value="<?php echo $value['slug']; ?>">
                            <?php echo $value['nome']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </form>
            </div>

            <div class="box-content-sidebar">
                <h3><i class="fas fa-user"></i> Sobre o autor: </h3>
                <div class="text-center">
                    <div>
                        <img src="<?php echo INCLUDE_PATH; ?>assets/img/local-trabalho.png">
                    </div>
                    <?php $infosite = Util::getSiteInfo();?>
                    <?php echo $infoSite['nome_autor']; ?>
                    <?php echo $infoSite['descricao']; ?>
                </div>
            </div>
        </div>

        <div class="conteudo-portal">
                <div class="header-conteudo-portal">
                    <?php
                        if(!isset($_POST['parametro'])) {
                            if (@$categoria['nome'] == '') {
                                echo '<h2>Visualizando Todos os Posts</h2>';
                            } else {
                                echo '<h2>Visualizando Post em <span>' . $categoria['nome'] . '</span></h2>';
                            }
                        }else{
                            echo '<h2><i class="fa fa-check"></i> '.$_POST['parametro'].'</h2>';
                        }
                        $tabela = TABELA_NOTICIAS;
                        $query = "SELECT * FROM `$tabela` ";
                        if($categoria['nome'] != ''){
                            $query.="WHERE categoria_id = $categoria[id]";
                        }

                        if(isset($_POST['parametro'])) {
                            $parametro = $_POST['parametro'];
                            if(strstr($query, 'WHERE') !== false){
                                $query.=" AND titulo LIKE '%$parametro%'";
                            }else{
                                $query.=" WHERE titulo LIKE '%$parametro%'";
                            }
                        }
                        
                        if(!isset($_POST['parametro'])) {
                            if(isset($_GET['pagina'])){
                                $pagina = (int)$_GET['pagina'];
                                $queryPagina = ($pagina - 1) * $porPagina;
                                $query .=" ORDER BY order_id DESC LIMIT $queryPagina, $porPagina";
                            }else{
                                $pagina = 1;
                                $query .=" ORDER BY order_id DESC LIMIT 0, $porPagina";
                            }
                        } else {
                            $query.=" ORDER BY order_id DESC LIMIT 0, $porPagina";
                        }

                        $noticias = MySql::conectar()->prepare($query);
                        $noticias->execute();
                        $noticias = $noticias->fetchAll();
                    ?>
                </div>
                <?php foreach ($noticias as $key => $value) {
                    $tabela = TABELA_CATEGORIAS;
                    $sql = MySql::conectar()->prepare("SELECT `slug` FROM `$tabela` WHERE id = ?");
                    $sql->execute(array($value['categoria_id']));
                    $categoriaNome = $sql->fetch()['slug'];
                ?>
                    <div class="box-single-conteudo">
                        <h2><?php echo $value['titulo']; ?></h2>
                        <p><?php echo substr(strip_tags($value['conteudo']),0,400).'...'; ?></p>
                        <a href="<?php echo INCLUDE_PATH; ?>noticias/<?php echo $categoriaNome; ?>/<?php echo $value['slug']; ?>">Leia mais</a>
                    </div>
                <?php } ?>

            <?php
                $tabela = TABELA_NOTICIAS;
                $query = "SELECT * FROM `$tabela` ";
                if(@$categoria['nome'] != ''){
                    $query.="WHERE categoria_id = $categoria[id]";
                }
                
                $totalPaginas = MySql::conectar()->prepare($query);
                $totalPaginas->execute();
                $totalPaginas = ceil($totalPaginas->rowCount() / $porPagina);
            ?>

        </div>
        <div class="clear"></div>
        <div class="conteudo-portal">
            <div class="paginator">
                <?php
                if (!isset($_POST['parametro'])) {
                    for ($i = 1; $i <= $totalPaginas; $i++) {
                        @$categoriaStr = ($categoria['nome'] != '') ? '/' . $categoria['slug'] : '';
                        if (@$pagina == $i)
                            echo '<a class="active-page" href="'.INCLUDE_PATH.'noticias'.$categoriaStr.'?pagina='.$i.'">'.$i.'</a>';
                        else {
                            echo '<a href="'.INCLUDE_PATH.'noticias'.$categoriaStr.'?pagina='.$i.'">'.$i.'</a>';
                        }
                    }
                }
                ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</section>

<script>
document.getElementById('categoria-select').addEventListener('change', function() {
    let categoria = this.value;
    if(categoria) {
        window.location.replace('<?php echo INCLUDE_PATH; ?>noticias/' + categoria);
    } else {
        window.location.replace('<?php echo INCLUDE_PATH; ?>noticias');
    }
});
</script>

<?php } else {
    include('noticias-single.php');
} ?>