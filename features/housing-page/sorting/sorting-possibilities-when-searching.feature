Feature: Sorting possibilities when searching housing postings
  As a UX designer
  I want to have reach sorting possibilities when searching housing postings
  In order to <clarification needed>

  @javascript
  Scenario: User views sorting possibilities on housing page
    Given I am on housing page with multiple postings
    When I use search
    And I open sorting possibilities list
    Then I should see extended list of sorting possibilities
