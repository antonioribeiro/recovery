<?php

namespace PragmaRX\Recovery;

class Random
{
    protected $lowercase = false;

    protected $uppercase = false;

    protected $numeric = false;

    /**
     * Generate a random string.
     *
     * @param $length
     * @return string
     */
    protected function generate($length)
    {
        $string = '';

        while (strlen($string) < $length) {
            $string .= $this->numeric
                ? $this->generateNumeric($length)
                : $this->generateAlpha($length);
        }

        return substr($string, 0, $length);
    }

    /**
     * Generate a random string.
     *
     * @param $size
     * @return mixed
     */
    private function generateAlpha($size)
    {
        return str_replace(['/', '+', '='], '', base64_encode(random_bytes($size)));
    }

    /**
     * Generate a numeric random value.
     *
     * @return int
     */
    private function generateNumeric()
    {
        return random_int(0, 9999999999);
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
    public function lowercase($state = true)
    {
        $this->mixedcase()->lowercase = $state;

        return $this;
    }

    /**
     * Set case to mixed.
     *
     * @return $this
     */
    public function mixedcase()
    {
        $this->uppercase = false;

        $this->lowercase = false;

        return $this;
    }

    /**
     * Set result to numeric.
     *
     * @param bool $state
     * @return $this
     */
    public function numeric($state = true)
    {
        $this->numeric = $state;

        return $this;
    }

    /**
     * Set result to alpha.
     *
     * @param bool $state
     * @return $this
     */
    public function alpha($state = true)
    {
        $this->numeric = !$state;

        return $this;
    }

    /**
     * Set the uppercase state.
     *
     * @param $state
     * @return $this
     * @internal param bool $uppercase
     */
    public function uppercase($state = true)
    {
        $this->mixedcase()->uppercase = $state;

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
