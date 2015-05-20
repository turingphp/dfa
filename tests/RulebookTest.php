<?php

namespace TuringPHP\DFA\Tests;

use LogicException;
use TuringPHP\DFA\Rule;
use TuringPHP\DFA\Rulebook;

/**
 * @covers TuringPHP\DFA\Rulebook
 */
class RulebookTest extends Test
{
    /**
     * @var Rulebook
     */
    protected $rulebook;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->rulebook = new Rulebook([
            new Rule(1, "a", 2),
            new Rule(1, "b", 1),
            new Rule(2, "a", 2),
            new Rule(2, "b", 3),
            new Rule(3, "a", 3),
            new Rule(3, "b", 3),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        $this->rulebook = null;
    }

    /**
     * @test
     */
    public function nextState()
    {
        $this->assertEquals(
            2, $this->rulebook->nextState(1, "a")
        );

        $this->assertEquals(
            2, $this->rulebook->nextState(2, "a")
        );

        $this->assertEquals(
            3, $this->rulebook->nextState(3, "a")
        );

        $this->assertEquals(
            1, $this->rulebook->nextState(1, "b")
        );

        $this->assertEquals(
            3, $this->rulebook->nextState(2, "b")
        );

        $this->assertEquals(
            3, $this->rulebook->nextState(3, "b")
        );
    }

    /**
     * @test
     *
     * @expectedException LogicException
     */
    public function nextStateThrows()
    {
        $this->rulebook->nextState(4, "c");
    }
}
