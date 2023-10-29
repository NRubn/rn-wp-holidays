<?php
require_once('Holiday.php');

class Christmas extends Holiday {
    public function __construct($active) {
        parent::__construct("Christmas", $active);
    }

    public function loadScript() {
        if ($this->active) {
            echo '<script src="'..'"></script>';
        }
    }

    public function loadStyle() {
        if ($this->active) {
            echo '<link rel="stylesheet" href="' . $this->rnhd_style . '">';
        }
    }
}



?>
