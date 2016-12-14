<?php
use PHPUnit\Framework\TestCase;

class FieldTest extends TestCase
{
    public function testClosed()
    {
        $field = new Field(Field::CLOSED);
        $this->assertEquals($field->isClosed(), true);
        $this->assertEquals($field->isOpen(), false);
        $this->assertEquals($field->isWin(), false);
    }

    public function testOpen()
    {
        $field = new Field(Field::OPEN);
        $this->assertEquals($field->isOpen(), true);
        $this->assertEquals($field->isClosed(), false);
        $this->assertEquals($field->isWin(), false);
    }

    public function testWinning()
    {
        $field = new Field(Field::OPEN, true);
        $this->assertEquals($field->isWin(), true);

    }
}
