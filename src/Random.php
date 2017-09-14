<?php

namespace PragmaRX\Recovery;

class Random
{
    protected $lowercase = false;

    protected $uppercase = false;

    /**
     * @param $length
     * @return string
     */
    protected function generate($length)
    {
        $string = '';

        while (($len = strlen($string)) < $length) {
            $size = $length - $len;

            $bytes = random_bytes($size);

            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }

        return $string;
    }

    /**
     * Get lowercase state.
     *
     * @return bool
     */
    public function isLowercase()
    {
        return $this->lowercase;
    }

    /**
     * Get uppercase state.
     *
     * @return bool
     */
    public function isUppercase()
    {
        return $this->uppercase;
    }

    /**
     * Return a string in the proper case.
     *
     * @param $string
     * @return string
     */
    private function changeCase($string)
    {
        if ($this->isLowercase()) {
            return strtolower($string);
        }

        if ($this->isUppercase()) {
            return strtoupper($string);
        }

        return $string;
    }

    /**
     * Set the lowercase state.
     *
     * @param $state
     * @return $this
     */
    public function setLowercase($state = true)
    {
        $this->uppercase = false;

        $this->lowercase = $state;

        return $this;
    }

    /**
     * Set the uppercase state.
     *
     * @param $state
     * @return $this
     * @internal param bool $uppercase
     */
    public function setUppercase($state = true)
    {
        $this->lowercase = false;

        $this->uppercase = $state;

        return $this;
    }

    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * Extracted from Laravel Framework: Illuminate\Support\Str
     *
     * @param  int $length
     * @return string
     */
    public function str($length = 16)
    {
        return $this->changeCase($this->generate($length));
    }
}
