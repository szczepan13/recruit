<?php

class Post
{
    private $title;
    private $content;

    public static function writeNewFrom($title, $content)
    {
        return new static($title, $content);
    }

    private function __construct($title, $content)
    {
        $this->setTitle($title);
        $this->setContent($content);
    }

    private function setTitle($title)
    {
        $this->assertNotEmpty($title);
        $this->title = $title;
    }

    private function setContent($content)
    {
        $this->assertNotEmpty($content);
        $this->content = $content;
    }
}