<?php namespace Magnesium38\Nonogram;

class Nonogram {
    private $rowCount;
    private $columnCount;
    private $rows = [];

    /**
     * @param int $rowCount
     * @param int $columnCount
     * @return Nonogram
     */
    public function __construct($rowCount, $columnCount) {
        $this->rowCount = $rowCount;
        $this->columnCount = $columnCount;

        for ($i = 0; $i < $rowCount; $i++) {
            $this->rows[$i] = new Row($columnCount);
        }
    }

    public function get($row, $column) {
        return $this->rows[$row]->get($column);
    }

    public function set($row, $column, $value) {
        $this->rows[$row]->set($column, $value);
    }

    public function erase($row, $column) {
        $this->rows[$row]->erase($column);
    }

    public function html() {
        $nonogram = "<table>";

        foreach ($this->rows as $row) {
            $nonogram = $nonogram . "<tr>";

            for ($i = 0; i < $this->columnCount; $i++) {
                $color = $row->get($i);

                if (is_null($color)) {
                    $nonogram = $nonogram . '<td>&nbsp;</td>';
                } else {
                    $nonogram = $nonogram . '<td style="background-color:';
                    $nonogram = $nonogram . $color->getHex('#');
                    $nonogram = $nonogram . '">&nbsp;</td>';
                }
            }

            $nonogram = $nonogram . "</tr>";
        }

        $nonogram = $nonogram . "</table>";
        return $nonogram;
    }
}