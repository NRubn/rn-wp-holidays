<?php  
class Holiday {
    protected $name;
    protected $active;
    protected $rnhd_script;
    protected $rnhd_style;

    public function __construct($name, $active) {
        $this->name = $name;
        $this->active = $active;
        $this->rnhd_script = (__DIR__).'/assets/script.js';
        $this->rnhd_style = (__DIR__).'/assets/style.css';
        $this->createFilesIfNotExist([$this->rnhd_script, $this->rnhd_style]);
    }

    public function getName() {
        return $this->name;
    }

    public function isActive() {
        return $this->active;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    public function getRnhdScript() {
        return $this->rnhd_script;
    }

    public function getRnhdStyle() {
        return $this->rnhd_style;
    }

    protected function createFilesIfNotExist($files) {
        foreach ($files as $file) {
            $file_path = $file;
            if (!file_exists($file_path)) {
                fopen($file_path, 'w');
            }
        }
    }
}