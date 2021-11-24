<?php

    class PublicacaoController
    {
        public function index($params)
        {

            try {

                $publicacao = Publicacao::selecionarPorId($params);
                

                $loader = new \Twig\Loader\FilesystemLoader('app/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('single.html');
                
                
                $parametros = array();
                
                $parametros['titulo'] = $publicacao->titulo;
                $parametros['descricao'] = $publicacao->descricao;
                $parametros['comentarios'] = $publicacao->comentarios;
                $parametros['idpublicacao'] = $publicacao->idpublicacao;


                $conteudo = $template->render($parametros);                

                echo $conteudo;

                


            } catch (Exception $e) {

                echo $e->getMessage();
                
            }
            

        }

        public function addComentario()
        {
            try {
                Comentario::inserir($_POST);

                header('Location: http://localhost/mvc-site/?pagina=publicacao&id='.$_POST['idpublicacao'].'');
            } catch (Exception $e) {
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/mvc-site/?pagina=publicacao&id='.$_POST['idpublicacao'].'"</script>';
            }
            
        }
    }