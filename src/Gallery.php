<?php

namespace Uber;

class Gallery {

    /** @var array Array of Albums */
    protected $albums = [];

    /**
     * Uber\Gallery constructor, runs on object creation
     *
     * @param string $albums Array of album directory paths
     */
    public function __construct(array $albums = [])
    {
        foreach ($albums as $album) $this->add($album);
    }

    /**
     * Adds an album to the Gallery
     *
     * @param object  $album Instance of Uber\Album
     *
     * @return object        This Uber\Gallery object
     */
    public function add(Album $album)
    {
        $this->albums[] = $album;
        return $this;
    }

    /**
     * Get an array of this Gallery's Albums
     *
     * @return array Array of Albums
     */
    public function albums()
    {
        return $this->albums;
    }

}
