<?php
    class Publicacao
    {
        public static function selecionaTudo()
        {
            $con = Connection::getConn();

            $sql = "SELECT * FROM publicacao ORDER BY idpublicacao DESC";
            
            $sql = $con->prepare($sql);

            $sql->execute();

            $res = array();

            while ($row = $sql->fetchObject("Publicacao")){
                $res[] = $row;
            }            

            return $res;
        }

        public static function selecionarPorId($idPublicacao)
        {
            $con = Connection::getConn();

            $sql = "SELECT * FROM publicacao WHERE idpublicacao = :id";

            $sql = $con->prepare($sql);
            $sql->bindValue(':id', $idPublicacao, PDO::PARAM_INT);
            $sql->execute();

            $res = $sql->fetchObject("Publicacao");
            
            if (!$res) {
                throw new Exception("Não foi encontrado nenhum registro no banco de dados");                
            } else {
                $res->comentarios = Comentario::selecionarComentarios($res->idpublicacao);
            }

            return $res;

        }

        public static function insertPublicacao($postData){

            if (empty($postData['titulo']) or empty($postData['content'])) {
                throw new Exception("Preencha todos os campos.");

                return false;
            }

            $con = Connection::getConn();
            
            $sql = 'INSERT INTO publicacao (titulo, descricao) VALUES (:tit, :cont)';

            $sql = $con->prepare($sql);
            $sql->bindValue(':tit', $postData['titulo']);
            $sql->bindValue(':cont', $postData['content']);
            
            $res = $sql->execute();

            if ($res == false) {
                throw new Exception("Não foi possível criar uma publicação. Tente novamente");
            }

            return true;

        }

        public static function update($params){

            $con = Connection::getConn();

            $sql = "UPDATE publicacao SET titulo = :titulo, descricao = :descr WHERE idpublicacao = :id";

            $sql = $con->prepare($sql);

            $sql->bindValue(":titulo", $params["titulo"]);
            $sql->bindValue(":descr", $params["content"]);
            $sql->bindValue(":id", $params["idpublicacao"]);
            $res = $sql->execute();

            if ($res == false) {

                throw New Exception("Falha ao alterar a publicação");

                return false;
            }

            return true;
        }

        public static function delete($idPublicacao){

            $con = Connection::getConn();

            $sql = "DELETE FROM publicacao WHERE idpublicacao = :idpublicacao";

            $sql = $con->prepare($sql);

            $sql->bindValue(":idpublicacao", $idPublicacao);
            $res = $sql->execute();

            if ($res == false) {

                throw New Exception("Falha ao deletar a publicação");

                return false;
            }

            return true;

        }

    }