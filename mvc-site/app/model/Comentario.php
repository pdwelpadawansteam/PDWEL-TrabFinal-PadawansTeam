<?php

    class Comentario{

        public static function selecionarComentarios($idPublicacao){
            $con = Connection::getConn();

            $sql = "SELECT * FROM comentario WHERE idpublicacao = :id";

            $sql = $con->prepare($sql);
            $sql->bindValue(':id', $idPublicacao, PDO::PARAM_INT);
            $sql->execute();

            $res = array();

            while ($row = $sql->fetchObject('Comentario')) {
                $res[] = $row;
            }

            return $res;
        }

        public static function inserir($req)
        {
            $con = Connection::getConn();

            $sql = "INSERT INTO comentario (nomeusuario, comentario, idpublicacao) VALUES (:nomeuser, :coment, :idpubli)";

            $sql = $con->prepare($sql);
            $sql->bindValue(':nomeuser', $req['nomeusuario']);
            $sql->bindValue(':coment', $req['comentario']);
            $sql->bindValue(':idpubli', $req['idpublicacao']);
            $sql->execute();

            

            if ($sql->rowCount()) {
                return true;
            } else{
                throw new Exception("Falha na inserção");

                return false;
            }        
            
        }

        public static function delete($idPublicacao){

            $con = Connection::getConn();

            $sql = "DELETE FROM comentario WHERE idpublicacao = :idpublicacao";

            $sql = $con->prepare($sql);

            $sql->bindValue(":idpublicacao", $idPublicacao);
            $res = $sql->execute();

            if ($res == 0) {

                throw New Exception("Falha ao deletar comentário");

                return false;
            }

            return true;

        }
    }