<?php

namespace TuringPHP\DFA;

class Rule
{
    /**
     * @var int
     */
    protected $state;

    /**
     * @var string
     */
    protected $character;

    /**
     * @var int
     */
    protected $nextState;

    /**
     * @param int    $state
     * @param string $character
     * @param int    $nextState
     */
    public function __construct($state, $character, $nextState)
    {
        $this->state = $state;
        $this->character = $character;
        $this->nextState = $nextState;
    }

    /**
     * @param int    $state
     * @param string $character
     *
     * @return bool
     */
    public function appliesTo($state, $character)
    {
        return $this->state === $state and $this->character === $character;
    }

    /**
     * @return int
     */
    public function follow()
    {
        return $this->nextState;
    }
}
