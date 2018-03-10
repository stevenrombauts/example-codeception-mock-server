<?php
class ExampleCest
{
  public function _before(AcceptanceTester $I)
  {
  }

  public function _after(AcceptanceTester $I)
  {
  }

  public function checkQuote(AcceptanceTester $I)
  {
    $I->amOnPage('/');
    $I->see('Quote of the day', 'h3');
    $I->seeElement('blockquote');
    $I->dontSee('An error occurred');
  }
}
