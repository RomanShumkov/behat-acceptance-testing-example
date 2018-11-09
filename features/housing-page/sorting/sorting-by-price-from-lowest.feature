Feature: Housing postings sorting by price from lowest to highest
  As a visitor
  I want to be able to sort housing postings by price from lowest to highest
  In order to be able to find cheapest postings easily

  @javascript
  Scenario: User sorts housing postings by price from lowest to highest
    Given I am on housing page with multiple postings listed at different prices
    When I sort by price from lowest to highest
    Then postings are sorted by price from lowest to highest

    When I reload the page
    Then postings are sorted by price from lowest to highest
