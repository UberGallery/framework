<?php

class ImageTest extends PHPUnit_Framework_TestCase
{
    protected $png;
    protected $jpg;
    protected $jpeg;

    public function setUp()
    {
        $this->png  = new Uber\Image(__DIR__ . '/test_files/test.png');
        $this->jpg  = new Uber\Image(__DIR__ . '/test_files/test.jpg');
        $this->jpeg = new Uber\Image(__DIR__ . '/test_files/test.jpeg');
    }

    public function test_image_has_contents()
    {
        $this->assertNotNull($this->png->contents());
        $this->assertNotNull($this->jpg->contents());
        $this->assertNotNull($this->jpeg->contents());
    }

    public function test_image_has_base64()
    {
        $this->assertRegExp('/^([a-zA-Z0-9\/+]+=*)$/', $this->png->base64());
        $this->assertRegExp('/^([a-zA-Z0-9\/+]+=*)$/', $this->jpg->base64());
        $this->assertRegExp('/^([a-zA-Z0-9\/+]+=*)$/', $this->jpeg->base64());
    }

    public function test_image_has_a_width()
    {
        $this->assertEquals(320, $this->png->width());
        $this->assertEquals(320, $this->jpg->width());
        $this->assertEquals(320, $this->jpeg->width());
    }

    public function test_image_has_a_height()
    {
        $this->assertEquals(240, $this->png->height());
        $this->assertEquals(240, $this->jpg->height());
        $this->assertEquals(240, $this->jpeg->height());
    }

    public function test_image_has_mimeType()
    {
        $this->assertEquals('image/png', $this->png->mimeType());
        $this->assertEquals('image/jpeg', $this->jpg->mimeType());
        $this->assertEquals('image/jpeg', $this->jpeg->mimeType());
    }

    public function test_image_has_exif()
    {
        $this->assertNotNull($this->jpg->exif());
        $this->assertNotNull($this->jpeg->exif());
    }

    public function test_image_can_be_resized()
    {
        $pngThumb = $this->png->resize(160, 120);
        $this->assertEquals(160, $pngThumb->width());
        $this->assertEquals(120, $pngThumb->height());

        $jpgThumb = $this->jpg->resize(160, 120);
        $this->assertEquals(160, $jpgThumb->width());
        $this->assertEquals(120, $jpgThumb->height());

        $jpegThumb = $this->jpeg->resize(160, 120);
        $this->assertEquals(160, $jpegThumb->width());
        $this->assertEquals(120, $jpegThumb->height());
    }

    /** @test @expectedException Exception */
    public function test_throw_exception_for_invalid_file_type()
    {
        $image = new Uber\Image(__DIR__ . '/test_files/test.txt');
    }
}
