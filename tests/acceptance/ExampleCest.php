<?php
use donatj\MockWebServer\MockWebServer;

class ExampleCest
{
  private static $__mock_webserver;

  public function _before(AcceptanceTester $I)
  {
    $server = new MockWebServer(8001);
    $server->start();

    self::$__mock_webserver = $server;
  }

  public function _after(AcceptanceTester $I)
  {
    self::$__mock_webserver->stop();
  }

  public function checkQuote(AcceptanceTester $I)
  {
    $I->amOnPage('/');
    $I->see('Quote of the day', 'h3');
    $I->seeElement('blockquote');
    $I->dontSee('An error occurred');
  }
}
