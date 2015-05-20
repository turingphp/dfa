<?php

namespace TuringPHP\DFA;

use LogicException;

class Rulebook
{
    /**
     * @var array
     */
    protected $rules;

    /**
     * @param array $rules
     */
    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * @param int    $state
     * @param string $character
     *
     * @return int
     *
     * @throws LogicException
     */
    public function nextState($state, $character)
    {
        if ($rule = $this->ruleFor($state, $character)) {
            return $rule->follow();
        }

        throw new LogicException(
            sprintf("No next state for state %s and character %s", $state, $character)
        );
    }

    /**
     * @param int    $state
     * @param string $character
     *
     * @return null|Rule
     */
    protected function ruleFor($state, $character)
    {
        foreach ($this->rules as $rule) {
            /**
             * @var Rule $rule
             */
            if ($rule->appliesTo($state, $character)) {
                return $rule;
            }
        }

        return null;
    }
}
