<!DOCTYPE html>
<html lang="en, pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <!--Font awsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Style.css-->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <!--Header-->
    <header>
        <div class="center">
            <div class="logo left">Logomarca</div>
            <nav class="desktop right">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Sobre</a></li>
                    <li><a href="#">Serviços</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </nav>
            <nav class="mobile right">
                <div class="bars-mobile fa-solid fa-bars"></div>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Sobre</a></li>
                    <li><a href="#">Serviços</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </nav>
            <!--Clear float-->
            <div class="clear"></div>
        </div>
    </header>

    <!--Banner-Principal-->
    <section class="banner-principal">
        <div class="overlay"></div>
        <div class="center">
            <form action="">
                <h2>Qual o seu melhor e-mail?</h2>
                <input type="email" name="email" id="email" required>
                <input type="submit" name="enviar" value="Enviar">
            </form>
        </div>
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
                <img src="assets/img/local-trabalho.png" alt="Local de trabalho">
            </div>
            <!--Clear float-->
            <div class="clear"></div>
        </div>
    </section>

    <!--Especialidades-->
    <section class="especialidades">
        <div class="center">
            <h2 class="title"></h2>
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
            <div class="w50 left depoimentos-container">
                <h2 class="title">Depoimentos</h2>
                <div class="depoimento-single">
                    <p class="depoimento-descricao">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse
                        mollitia tempore provident, earum
                        excepturi at necessitatibus eos aperiam reprehenderit ea non cum omnis enim dicta quo, iste,
                        minus recusandae sapiente.</p>
                    <p class="nome-autor">Lorem Ipsum</p>
                </div>
                <div class="depoimento-single">
                    <p class="depoimento-descricao">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugiat
                        labore quasi architecto,
                        assumenda neque sapiente repellendus ex eos atque vero consequuntur ipsum nostrum ipsam quae
                        aliquam! Omnis minima aliquid ducimus.</p>
                    <p class="nome-autor">Lorem Ipsum</p>
                </div>
                <div class="depoimento-single">
                    <p class="depoimento-descricao">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugiat
                        labore quasi architecto,
                        assumenda neque sapiente repellendus ex eos atque vero consequuntur ipsum nostrum ipsam quae
                        aliquam! Omnis minima aliquid ducimus.</p>
                    <p class="nome-autor">Lorem Ipsum</p>
                </div>
            </div>
            <div class="w50 left serviços-container">
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

    <!--Footer-->
    <footer>
        <div class="center">
            <p>Todos os direitos reservados!</p>
        </div>
    </footer>

</body>

</html>