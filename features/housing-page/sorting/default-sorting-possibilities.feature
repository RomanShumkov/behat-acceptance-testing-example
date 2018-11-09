Feature: Default sorting possibilities on housing page
  As a UX designer
  I want to keep sorting possibilities at minimum by default
  In order to keep visitor focused on actual postings

  @javascript @bar
  Scenario: User views sorting possibilities on housing page
    Given I am on housing page with multiple postings
    When I open sorting possibilities list
    Then I should see default list of sorting possibilities