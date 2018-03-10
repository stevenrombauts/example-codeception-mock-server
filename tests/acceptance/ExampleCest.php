<?php
use donatj\MockWebServer\MockWebServer;
use donatj\MockWebServer\Response;

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
    self::$__mock_webserver->setResponseOfPath(
      '/wp-json/posts',
      new Response('[{"ID":2224,"title":"Georgia O\u2019Keeffe","content":"<p>To see takes time.<\/p>\n","link":"https:\/\/quotesondesign.com\/georgia-okeeffe-2\/"}]')
    );

    $I->amOnPage('/');
    $I->see('Quote of the day', 'h3');
    $I->see('To see takes time', 'p');
    $I->seeElement('blockquote');
  }
}
