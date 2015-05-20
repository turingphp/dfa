<?php

namespace TuringPHP\DFA;

class Automaton
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
     * @return bool
     */
    public function hasAcceptableState()
    {
        return in_array($this->currentState, $this->acceptableStates);
    }

    /**
     * @param string $character
     *
     * @return $this
     */
    public function readCharacter($character)
    {
        $this->currentState = $this->rulebook->nextState(
            $this->currentState,
            $character
        );

        return $this;
    }

    /**
     * @param string $string
     *
     * @return $this
     */
    public function readString($string)
    {
        foreach (str_split($string) as $character) {
            $this->readCharacter($character);
        }

        return $this;
    }
}
