<?php

namespace TuringPHP\DFA\Tests;

use TuringPHP\DFA\Factory;
use TuringPHP\DFA\Rule;
use TuringPHP\DFA\Rulebook;

/**
 * @covers TuringPHP\DFA\Factory
 */
class FactoryTest extends Test
{
    /**
     * @var Factory
     */
    protected $factory;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->factory = new Factory(
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
        $this->factory = null;
    }

    /**
     * @test
     */
    public function newAutomaton()
    {
        $this->assertInstanceOf(
            "TuringPHP\\DFA\\Automaton", $this->factory->newAutomaton()
        );
    }

    /**
     * @test
     */
    public function accepts()
    {
        $this->assertFalse(
            $this->factory->accepts("a")
        );

        $this->assertTrue(
            $this->factory->accepts("ab")
        );
    }
}
