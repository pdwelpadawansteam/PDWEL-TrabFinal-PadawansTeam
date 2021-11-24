<?php

    abstract class Connection
    {
        private static $conn;

        public static function getConn()
        {

            if (self::$conn == null){

                try {
                    self::$conn = new PDO('mysql: host=localhost;', 'root', '');

                    $use_database = "USE blog_database";
                    self::$conn->exec($use_database);

                } catch (Exception $e) {
                    self::$conn = new PDO('mysql: host=localhost;', 'root', '');

                    $create_database = "CREATE DATABASE IF NOT EXISTS blog_database";
                    self::$conn->exec($create_database);

                    $use_database = "USE blog_database";
                    self::$conn->exec($use_database);

                    $create_publicacao = "CREATE TABLE publicacao (
                        idpublicacao INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        titulo VARCHAR(100) NOT NULL,
                        descricao VARCHAR(200) NOT NULL
                        )";
                    
                    self::$conn->exec($create_publicacao);

                    $create_comentario = "CREATE TABLE comentario (
                        idcomentario INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        nomeusuario VARCHAR(100) NOT NULL,
                        comentario VARCHAR(200) NOT NULL,
                        idpublicacao INT(6) UNSIGNED NOT NULL,
                        FOREIGN KEY (idpublicacao) REFERENCES publicacao(idpublicacao)
                        )";
                    
                    self::$conn->exec($create_comentario);
                    
    

                }
                
            }
            
            return self::$conn;
        }
            
    }