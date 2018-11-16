@purchaseAccessory @production
Feature: Purchase accessories men
  In order to verify that the purchase process and the quantities that have been purchased are correct
  As a website user
  I am able to complete the different cases of purchase of accessories correctly


  Scenario: Purchase multiple accessories
    Given I am on the home home
    And I search "ties for men"
    And I add to cart "2" quantity the first product list
    And I should see in cart the price and "2" quantity are correct
    When I search "ties for men"
    And I add to cart "1" quantity the first product list
    Then I should see in cart the price and "3" quantity are correct
    And I remove "1" quantity the first accessory add to cart
    And I should see total price and "2" quantity are changed correctly