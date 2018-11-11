# Behat acceptance testing example
Example of acceptance tests for sorting related features on [craigslist.org](https://springfieldil.craigslist.org/d/housing/search/hhh).

## Installation
Make sure you have [Docker](https://www.docker.com/) and [Docker Compose](https://docs.docker.com/compose/) installed.
```bash
git clone git@github.com:RomanShumkov/behat-acceptance-testing-example.git example

# it will take some time to download docker images and composer packages
cd example && docker-compose run composer install
```

## Run the tests
Following command will run the tests in Chrome browser:
```bash
docker-compose run behat
```

## Declarative scenarios
Declarative approach is used for creating scenarios which makes them easier to read and understand even for non-technical people.

## Page objects
Knowledge about UI implementation details is encapsulated in so called page objects. This way things like CSS classes can be easily changed in system under test without having to refactor all related tests.

## Debugging
In case of test failure browser screenshots are created automatically and placed in ./screenshots directory.
