Feature: Onboarding Wizard
	In order to initially setup the SSP plugin
	As an admin user
	I need to be able to setup it via onboarding wizard

	Scenario: Setup main settings via onboarding wizard
		Given I want to "Test the connection"
		When I am on the homepage
		Then I can see "WordPress Test"
