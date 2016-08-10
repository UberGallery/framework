<?php

namespace Uber;

use Exception;

class Album {

    /** @var array Array of Uber\Image objects */
    protected $images;

    /**
     * Uber\Album constructor, runs on object creation
     *
     * @param array $images Array of Uber\Image objects
     */
    public function __construct(array $images = [])
    {
        foreach ($images as $image) {
            $this->add($image);
        }
    }

    /**
     * Adds an individual image to the Album
     *
     * @param  object $image Instance of Uber\Image
     *
     * @return object        This Uber\Album object
     */
    public function add(Image $image)
    {
        $this->images[] = $image;
        return $this;
    }

   /**
     * Get an array of this Album's Images
     *
     * @return array Array of Images
     */
    public function images()
    {
        return $this->images;
    }

    /**
     * Sort the array of images
     *
     * @return object This Uber\Album object
     */
    public function sort()
    {
        // TODO: Sort the images array
        return $this;
    }

}
