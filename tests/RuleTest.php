<?php

namespace TuringPHP\DFA\Tests;

use TuringPHP\DFA\Rule;

/**
 * @covers TuringPHP\DFA\Rule
 */
class RuleTest extends Test
{
    /**
     * @var Rule
     */
    protected $rule;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->rule = new Rule(1, "a", 2);
    }

    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        $this->rule = null;
    }

    /**
     * @test
     */
    public function applyTo()
    {
        $this->assertTrue(
            $this->rule->appliesTo(1, "a")
        );

        $this->assertFalse(
            $this->rule->appliesTo(1, "b")
        );

        $this->assertFalse(
            $this->rule->appliesTo(2, "a")
        );
    }

    /**
     * @test
     */
    public function follow()
    {
        $this->assertEquals(
            2, $this->rule->follow()
        );
    }
}
