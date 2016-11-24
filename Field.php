<?php
/**
 * Class Field
 *
 * Immutable Value-Object,
 * unique property is that it knows when it wins ;)
 */

class Field{

    private $type;
    private $win;

    const CLOSED = 'closed';
    const OPEN = 'open';

    public function __construct($type, $win = false)
    {
        $this->type = $type;
        $this->win = $win;
    }

    public function isClosed()
    {
        return $this->type === self::CLOSED;
    }

    public function isOpen()
    {
        return !$this->isClosed();
    }

    public function isWin()
    {
        return $this->win;
    }

}