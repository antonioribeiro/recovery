<?php

namespace PragmaRX\Recovery;

class Recovery
{
    protected $codes = [];

    protected $count = 8;

    protected $blocks = 2;

    protected $chars = 10;

    protected $lowercase = true;

    protected $random;

    /**
     * Recovery constructor.
     *
     * @param Random $random
     */
    public function __construct(Random $random)
    {
        $this->random = $random;
    }

    /**
     * Generate the recovery codes.
     *
     * @return array
     */
    private function generate()
    {
        $this->reset();

        foreach (range(1, $this->getCount()) as $counter) {
            $this->codes[] = $this->generateBlocks();
        }

        return $this->codes;
    }

    /**
     * Generate all blocks.
     *
     */
    private function generateBlocks()
    {
        $blocks = [];

        foreach (range(1, $this->getBlocks()) as $counter) {
            $blocks[] = $this->generateChars();
        }

        return $blocks;
    }

    /**
     * Generate random chars.
     *
     * @return string
     */
    private function generateChars()
    {
        return $this->random->str($this->getChars(), $this->getLowercase());
    }

    /**
     * Get lowercase codes state.
     *
     * @return bool
     */
    public function getLowercase()
    {
        return $this->lowercase;
    }

    /**
     * Check if codes must be generated.
     *
     * @return bool
     */
    private function mustGenerate()
    {
        return count($this->codes) == 0;
    }

    /**
     * Set lowercase codes state.
     *
     * @param bool $lowercase
     * @return Recovery
     */
    public function setLowercase($lowercase)
    {
        $this->lowercase = $lowercase;

        return $this;
    }

    /**
     * Get an array of recovery codes.
     *
     * @return array
     */
    public function toArray()
    {
        if ($this->mustGenerate()) {
            return $this->generate();
        }

        return $this->getCodes();
    }

    /**
     * Get a json of recovery codes.
     *
     * @return array
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * Get the blocks size.
     *
     * @return int
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    /**
     * Get the chars count.
     *
     * @return int
     */
    public function getChars()
    {
        return $this->chars;
    }

    /**
     * Get the codes.
     *
     * @return array
     */
    public function getCodes()
    {
        return $this->codes;
    }

    /**
     * Get the codes count.
     *
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Reset generated codes.
     *
     */
    private function reset()
    {
        $this->codes = [];
    }

    /**
     * Set the blocks size.
     *
     * @param int $blocks
     * @return Recovery
     */
    public function setBlocks($blocks)
    {
        $this->blocks = $blocks;

        $this->reset();

        return $this;
    }

    /**
     * Set the chars count.
     *
     * @param int $chars
     * @return Recovery
     */
    public function setChars($chars)
    {
        $this->chars = $chars;

        $this->reset();

        return $this;
    }

    /**
     * Set the codes count.
     *
     * @param int $count
     * @return Recovery
     */
    public function setCount($count)
    {
        $this->count = $count;

        $this->reset();

        return $this;
    }
}
