Feature: The management users
  In order to register the user in website
  As user
  I am able to register to the website
  
  Scenario: Create a new user with all information
    Given I am on user register home page
    When I fill the data user registration
    And I submit de form registration
    Then I should see the confirmation message create user
    And I fill info about user preferences
    And I go to account user mail
    And I click mail to confirm user register

  Scenario: Create a new user without newsletter
    Given I am on user register home page
    When I fill the data user registration without newsletter
    And I submit de form registration
    Then I should see the confirmation message create user
    And I go to account user mail
    And I click mail to confirm user register

  Scenario: Create a new user with all information
    Given I am on user register home page
    When I fill the data user registration
    And I submit de form registration
    Then I should see the confirmation message create user
    And I go to account user mail
    And I click mail to confirm user register

  Scenario: Create again a user registered
    Given I am on user register home page
    When I fill the data user registration with user registered
    Then I should see the message error duplicate user

  Scenario: Create a new user with wrong email
    Given I am on user register home page
    When I fill the data user registration with incorrect email
    Then I should see error message "wrong email"

  Scenario: Create a new user not fill in any obligatory field of the form
    Given I am on user register home page
    When I don't fill any data user registration
    Then I should see error message "Este campo es obligatorio"

