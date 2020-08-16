# GBH Library REST API

This project is a REST API to manage GBH new library. This API was built using PHP 7 inside a Docker container.

## Dependencies

- [Doctrine](https://www.doctrine-project.org/): ^2.6.2
- [Symfony yaml](https://symfony.com/doc/current/components/yaml.html): ^4.3
- [pecee simple-router](https://packagist.org/packages/pecee/simple-router): 4.2.0.6,

## Setting up the project

First you need the following software installed:

- Docker
- Docker Compose

Once you have installed the dependencies, open a terminal in the root folder of the project and run the following command:

`docker-compose up -d`

The first time you run this command is going to download and build the containers so it's going to take a while. Once the process is finished you can check that everything went right with the following command:

`docker-compose ps`

You should have three containers up and running. In the next step, you need to enter the app container and execute some commands to finish the set up. Use the next command:

`docker-compose exec php-fpm bash`

This command is going to attach your terminal to the app container terminal.

Now lets install the dependencies:

`composer install`

Next, use the following command in the project's root to create the database structure:

`vendor/bin/doctrine orm:schema-tool:create`

And finally, you need to execute the seeder to create some Books and Pages

`./bin/seeder`

And this is it, the library API REST is ready to rumble.

