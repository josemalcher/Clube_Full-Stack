<h1>CONTATO</h1>

<div class="container mt-5">
    <h2>Formulário de Contato</h2>
    <form action="pages/forms/contato.php" method="post" role="form">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email">
        </div>
        <div class="mb-3">
            <label for="assunto" class="form-label">Assunto</label>
            <input type="text" class="form-control" name="assunto" id="assunto" placeholder="Digite o Assunto">
        </div>
        <div class="mb-3">
            <label for="mensagem" class="form-label">Mensagem</label>
            <textarea class="form-control" name="mensagem" id="mensagem" rows="3" placeholder="Digite sua mensagem"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>