<?php

//use Illuminate\Foundation\Testing\WithoutMiddleware;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Illuminate\Foundation\Testing\DatabaseTransactions;
use Facebook\WebDriver\Exception\NoSuchWindowException;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\WebDriverBrowserType;
class TestCase extends \PHPUnit_Framework_TestCase
{
    /** @var bool Indicate whether WebDriver should be created on setUp */
    protected $createWebDriver = true;
    /** @var string */
    protected $serverUrl = 'http://192.168.33.1:4444/wd/hub';
    /** @var RemoteWebDriver $driver */
    protected $driver;
    /** @var DesiredCapabilities */
    protected $desiredCapabilities;
    protected function setUp()
    {
        $this->desiredCapabilities = new DesiredCapabilities();
        $browserName = 'chrome';
        $this->desiredCapabilities->setBrowserName($browserName);
        $time_out_in_ms = 3000000000000;
        if ($this->createWebDriver) {
            $this->driver = RemoteWebDriver::create($this->serverUrl, $this->desiredCapabilities,$time_out_in_ms, $time_out_in_ms);
        }
    }
//    protected function tearDown()
//    {
//        if ($this->driver instanceof RemoteWebDriver && $this->driver->getCommandExecutor()) {
//            try {
//                $this->driver->quit();
//            } catch (NoSuchWindowException $e) {
//                // browser may have died or is already closed
//            }
//        }
//    }

    /**
     * Get the URL of the test html on filesystem.
     *
     * @param $path
     * @return string
     */
    protected function getTestPath($path)
    {
        return 'file:///' . __DIR__ . '/web/' . $path;
    }
    /**
     * Get the URL of given test HTML on running webserver.
     *
     * @param string $path
     * @return string
     */
    protected function getTestPageUrl($path)
    {
        return 'http://adiphy.com/' . $path;
    }
}
