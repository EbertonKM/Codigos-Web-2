<?php 
    if(isset($_POST['btnEnviar'])) {
        new Email();
    }?>
<main>
    <div class="suporte-form-container bg-fosco">
        <h3>Contatar Suporte</h3>
        <form class="formulario" method="POST">
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" name="problema" id="floatingSelect" aria-label="Floating label select example" required>
                    <option selected>Selecione uma opção</option>
                    <option value="1">Problemas no pagamento</option>
                    <option value="2">Erros na instalação</option>
                    <option value="3">Problemas técnicos ou de compatibilidade</option>
                    <option value="4">Outro</option>
                </select>
                <label for="floatingSelect">Categorize o problema</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="erroCode" class="form-control" id="floatingInput" placeholder="erro-code">
                <label for="floatingInput">Código de erro (caso aplicar)</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="descricao" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px"></textarea>
                <label for="floatingTextarea2">Descrição do problema</label>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02">
            </div>
            <div class="botoes">
                <button type="submit" name="btnEnviar">Enviar</button>
                <a href="<?php echo INCLUDE_PATH;?>home">Voltar</a>
            </div>
        </form>
    </div>
</main>