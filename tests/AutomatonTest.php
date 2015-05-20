<?php

namespace TuringPHP\DFA\Tests;

use TuringPHP\DFA\Automaton;
use TuringPHP\DFA\Rule;
use TuringPHP\DFA\Rulebook;

/**
 * @covers TuringPHP\DFA\Automaton
 */
class AutomatonTest extends Test
{
    /**
     * @var Automaton
     */
    protected $automaton;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->automaton = new Automaton(
            1,   // initial state
            [3], // acceptable states
            new Rulebook([
                new Rule(1, "a", 2),
                new Rule(1, "b", 1),
                new Rule(2, "a", 2),
                new Rule(2, "b", 3),
                new Rule(3, "a", 3),
                new Rule(3, "b", 3),
            ])
        );
    }

    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        $this->automaton = null;
    }

    /**
     * @test
     */
    public function hasAcceptableState()
    {
        $this->assertFalse(
            $this->automaton->hasAcceptableState()
        );
    }

    /**
     * @test
     *
     * @covers TuringPHP\DFA\Automaton::readCharacter
     */
    public function readCharacter()
    {
        $this->assertFalse(
            $this->automaton->hasAcceptableState()
        );

        $this->automaton
            ->readCharacter("a")
            ->readCharacter("b");

        $this->assertTrue(
            $this->automaton->hasAcceptableState()
        );
    }

    /**
     * @test
     *
     * @covers TuringPHP\DFA\Automaton::readString
     */
    public function readString()
    {
        $this->assertFalse(
            $this->automaton->hasAcceptableState()
        );

        $this->automaton->readString("ab");

        $this->assertTrue(
            $this->automaton->hasAcceptableState()
        );
    }
}
