## About
    Slider for team members

## How to run the app

- Clone this repo in you local machine
- Go to the root folder and run the following commands to install project dependencies  
    1. `composer install` 
    2. `npm install`
- Rename the `.env.example` file to `.env` and add your database variables
- Run `php artisan db:seed` to insert team members data in the DB
- Lastly run php artisan serve and access the project in a web browser

## API
- Team members resource endpoint can be accessed at `/api/member` to perform CRUD operations
