<?php

class AlbumTest extends PHPUnit_Framework_TestCase {

    protected $album;

    public function setUp()
    {
        $this->album = new Uber\Album([
            new Uber\Image(__DIR__ . '/test_files/test.png'),
            new Uber\Image(__DIR__ . '/test_files/test.jpg'),
            new Uber\Image(__DIR__ . '/test_files/test.jpeg')
        ]);
    }

    public function test_it_has_an_array_of_images()
    {
        $this->assertCount(3, $this->album->images());
    }

    public function test_it_can_add_an_image()
    {
        $this->album->add(new Uber\Image(__DIR__ . '/test_files/test.png'));
        $this->assertCount(4, $this->album->images());
    }

}
