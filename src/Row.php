<?php namespace Magnesium38\Nonogram;

use Intervention\Image\AbstractColor;

class Row {
    private $row;

    /**
     * Row constructor.
     * @param $size
     */
    public function __construct($size) {
        for ($i = 0; $i < $size; $i++) {
            $row[$i] = null;
        }
    }

    /**
     * Get returns the Color at the given $offset.
     *
     * @param int $offset
     * @return AbstractColor|null
     */
    public function get($offset) {
        return $this->row[$offset];
    }

    /**
     * Set sets the Color $value for the given $offset.
     *
     * @param int $offset
     * @param AbstractColor|null $value
     * @return void
     */
    public function set($offset, AbstractColor $value) {
        $this->row[$offset] = $value;
    }

    /**
     * Erase erases the color at the given $offset.
     *
     * @param $offset
     * @return void
     */
    public function erase($offset) {
        $this->row[$offset] = null;
    }
}