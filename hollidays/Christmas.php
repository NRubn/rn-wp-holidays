<?php
require_once('Holiday.php');

class Christmas extends Holiday {
    public function __construct($active) {
        parent::__construct("Christmas", $active);
        $this->rnhd_script = '/assets/rn-christmas-script.js';
        $this->rnhd_style = '/assets/rn-christmas-style.css';
        $this->createFilesIfNotExist([$this->rnhd_script, $this->rnhd_style]);
    }

    public function loadScript() {
        if ($this->active) {
            echo '<script src="' . $this->rnhd_script . '"></script>';
        }
    }

    public function loadStyle() {
        if ($this->active) {
            echo '<link rel="stylesheet" href="' . $this->rnhd_style . '">';
        }
    }
}



?>
