<?php

class PostRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO(
            'mysql:host=localhost;dbname=my_database',
            'a_username',
            '4_p4ssw0rd',
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ]
        );
    }

    public function add(Post $post)
    {
        $this->db->beginTransaction();
        try {
            $stm = $db->prepare(
                'INSERT INTO posts (title, content) VALUES (?, ?)'
            );
            $stm->exec([
                $post->getTitle(),
                $post->getContent(),
            ]);
            $db->commit();
        } catch (Exception $e) {
            $db->rollback();
            throw new UnableToCreatePostException($e);
        }
    }
}