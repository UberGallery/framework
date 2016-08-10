<?php

class GalleryTest extends PHPUnit_Framework_TestCase {

    protected $album;
    protected $gallery;

    public function setUp()
    {
        $this->album   = new Uber\Album([
            new Uber\Image(__DIR__ . '/test_files/test.png'),
            new Uber\Image(__DIR__ . '/test_files/test.jpg'),
            new Uber\Image(__DIR__ . '/test_files/test.jpeg')
        ]);

        $this->gallery = new Uber\Gallery();
    }

    public function test_it_has_an_array_of_albums()
    {
        $this->assertEquals([], $this->gallery->albums());
    }

    public function test_it_can_add_an_album()
    {
        $this->gallery->add($this->album);
        $this->assertCount(1, $this->gallery->albums());
    }

    public function test_it_can_initialize_multiple_albums()
    {
        $gallery = new Uber\Gallery([$this->album, $this->album]);
        $this->assertCount(2, $gallery->albums());
    }

}
