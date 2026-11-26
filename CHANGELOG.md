# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.1] - 26 November 2026
### Fixed
- The admin page of this module could be opened without being logged in to the Admin Panel, because its controller skipped Magento's admin authentication and ACL check; it now requires login and the `YireoTraining_ExampleLokiAdminComponents::form` ACL resource
- Loki form loads, saves and deletes on the admin page were not tied to any ACL resource; they now require `YireoTraining_ExampleLokiAdminComponents::form`
- The controller referred to a non-existing `::grid` ACL resource and the ACL entries sat loose under the admin root; they are now nested under Content > Elements with a parent `::index` resource for the menu

### Changed
- Declared the dependencies on Loki Admin Components and Magento Backend in composer.json and module.xml

## [1.0.0] - 03 November 2026
### Fixed
- Add hidden-attribute to field-blocks
- Adding all files to git via Yireo Command

