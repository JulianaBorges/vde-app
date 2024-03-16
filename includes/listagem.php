<?php 

    $resultados = '';
    foreach ($vagas as $vaga){
        
        $resultados .= ' <tr>
                        <td>'.$vaga->id.'</td>
                        <td>'.$vaga->titulo.'</td>
                        <td>'.$vaga->descricao.'</td>
                        <td>'.($vaga->ativo == 's' ? 'Ativo' : 'Inativo').'</td>
                        <td>'.$vaga->data.'</td>
                        <td> <a href="editar.php?id='.$vaga->id.'">
                            <button type="button" class="btn btn-warning">EDITAR</button>
                        </a></td>
                        <td><a href="excluir.php?id='.$vaga->id.'">
                            <button type="button" class="btn btn-danger">EXCLUIR</button>
                        </a></td>
                    </tr>';
    }
?>

<main>
    <section class="m-5">
        
        <h1>Lista de Vagas</h1>

        <div class="m-4">
            <a href="cadastrar.php">
                <button class="btn btn-success">Nova Vaga</button>
            </a>
        </div>
        

        <table class="table table-dark mt-3 table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
        </table>
    </section>

</main>





