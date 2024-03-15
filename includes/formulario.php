<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success mt-4">Voltar</button>
        </a>
    </section>
    <h2 class="mt-3">Cadastrar Vaga</h2>

    <form method="post">

        <div class="form-group mb-3">
            <label class="form-label">Titulo</label>
            <input type="text" class="form-control" name="titulo" placeholder="Auxiliar de logistica" autofocus>
        </div>

        <div class="form-group mb-3">
            <label class="form-label">Example textarea</label>
            <textarea class="form-control" name="descricao" rows="3"></textarea>
        </div> 

        <div class="mt-3">

            <h4>Status</h4>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ativo" id="flexRadioDefault1" value="s" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    ativo
                </label>
            </div>
        
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ativo" id="flexRadioDefault2" value="n" >
                <label class="form-check-label" for="flexRadioDefault2">
                    inativo
                </label>
            </div>
            
            <div class="form-group mt-3">
                <button class="btn btn-success" type="submit">Enviar</button>
            </div>

        </div>    
    </form>
</main>
