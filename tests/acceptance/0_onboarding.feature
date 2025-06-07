Feature: Onboarding Wizard
	In order to initially setup the SSP plugin
	As an admin user
	I need to be able to setup it via onboarding wizard

	Background:
		Given I login as admin
		And I am on the plugins page
		And I can see SSP plugin is deactivated

	Scenario: Setup main settings via onboarding wizard
		Given I want to "Get to onboarding wizard when plugin is first activated"
		When I activate the SSP plugin
		Then I can see the Onboarding Wizard
		And I can see that I am on the "Welcome" step of onboarding wizard
