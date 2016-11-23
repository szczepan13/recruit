<?php

class PostService
{
    public function createPost($title, $content)
    {
        $post = Post::writeNewFrom($title, $content);
        (new PostRepository())->add($post);
        return $post;
    }
}