<!--Banner-Principal-->
<section class="banner-principal">
    <div style="background-image: url('<?php echo INCLUDE_PATH;?>assets/img/bg-slide.jpg');"class="banner-single"></div><!--Banner single-->
    <div style="background-image: url('<?php echo INCLUDE_PATH;?>assets/img/bg-slide2.jpg');" class="banner-single"></div><!--Banner single-->
    <div style="background-image: url('<?php echo INCLUDE_PATH;?>assets/img/bg-slide3.jpg');" class="banner-single"></div><!--Banner single-->
        <div class="overlay"></div>
        <div class="center">
            <form action="">
                <h2>Qual o seu melhor e-mail?</h2>
                <input type="email" name="email" id="email" required>
                <input type="submit" name="enviar" value="Enviar">
            </form>
        </div>
        <div class="bullets"></div> <!--Bullets do carrossel-->
    </section>

    <!--Descricao-autor-->
    <section class="descricao-autor">
        <div class="center">
            <div class="w50 left">
                <h2>Prof. Dr. Robyson Aggio</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo officia esse excepturi libero!
                    Asperiores voluptatem impedit vero, molestias nihil, rerum dolore cumque eveniet ex, fuga delectus
                    quis quia accusamus repellat?</p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, porro atque nostrum numquam
                    mollitia, totam magnam, praesentium eveniet corrupti ut aliquid! Ut facilis fugit nostrum iure quae
                    odit molestias eveniet!</p>
            </div>
            <div class="w50 left">
                <img src="<?php echo INCLUDE_PATH;?>assets/img/local-trabalho.png" alt="Local de trabalho">
            </div>
            <!--Clear float-->
            <div class="clear"></div>
        </div>
    </section>

    <!--Especialidades-->
    <section class="especialidades">
        <div class="center">
            <h2 class="title">Especialidades</h2>
            <div class="w33 left box-especialidades">
                <h3><i class="fa-brands fa-html5"></i></h3>
                <h3>HTML 5</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore hic, optio tempora ipsum nesciunt
                    porro, impedit consequuntur similique, eos ab ad voluptates! Eum laudantium, dolorem ab ipsa vero
                    tempora illo!</p>
            </div>
            <div class="w33 left box-especialidades">
                <h3><i class="fa-brands fa-css3-alt"></i></h3>
                <h3>CSS 3</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nisi nemo nulla dolores illo beatae
                    error magni, maxime rerum excepturi quasi facere, ut provident nihil, rem sint perspiciatis repellat
                    odio!</p>
            </div>
            <div class="w33 left box-especialidades">
                <h3><i class="fa-brands fa-js"></i> </h3>
                <h3>JS</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt et expedita harum necessitatibus
                    ratione cupiditate dignissimos voluptatum reiciendis veritatis voluptatem quibusdam repellat
                    suscipit iste at a, totam atque. Quaerat, repudiandae.</p>
            </div>
            <!--Clear float-->
            <div class="clear"></div>
        </div>
    </section>

    <!--Extras-->
    <section class="extras">
        <div class="center">
            <div id="depoimentos" class="w50 left depoimentos-container">
                <h2 class="title">Depoimentos</h2>
                <?php
                $tabela = TABELA_DEPOIMENTOS;
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id DESC LIMIT 3");
                $sql->execute();
                $depoimentos = $sql->fetchAll();
                foreach($depoimentos as $key => $value) { ?>
                    <div class="depoimento-single">
                        <p class="depoimento-descricao">
                            <?php echo $value['depoimento']; ?>
                        </p>
                        <p class="nome-autor"><?php echo $value['nome']?> - <?php echo Util::dateFormat($value['data'])?></p>
                    </div>
                <?php } ?>
            </div>
            <div id="servicos" class="w50 left serviços-container">
                <h2 class="title">Serviços</h2>
                <div class="servicos">
                    <ul>
                        <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione odio quos exercitationem
                            labore eveniet maxime? Saepe error aut debitis, aliquid explicabo quas fuga officiis optio
                            nostrum provident, soluta eius esse.</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui consequatur doloribus vero
                            quasi similique. Fuga esse culpa quis? Perferendis odit iusto quaerat perspiciatis optio
                            quis dignissimos illum suscipit sequi consectetur.</li>
                        <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam labore, asperiores optio sequi
                            earum eaque nobis officia incidunt a tempore iste assumenda libero quia ex adipisci quod
                            ullam distinctio possimus!</li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </section>