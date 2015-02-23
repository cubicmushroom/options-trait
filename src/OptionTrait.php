<?php
/**
 * Created by PhpStorm.
 * User: toby
 * Date: 23/02/15
 * Time: 09:52
 */

namespace CubicMushroom\OptionsTrait;

trait OptionTrait
{

    /**
     * @var array
     */
    protected $options = [];

    // -----------------------------------------------------------------------------------------------------------------
    // Getters and Setters
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Returns true if the requested option is set, or false otherwise
     *
     * @param string $key
     *
     * @return bool
     */
    public function hasOption($key)
    {
        return isset($this->options[$key]);
    }


    /**
     * Returns an option, or the default if the requested option is not available
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getOption($key, $default = null)
    {
        if (!$this->hasOption($key)) {
            return $default;
        }

        return $this->options[$key];
    }


    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function setOption($key, $value)
    {
        $this->options[$key] = $value;

        return $this;
    }


    /**
     * @param array $options  Options passed
     * @param array $defaults Default options
     *
     * @return $this
     */
    public function setOptions(array $options, array $defaults)
    {
        $options = array_merge($defaults, $options);

        $this->options = $options;

        return $this;
    }
}