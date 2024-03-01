<?php
class TableCreator {

    private $table;

    public function __construct() {
        $this->table = '<table class="table">';
    }

    public function addRow($row) {
        $this->table .= '<tr>';
        foreach ($row as $cell) {
            $this->table .= '<td>' . $cell . '</td>';
        }
        $this->table .= '</tr>';
    }

    public function endTable() {
        $this->table .= '</table>';
        return $this->table;
    }
}

