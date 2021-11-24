<?php

    class HomeController
    {
        public function index()
        {

            try {

                $colecPublicacao = Publicacao::selecionaTudo();

                $loader = new \Twig\Loader\FilesystemLoader('app/view');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('home.html');
                
                $param = array();
                $param['publicacoes'] = $colecPublicacao;

                $conteudo = $template->render($param);                

                echo $conteudo;

                


            } catch (Exception $e) {

                echo $e->getMessage();
                
            }
            

        }
    }