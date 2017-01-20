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
    protected function setUp($browser='chrome')
    {
        $this->desiredCapabilities = new DesiredCapabilities();
        $browserName = 'chrome';
        $this->desiredCapabilities->setBrowserName($browserName);
        $time_out_in_ms = 3000000000000;
        if ($this->createWebDriver) {
            $this->driver = RemoteWebDriver::create($this->serverUrl, $this->desiredCapabilities,$time_out_in_ms, $time_out_in_ms);
        }

//        $dir = dirname(dirname(dirname(__FILE__)));
//        $host = 'http://localhost:4444/wd/hub';
//        switch ($browser) {
//            case 'chrome' :
//                $capabilities = \DesiredCapabilities::htmlUnitWithJS();
//                {
//                    $options = new \ChromeOptions();
//                    $prefs = array(
//                        'download.default_directory' => 'c:\\Users\\phamduyhai\\Desktop\\',
//                        'download.directory_upgrade' => 'true',
//                        'download.extensions_to_open' => '',
//                        'download.prompt_for_download' => 'false',
//                    );
//                    $options->setExperimentalOption('prefs', $prefs);
//                    $capabilities = \DesiredCapabilities::chrome();
//                    $capabilities->setCapability(\ChromeOptions::CAPABILITY, $options);
//                }
//                self::$webDriver = \RemoteWebDriver::create($host, $capabilities, $time_out_in_ms, $time_out_in_ms);
//                break;
//            case "ie" :
//                $capabilities = \DesiredCapabilities::internetExplorer();
//                self::$webDriver = \RemoteWebDriver::create($host, $capabilities, $time_out_in_ms, $time_out_in_ms);
//                break;
//            case 'firefox' :
//                $profile = new \FirefoxProfile();
//                $profile->setPreference("browser.download.panel.shown", 'false');
//                $profile->setPreference("browser.download.manager.showWhenStarting", 'false');
//                $profile->setPreference("browser.helperApps.neverAsk.saveToDisk", "application/csv");
//                $profile->setPreference("browser.download.folderList", 2);
//                $profile->setPreference("browser.download.dir", "c:\\Users\\phamduyhai\\Desktop\\");
//                $capabilities = \DesiredCapabilities::firefox();
//                $capabilities->setCapability(\FirefoxDriver::PROFILE, $profile);
//                self::$webDriver = \RemoteWebDriver::create($host, $capabilities, $time_out_in_ms, $time_out_in_ms);
//                break;
//            case "firefox_addon" :
//                // using version firefox 47.0.1
//                $profile = new \FirefoxProfile();
//
//                // config not save cache browser
//                $profile->setPreference("browser.cache.disk.enable", false);
//                $profile->setPreference("browser.cache.memory.enable", false);
//                $profile->setPreference("browser.cache.offline.enable", false);
//                $profile->setPreference("network.http.use-cache", false);
//
//                // config firebug
//                $profile->addExtension($dir . '\add-on\firebug-2.0.17b1.xpi');
//                $profile->setPreference("extensions.firebug.currentVersion", "2.0.11");
//                $profile->setPreference("extensions.firebug.showStackTrace", true);
//                $profile->setPreference("extensions.firebug.delayLoad", false);
//                $profile->setPreference("extensions.firebug.showFirstRunPage", false);
//                $profile->setPreference("extensions.firebug.allPagesActivation", "on");
//                $profile->setPreference("extensions.firebug.console.enableSites", true);
//                $profile->setPreference("extensions.firebug.net.enableSites", true);
//                $profile->setPreference("extensions.firebug.scripts.enableSites", true);
//                $profile->setPreference("extensions.firebug.defaultPanelName", "console");
//
//                // config net export
//                $profile->addExtension($dir . '\add-on\netExport-0.9b7.xpi');
//                $profile->setPreference("extensions.firebug.netexport.alwaysEnableAutoExport", true);
//                $profile->setPreference("extensions.firebug.netexport.showPreview", false);
//                $profile->setPreference("extensions.firebug.netexport.includeResponseBodies", false);
//                $profile->setPreference("extensions.firebug.netexport.defaultLogDir", $dir . '\log');
//                $profile->setPreference("extensions.firebug.netexport.harFileName", @"network");
//
//                // config console export
//                $profile->addExtension($dir . '\add-on\consoleExport-0.5b5.xpi');
//                $profile->setPreference("extensions.firebug.consoleexport.active", true);
//                $profile->setPreference("extensions.firebug.consoleexport.alwaysEnableAutoExport", true);
//                $profile->setPreference("extensions.firebug.consoleexport.format", "xml");
//
//                $capabilities = \DesiredCapabilities::firefox();
//                $capabilities->setCapability(\FirefoxDriver::PROFILE, $profile);
//                self::$webDriver = \RemoteWebDriver::create($host, $capabilities, $time_out_in_ms, $time_out_in_ms);
//
//                // wait for load add-on
//                sleep(3);
//                break;
//            default :
//                break;
//        }
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
