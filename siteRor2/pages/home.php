<main>
        <!--Banner usando display flex-->
        <section class="bg-fosco" id="banner">
            <img src="<?php echo INCLUDE_PATH;?>assets/img/logos/ror-logo.png" alt="Logo" width="700px" height="300px">
            <div class="tag-container">
                <p class="tag bg-light">visão em terceira pessoa</p>
                <p class="tag bg-light">rouguelike de ação</p>
                <p class="tag bg-light">individual ou cooperativo</p>
            </div>
            <a href="https://store.steampowered.com/app/632360/Risk_of_Rain_2/" target="_blank"
                class="hover-scale">Jogue agora</a>
        </section>

        <!--Informações usando display flex-->
        <section id="informacoes">
            <?php
            $tabela = TABELA_NOTICIAS;
            $informacoes = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id");
            $informacoes->execute();
            $informacoes = $informacoes->fetchAll();
            foreach($informacoes as $key => $value) {
            ?>
            <div class="info-container bg-fosco <?php if($value['order_id']%2 == 0) echo 'flex-invertido';?>">
                <div class="texto">
                    <h3><?php echo $value['titulo']?></h3>
                    <p><?php echo $value['conteudo']?></p>
                </div>
                <img src="<?php echo INCLUDE_PATH_PAINEL;?>uploads/<?php echo $value['capa']?>" alt="imagem-ilustração" class="imagem">
            </div>
            <?php } ?>
            
            <div class="info-container bg-fosco itens-vertical">
                <h3>Fique sabendo das últimas notícias</h3>
                <form action="" method="post">
                    <input type="email" placeholder="E-mail" name="email">
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </section>

        <!--Sobreviventes usando display block-->
        <section id="sobreviventes">
            <h2 class="titulo bg-fosco">Sobreviventes</h2>
            <!--Seleção dos sobreviventes-->
            <div class="container-seletor">
                <a href="#arti">
                    <div class="seletor hover-scale-survivor bg-fosco">
                        <img src="<?php echo INCLUDE_PATH;?>assets/img/sobreviventes/arti.webp" alt="Artífice">
                        <h4>Artífice</h4>
                    </div>
                </a>
            </div>
            <div class="container-seletor">
                <a href="#caca">
                    <div class="seletor hover-scale-survivor bg-fosco">
                        <img src="<?php echo INCLUDE_PATH;?>assets/img/sobreviventes/caca.webp" alt="Caçadora">
                        <h4>Caçadora</h4>
                    </div>
                </a>
            </div>
            <div class="container-seletor">
                <a href="#coma">
                    <div class="seletor hover-scale-survivor bg-fosco">
                        <img src="<?php echo INCLUDE_PATH;?>assets/img/sobreviventes/coma.webp" alt="Comando">
                        <h4>Comando</h4>
                    </div>
                </a>
            </div>
            <div class="container-seletor">
                <a href="#enge">
                    <div class="seletor hover-scale-survivor bg-fosco">
                        <img src="<?php echo INCLUDE_PATH;?>assets/img/sobreviventes/enge.webp" alt="Engenheiro">
                        <h4>Engenheiro</h4>
                    </div>
                </a>
            </div>
            <!--Habilidades dos sobreviventes (Display flex)-->
            <div class="container-habilidade bg-fosco" id="arti">
                <div class="nome-sobrevivente bg-gradiente-direita">
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/sobreviventes/arti.webp">
                    <h3>Artífice</h3>
                </div>
                <div class="habilidade">
                    <h4>Raio de Plasma</h4>
                    <p>Dispare um raio que causa dano e explode em uma pequena área</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/icones-habilidade/arti-pri.webp">
                </div>
                <div class="habilidade">
                    <h4>Nanomomba Carregada</h4>
                    <p>Carregue uma nanobomba que explode causando dano e atordoando inimigos</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/icones-habilidade/arti-sec.webp">
                </div>
                <div class="habilidade">
                    <h4>Congelar Abrupto</h4>
                    <p>Crie uma barreira que causa dano e congela inimigos podendo executados</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/icones-habilidade/arti-ut.webp">
                </div>
                <div class="habilidade">
                    <h4>Surto de Íon</h4>
                    <p>Irrompa no céu causando dano e atordoando inimigos no lançamento</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/icones-habilidade/arti-esp.webp">
                </div>
            </div>
            <div class="container-habilidade bg-fosco" id="caca">
                <div class="nome-sobrevivente bg-gradiente-direita">
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/sobreviventes/caca.webp">
                    <h3>Caçadora</h3>
                </div>
                <div class="habilidade">
                    <h4>Disparo</h4>
                    <p>Dispare rapidamente uma flecha teleguiada enquanto corre</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/icones-habilidade/caca-pri.webp">
                </div>
                <div class="habilidade">
                    <h4>Alabarda de Laser</h4>
                    <p>Lance uma alabarda teleguiada que golpeia até 6 inimigos causando dano</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/icones-habilidade/caca-sec.webp">
                </div>
                <div class="habilidade">
                    <h4>Translocação</h4>
                    <p>Desapareça e teleporte para a frente</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/icones-habilidade/caca-ut.webp">
                </div>
                <div class="habilidade">
                    <h4>Balista</h4>
                    <p>Teleporta para o céu. Lança até 3 raios de energia causando dano</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/icones-habilidade/caca-esp.webp">
                </div>
            </div>
            <div class="container-habilidade bg-fosco" id="coma">
                <div class="nome-sobrevivente bg-gradiente-direita">
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/sobreviventes/coma.webp">
                    <h3>Comando</h3>
                </div>
                <div class="habilidade">
                    <h4>Tiro Duplo</h4>
                    <p>Atire rapidamente em um inimigo</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/icones-habilidade/coma-pri.webp">
                </div>
                <div class="habilidade">
                    <h4>Projétil Fásico</h4>
                    <p>Dispare um projétil perfurante que causa dano aumentando cada vez que atravessar um inimigo</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/icones-habilidade/coma-sec.webp">
                </div>
                <div class="habilidade">
                    <h4>Esquiva Tática</h4>
                    <p>Rola uma pequena distância</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/icones-habilidade/coma-ut.webp">
                </div>
                <div class="habilidade">
                    <h4>Fogo de Supressão</h4>
                    <p>Dispare repetidamente causando dano e atordoando inimigos atingidos</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/icones-habilidade/coma-esp.webp">
                </div>
            </div>
            <div class="container-habilidade bg-fosco" id="enge">
                <div class="nome-sobrevivente bg-gradiente-direita">
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/sobreviventes/enge.webp">
                    <h3>Engenheiro</h3>
                </div>
                <div class="habilidade">
                    <h4>Granadas Saltitantes</h4>
                    <p>Carregue até 8 granadas que causam dano explosivo</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/icones-habilidade/enge-pri.webp">
                </div>
                <div class="habilidade">
                    <h4>Minas de Aranha</h4>
                    <p>Posicione uma mina autônoma que causa dano a inimigos próximos</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/icones-habilidade/enge-sec.webp">
                </div>
                <div class="habilidade">
                    <h4>Arpões Térmicos</h4>
                    <p>Entre no modo de marcação de alvos para larnçar mísseis teleguiados por calor</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/icones-habilidade/enge-ut.webp">
                </div>
                <div class="habilidade">
                    <h4>Torreta Automática</h4>
                    <p>Posicione até duas torretas que herdam todos os seus itens</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/icones-habilidade/enge-esp.webp">
                </div>
            </div>
        </section>

        <!--Mapas usando display grid-->
        <section class="container-mapas" id="mapas">
            <h2 class="titulo bg-fosco">Mapas</h2>
            <div class="nivel-mapa bg-fosco">
                <h3 class="bg-gradiente-direita">Primeiro estágio</h3>
                <div class="descricao">
                    <h4>Floresta Sinfonada</h4>
                    <p>A região mais fria de Petrichor V. Coberta por uma camada de neve, com grandes árvores cercadas
                        por
                        plataformas que abrangem vários níveis e longos rios congelados onde os personagens deslizarão
                        pela
                        superfície.<br>
                        Floresta sinfonada trás um estilo de jogo diferenciado com seu sistema de cavernas e montanhas
                        trazendo vantagens a sobreviventes com alta mobilidade.</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/mapas/floresta-sinfonada.webp" alt="Floresta-Sinfonada">
                </div>
                <hr>
                <div class="descricao">
                    <h4>Cataratas Verdejantes</h4>
                    <p>Uma beleza natural encontrada em Petrichor V. Constituido de plataformas com diferentes e
                        elevações e
                        vários corredores, cataratas vertejantes é a mais recente adição ao jogo. Contando com diversas
                        paisagens e quedas d'água além de uma paleta de cores completamente diferente do habitual.<br>
                        Sobreviventes rápidos e com bastante mobilidade se dão muito bem no terreno irregular encontrado
                        nas
                        redondezas.
                    </p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/mapas/cataratas-verdejantes.webp" alt="Cataratas-Verdejantes">
                </div>
            </div>
            <div class="nivel-mapa bg-fosco">
                <h3 class="bg-gradiente-direita">Segundo estágio</h3>
                <div class="descricao">
                    <h4>Aqueduto Abandonado</h4>
                    <p>Um deserto árido e extenso localizado em Petrichor V. Enormes esqueletos e poças de alcatrão
                        estão
                        espalhados, e um imponente aqueduto derramando alcatrão domina a área.<br>
                        Por entre as pedras se escondem antigos segredos, seria alguém capaz de desvenda-los?
                    </p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/mapas/aquedutos-abandonados.webp" alt="Aqueduto-Abandonado">
                </div>
                <hr>
                <div class="descricao">
                    <h4>Faceta do Pântano</h4>
                    <p>Um lamaçal úmido encontrado em Petrichor V. Consiste principalmente em estruturas de pedra em
                        ruínas
                        e áreas pantanosas cheias de água.<br> Apresenta uma falésia elevada, que pode ou não ser
                        acessível.
                    </p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/mapas/faceta-do-pantano.webp" alt="Faceta-do-Pantano">
                </div>
            </div>
            <div class="nivel-mapa bg-fosco">
                <h3 class="bg-gradiente-direita">Terceiro estágio</h3>
                <div class="descricao">
                    <h4>Ponto de Encontro Delta</h4>
                    <p>Uma tundra desolada localizada em Petrichor V. Containers e instalações elétricas espalhadas pelo
                        terreno levam a crer que alguém trabalhasse ou até vivesse no local, quem quer que seja não esta
                        mais ali, seria por conta dos monstros? Ou pior... por conta do frio?!
                    </p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/mapas/ponto-de-encontro-delta.webp" alt="Ponto-de-Encontro-Delta">
                </div>
                <hr>
                <div class="descricao">
                    <h4>Acres Abrasados</h4>
                    <p>Um cenário místico e desolado encontrado em Petrichor V. Grandes plataformas circulares
                        constituem a
                        maior parte do espaço e brasas flutuam no ar.<br>
                        Suas arvores de coloração avermelhada trazem um ar de outono junto da calmaria dos ventos.
                    </p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/mapas/acres-abrasados.webp" alt="Acres-Abrasados">
                </div>
            </div>
            <div class="nivel-mapa bg-fosco">
                <h3 class="bg-gradiente-direita">Quarto estágio</h3>
                <div class="descricao">
                    <h4>Profundezas Abissais</h4>
                    <p>Localizado na crosta de Petrichor V. Uma zona de calor escaldante forjada pelo fogo do inferno. O
                        mapa apresenta duas portas que conduzem a uma caverna, que podem ser fechadas ou abertas, se
                        abertas, a caverna guarda várias caixas de itens que poderão ser desfrutadas pelos jogadores.
                    </p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/mapas/profundezas-abissais.webp" alt="Profundezas-Abissais">
                </div>
                <hr>
                <div class="descricao">
                    <h4>Canto da Sereia</h4>
                    <p>Um ambiente úmido e chuvoso em Petrichor V. Repleto de túneis e cavernas, é lar de
                        diversas aves. Ao longo do mapa é possível encontrar ninhos de ovos, mas cuidado, quem quer que
                        seja
                        a dona, provavelmente não se da bem com intrusos.
                    </p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/mapas/canto-da-sereia.webp" alt="Canto-da-Sereia">
                </div>
            </div>
            <div class="nivel-mapa bg-fosco">
                <h3 class="bg-gradiente-direita">Quinto estágio</h3>
                <div class="descricao">
                    <h4>Campina Celeste</h4>
                    <p>Um dos lugares mais perigosos e temidos do planeta, localizado na atmosfera superior de Petrichor
                        V.<br>O
                        teletransportador neste ambiente é uma versão única chamada Teletransportador Primordial, que
                        possui
                        anéis externos com os quais você pode interagir antes de iniciar o Evento do Teletransportador
                        para
                        se alinhar com a lua para acessar O Inicio ou para alinhar com o planeta para continuar o ciclo
                        de
                        estágios em Petrichor V mantendo todo seu progresso.</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/mapas/campina-celeste.webp" alt="Campina-Celeste">
                </div>
                <hr>
                <div class="descricao">
                    <h4>Criadouro de Helmintos</h4>
                    <p>Junto a Campina Celeste, o Criadouro de Helmintos compõem o grupo dos quinto estágios, uma
                        recente
                        adição trazendo uma ambientação dracônica e cheia de plataformas de diferentes níveis e diversos
                        baús a serem explorados pelo jogador.<br>
                        Cuidado ao se aventurar, suas cachoeiras de lava escaldante limitam seu terreno, nem mesmo os
                        mais
                        fortes ousam caminhar sobre ela.
                    </p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/mapas/criadouro-de-helmintos.webp" alt="Criadouro-de-Helmintos">
                </div>
            </div>
            <div class="nivel-mapa bg-fosco">
                <h3 class="bg-gradiente-direita">Estágios Finais</h3>
                <div class="descricao">
                    <h4>O Início</h4>
                    <p>O cenário de um dos finais do jogo. Grande domínio localizado acima da brecha quebrada da lua de
                        Petrichor V. É
                        composto pelos restos destroçados de quatro secções emblemáticas de Mithrix e as ferramentas de
                        criação de Providence, seu irmão.<br>
                        Um lugar mais complexo do que parece. Conseguiriam os sobreviventes encontrar oque buscam?
                    </p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/mapas/o-inicio.webp" alt="O-Inicio">
                </div>
                <hr>
                <div class="descricao">
                    <h4>Meridiano Primordial</h4>
                    <p>Seu outro final, o renascimento.<br>Ao seguir um diferente caminho, atravessando os portais
                        verdes
                        que surgirem, eventualmente chegará ao Meridiano Primordial.<br>Enfrente uma árdua
                        escalada enquanto desvia da tão esperada chuva. Prove seu poder ao Providence e acabe com o
                        falso
                        filho, meras criações não serão capazes de parar sobrevivente algum</p>
                    <img src="<?php echo INCLUDE_PATH;?>assets/img/mapas/meridiano-primordial.webp" alt="Meridiano-Primordial">
                </div>
            </div>
        </section>
    </main>