<?php

namespace DigiBrains;

class GetFiles {

    private $files;

    public function __construct( $path = '' ) {
        $this->files = [];    
        foreach (array_diff(scandir($path), ['.', '..']) as $file) {
            $this->files[$file] = filemtime($path . '/' . $file);
        }
    }

    public function sortDate( $direction = '' ) {
        if ($direction == 'DESC') {
            arsort($this->files); // newest first
        } elseif ($direction == 'ASC') {
            asort($this->files); // oldest first
        } else {
            // alphabetical/default
        }
        $this->files = array_keys($this->files);
        print_r( ($this->files) ? $this->files : false);
    }

}