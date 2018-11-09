Feature: Housing postings sorting by price from highest to lowest
  As a visitor
  I want to be able to sort housing postings by price from highest to lowest
  In order to be able to find luxurious postings easily

  @javascript
  Scenario: User sorts housing postings by price from highest to lowest
    Given I am on housing page with multiple postings listed at different prices
    When I sort by price from highest to lowest
    Then postings are sorted by price from highest to lowest

    When I reload the page
    Then postings are sorted by price from highest to lowest
