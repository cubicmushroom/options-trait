<?php

namespace CubicMushroom\OptionsTrait;

/**
 * Class OptionsTraitTest
 *
 * Tests for the OptionsTrait class
 *
 * @package CubicMushroom\OptionsTrait
 */
class OptionsTraitTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }


    protected function tearDown()
    {
    }


    /**
     * Tests setting options
     */
    public function testSettingOptions()
    {
        $options = [
            'option1' => 123,
            'option2' => 'abc',
            'option3' => new \DateTime(),
        ];
        $o       = new TestClass($options);

        $setOptions = $o->getOptions();

        foreach ($options as $key => $value) {
            $this->assertEquals($value, $setOptions[$key]);
        }
    }


    /**
     * Tests getting options
     */
    public function testGettingOptions()
    {
        $options = [
            'option1' => 123,
            'option2' => 'abc',
            'option3' => new \DateTime(),
        ];
        $o       = new TestClass($options);

        foreach ($options as $key => $value) {
            $this->assertEquals($value, $o->getOption($key));
        }
    }


    /**
     * Tests checking for an option
     */
    public function testCheckingForAnOption()
    {
        $options = [
            'option1' => 123,
            'option2' => 'abc',
            'option3' => new \DateTime(),
        ];
        $o       = new TestClass($options);

        foreach ($options as $key => $value) {
            $this->assertTrue($o->hasOption($key));
        }

        $this->assertFalse($o->hasOption('option99'));
    }


    /**
     * Tests returning a default option value when not set
     */
    public function testReturningADefaultOptionValueWhenNotSet()
    {
        $default = 'xyz';

        $o = new TestClass([]);

        $this->assertEquals($default, $o->getOption('notSet', $default));

        $this->markTestIncomplete();
    }


    /**
     * Tests using default values for options
     */
    public function testUsingDefaultValuesForOptions()
    {
        $defaults = [
            'option1' => 123,
            'option2' => 'abc',
            'option3' => new \DateTime(),
        ];
        $options = [
            'option1' => 789,
            'option4' => 'xyz',
            'option5' => new TestClass([]),
        ];

        $o = new TestClassWithDefaults($options, $defaults);

        $this->assertEquals($options['option1'], $o->getOption('option1'));
        $this->assertEquals($defaults['option2'], $o->getOption('option2'));
        $this->assertEquals($defaults['option3'], $o->getOption('option3'));
        $this->assertEquals($options['option4'], $o->getOption('option4'));
        $this->assertEquals($options['option5'], $o->getOption('option5'));
    }


    /**
     * Tests not passing default values to setOptions works OK
     */
    public function testNotPassingDefaultValuesToSetOptionsWorksOk()
    {
        $options = [
            'option1' => 123,
            'option2' => 'abc',
            'option3' => new \DateTime(),
        ];

        $o = new TestClassNotUsingDefaults($options);

        $setOptions = $o->getOptions();

        $this->assertEquals($options, $setOptions);
    }
}


class TestClass
{
    use OptionTrait;


    /**
     * @param array $options
     */
    function __construct(array $options)
    {
        foreach ($options as $key => $value) {
            $this->setOption($key, $value);
        }
    }


    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
}


class TestClassWithDefaults
{
    use OptionTrait;

    /**
     * @param array $options
     * @param array $defaults
     */
    function __construct(array $options, array $defaults)
    {
        $this->setOptions($options, $defaults);
    }
}

class TestClassNotUsingDefaults
{
    use OptionTrait;

    /**
     * @param array $options
     */
    function __construct(array $options)
    {
        $this->setOptions($options);
    }


    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
}