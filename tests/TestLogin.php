<?php


class TestLogin extends TestCase
{

    public function testLogin1() {
        $this->driver->get("http://adiphy.com/auth/signin/");
        $this->driver->manage()->window()->maximize();
        $this->waitForLoadComplete();
        $this->driver->findElement(\Facebook\WebDriver\WebDriverBy::id('username'))->sendKeys('hahuyson@gmail.com');
        $this->driver->findElement(\Facebook\WebDriver\WebDriverBy::id('password'))->sendKeys('sonhh!@#123');
        $this->driver->findElement(\Facebook\WebDriver\WebDriverBy::className('btn-login-submit'))->click();
        $this->driver->navigate()->to("http://adiphy.com");
        $this->waitForLoadComplete();
        $i = 1;
//        while ($i<=100){
//            $this->driver->executeScript('javascript:window.scrollBy(1000,1000)');
//            sleep(1);
//            $i++;
//        }

        $this->driver->executeScript('$("div.m-footer div.item-alias").show()');
        $this->driver->executeScript('$("div.m-footer div.item-site").show()');
        $listElms = $this->driver->findElements(\Facebook\WebDriver\WebDriverBy::cssSelector("div.m-footer"));
        $host = "http://adiphy.com/";
        $auth_code = "0d640060cc25b3be2e220b6e47ab526c80b12cd6";
        if($listElms) {
            foreach ($listElms as $k => $element) {
                try{
                    $code = $element->findElement(\Facebook\WebDriver\WebDriverBy::cssSelector("div.item-alias"))->getText();
                    $site = $element->findElement(\Facebook\WebDriver\WebDriverBy::cssSelector("div.item-site"))->getText();

                    if($code!="" && $site = "http://adiphy.com") {
                        $link = $site."/".$code."/".$auth_code;
                        $this->driver->navigate()->to($link);
                        $this->waitForLoadComplete();
                        sleep(4);
                        $this->driver->findElement(\Facebook\WebDriver\WebDriverBy::className("btn-success"))->click();
                    }
                } catch (Exception $e) {
                }

            }
        }


    }
    /**
     * ©¢?i ©Â?n khi n«¢o page load th«¢nh c«Ông
     *
     * @param number $timeout_in_second
     *            th?i gian t«¿nh b?ng ©Â?n v? ph«ât
     * @return void
     */
    public function waitForLoadComplete($timeout_in_second = 30) {
        $this->driver->wait($timeout_in_second, 1000)->until(function () {
            return $this->driver->executeScript("return document.readyState") == "complete";
        });
    }
    /**
     * T?o m?t tab m?i tr«´n browser
     *
     * @param
     *
     * @return void
     */
    public function newTab() {
        $this->driver->getKeyboard()->pressKey(\Facebook\WebDriver\WebDriverKeys::CONTROL);
        $this->driver->getKeyboard()->sendKeys("t");
        $this->driver->switchTo()->defaultContent();
        $this->driver->getKeyboard()->releaseKey(\Facebook\WebDriver\WebDriverKeys::CONTROL);
    }

    /**
     * ©¢«Ñng m?t tab tr«´n browser
     *
     * @param
     *
     * @return void
     */
    public function closeTab() {
        $this->driver->getKeyboard()->pressKey(\Facebook\WebDriver\WebDriverKeys::CONTROL);
        $this->driver->getKeyboard()->sendKeys("w");
        $this->driver->getKeyboard()->releaseKey(\Facebook\WebDriver\WebDriverKeys::CONTROL);
    }
}
