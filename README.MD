# PHP Sandbox

This is a place for me to play and keep up-to-date with my PHP.
There are multiple sub-projects, and there may not be consistency across
their usage of PHP versions or supporting structures.

## First Time Back to PHP in a while?
To shake some of the rust off, find a challenge folder
(such as challenges/leetcode/steps-to-zero) set up, and run the tests:

1. Build the `vendor` folder (dependencies):
```
composer install
```
2. From the challenge's root folder, run all the tests
```
vendor/bin/phpunit tests/
```