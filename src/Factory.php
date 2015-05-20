<?php

namespace TuringPHP\DFA;

class Factory
{
    /**
     * @var int
     */
    protected $currentState;

    /**
     * @var array
     */
    protected $acceptableStates;

    /**
     * @var Rulebook
     */
    protected $rulebook;

    /**
     * @param int      $currentState
     * @param array    $acceptableStates
     * @param Rulebook $rulebook
     */
    public function __construct($currentState, $acceptableStates, $rulebook)
    {
        $this->currentState = $currentState;
        $this->acceptableStates = $acceptableStates;
        $this->rulebook = $rulebook;
    }

    /**
     * @return Automaton
     */
    public function newAutomaton()
    {
        return new Automaton(
            $this->currentState,
            $this->acceptableStates,
            $this->rulebook
        );
    }

    /**
     * @param string $string
     *
     * @return bool
     */
    public function accepts($string)
    {
        return $this
            ->newAutomaton()
            ->readString($string)
            ->hasAcceptableState();
    }
}
