<?php

namespace PragmaRX\Recovery;

use PragmaRX\Random\Random;

class Recovery
{
    protected $codes = [];

    protected $count = 8;

    protected $blocks = 2;

    protected $chars = 10;

    protected $random;

    protected $blockSeparator = '-';

    private $collectionFunction = 'collect';

    /**
     * Recovery constructor.
     *
     * @param Random $random
     */
    public function __construct(Random $random = null)
    {
        if (is_null($random)) {
            $random = new Random();
        }

        $this->random = $random;
    }

    /**
     * Set to alpha codes.
     *
     * @return Recovery
     */
    public function alpha()
    {
        $this->random->alpha();

        return $this;
    }

    /**
     * Generate the recovery codes.
     *
     * @return array
     */
    protected function generate()
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
     * @return array
     */
    protected function generateBlocks()
    {
        $blocks = [];

        foreach (range(1, $this->getBlocks()) as $counter) {
            $blocks[] = $this->generateChars();
        }

        return implode($this->blockSeparator, $blocks);
    }

    /**
     * Generate random chars.
     *
     * @return string
     */
    protected function generateChars()
    {
        return $this->random->size($this->getChars())->get();
    }

    /**
     * Check if codes must be generated.
     *
     * @return bool
     */
    protected function mustGenerate()
    {
        return count($this->codes) == 0;
    }

    /**
     * Set lowercase codes state.
     *
     * @param bool $state
     * @return Recovery
     */
    public function lowercase($state = true)
    {
        $this->random->lowercase($state);

        return $this;
    }

    /**
     * Set the block separator.
     *
     * @param string $blockSeparator
     * @return Recovery
     */
    public function setBlockSeparator($blockSeparator)
    {
        $this->blockSeparator = $blockSeparator;

        return $this;
    }

    /**
     * Set the collection function.
     *
     * @param string $collectionFunction
     * @return Recovery
     */
    public function collectionFunction($collectionFunction)
    {
        $this->collectionFunction = $collectionFunction;

        return $this;
    }

    /**
     * Set uppercase codes state.
     *
     * @param bool $state
     * @return Recovery
     */
    public function uppercase($state = true)
    {
        $this->random->uppercase($state);

        return $this;
    }

    /**
     * Set mixedcase codes state.
     *
     * @return Recovery
     */
    public function mixedcase()
    {
        $this->random->mixedcase();

        return $this;
    }

    /**
     * Set to numeric codes.
     *
     * @return Recovery
     */
    public function numeric()
    {
        $this->random->numeric();

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
     * Get a collection of recovery codes.
     *
     * @return array
     * @throws \Exception
     */
    public function toCollection()
    {
        if (function_exists($this->collectionFunction)) {
            return call_user_func($this->collectionFunction, $this->toArray());
        }

        throw new \Exception("Function {$this->collectionFunction}() was not found. You probably need to install a suggested package?");
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
    protected function reset()
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
