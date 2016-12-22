<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Site com bootstrap</title>
        <meta rate="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="bootstrap.min.css" />
        <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="bootstrap.min.js"></script>        
    </head>
    <body>
        <div class="container">
            <h1>Meu primeiro site com bootstrap<br/>
                <small>Meu subtítulo</small></h1>
            
            <p>Um parágrafo de texto para este site.</p>
            </hr>
            <p>Outro parágrafo com <mark>texto marcado</mark> e também uma palavra
                com <abbr title="Esta é uma marcação">marcação</abbr> de significado.</p>
            <p>Pressione <kbd>F5</kbd> para atualizar a página.</p>
            
            <blockquote>
                Um texto citado com a tag 'blockquote'.
                <footer>O autor.</footer>
            </blockquote>
            <div class="row">
            <!--    <div class="col-xs-3" style="background: red">Coluna A</div>
                <div class="col-xs-9" style="background: blue">Coluna B</div> -->
            <!--    <div class="col-md-3" style="background: red">Coluna A</div>
                <div class="col-md-9" style="background: blue">Coluna B</div> -->
                <div class="col-sm-4">Coluna A<br/>
                    <p class="bg-primary">Outra div anunciada em um p estilizado<p/><br/>
                    Uma lista descritiva:<br/>
                    <dl>
                        <dt>Café</dt>
                        <dd>É uma bebiba muito boa.</dd>
                        <dt>Leite</dt>
                        <dd>Eu não gosto.</dd>
                        <dt>Algoritmos</dt>
                        <dd>É uma lista de tarefas escritas em um <code>código fonte</code>.</dd>
                    </dl>
                </div>
                <div class="col-sm-8">Coluna B<br/>
                    
                </div>
            <a href="#pre" data-toggle='collapse'>link para collapse<a/>
                <button class="btn btn-info" data-toggle='collapse' target='#pre' >Collappse</button>
                    <div class="collapse out" id='pre'>texto
                        <pre>Texto
                            com a tag
                        <code>pre</code>                   
                        </pre>
                    </div>
            </div>
    </body>
</html>
