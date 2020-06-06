<?php

namespace SageworksStudio;

class GetFiles {

    private $path;
    private $order;
    private $exclude;

    public function __construct( $path = '', $order = '', $exclude = '' ) {
        $this->path = $path;
        $this->order = $order;
        $this->exclude = $exclude;
    }

    public function sortDate() {
        $files = [];    
        foreach (array_diff(scandir($this->path), $this->exclude) as $file) {
            $files[$file] = filemtime($this->path . '/' . $file);
        }

        if ($this->order == 'DESC') {
            arsort($files); // newest first
        } elseif ($this->order == 'ASC') {
            asort($files); // oldest first
        } else {
            // alphabetical/default
        }
        $files = array_keys($files);

        return json_encode($files);
    }

}