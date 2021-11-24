<?php

    class AdminController
    {
        public function index()
        {

            
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('admin.html');
            
            $objPublicacoes = Publicacao::selecionaTudo();
            
            $parametros = array();
            
            $parametros['publicacoes'] = $objPublicacoes;
            
            $conteudo = $template->render($parametros);                

            echo $conteudo;           
        }

        public function create(){
                        
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('create.html');
            
            
            $parametros = array();
            
            $conteudo = $template->render($parametros);                

            echo $conteudo;           
        }

        public function insert(){
            
            try {
                Publicacao::insertPublicacao($_POST);
                echo '<script>alert("A publicação foi inserida com sucesso.");</script>';
                echo '<script>location.href="http://localhost/mvc-site/?pagina=admin&metodo=index"</script>';

            } catch(Exception $e) {
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/mvc-site/?pagina=admin&metodo=create"</script>';
            }
            
            
        }

        public function alter($idParam){
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('update.html');
            

            $publi = Publicacao::selecionarPorId($idParam);

            $parametros = array();
            
            $parametros["idpublicacao"] = $publi->idpublicacao;
            $parametros["titulo"] = $publi->titulo;
            $parametros["descricao"] = $publi->descricao;
        

            $conteudo = $template->render($parametros);                

            echo $conteudo; 
        }

        public function update(){
            
            try {

                
                Publicacao::update($_POST);
                echo '<script>alert("A publicação foi alterada com sucesso.");</script>';
                echo '<script>location.href="http://localhost/mvc-site/?pagina=admin&metodo=index"</script>';

            } catch (Exception $e) {
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/mvc-site/?pagina=admin&metodo=alter&id='.$_POST['idpublicacao'].'"</script>';
            }
            
        }

        public function delete($idPublicacao){
            
            try {

                Comentario::delete($idPublicacao);
                Publicacao::delete($idPublicacao);
                

                echo '<script>alert("A publicação foi deletada com sucesso.");</script>';
                echo '<script>location.href="http://localhost/mvc-site/?pagina=admin&metodo=index"</script>';

            } catch (Exception $e) {
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/mvc-site/?pagina=admin&metodo=index"</script>';
            }
            
        }
    }