<?php
namespace Image\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Image\View\Helper\ImageHelper;

/**
 * Image\View\Helper\ImageHelper Test Case
 */
class ImageHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Image\View\Helper\ImageHelper
     */
    public $Image;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Image = new ImageHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Image);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
