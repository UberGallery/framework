<?php

namespace Uber;

use Uber\Image;
use Exception;

class Album {

    /** @var array Array of Images */
    protected $images;

    /**
     * Uber\Album constructor, runs on object creation
     *
     * @param string $path Path to directory
     */
    public function __construct($path)
    {
        foreach (new \DirectoryIterator($path) as $file) {
            if ($file->isDot()) continue;
            $this->add($file->getPathname());
        }
    }

    /**
     * Adds an individual image to the Album
     *
     * @param  string $image Image path
     *
     * @return object        This Uber\Album object
     */
    public function add($path)
    {
        try {
            $this->images[] = new Image($path);
        } catch (Exception $e) {
            // Fo'get about it...
        }

        return $this;
    }

   /**
     * Get an array of this Album's Images
     *
     * @return array Array of Images
     */
    public function images() {
        return $this->images;
    }

    /**
     * Sort the array of images
     *
     * @return object This Uber\Album object
     */
    public function sort() {
        // TODO: Sort the images array
        return $this;
    }

}
