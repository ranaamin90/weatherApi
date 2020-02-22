# WeatherApi

Allows authenticated users to enter a city and get its weather conditions.

This repository using Laravel 5.6

# Installation

Follow these steps:

- create .env file and setup database configurations (database name, username and password).
- $ php artisan key:generate
- $ composer install
- $ php artisan migrate
- I used tymon/jwt-auth for authentication, so you must run $ php artisan jwt:secret

# Notes

- I used [openweathermap](https://openweathermap.org/) for weather Api
- Postman file named weatherApi.postman_collection.json

Thank you for using my repository.
