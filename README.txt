README

To run, clone the repository and navigate to the repo folder. Edit the .env folder so that DB_HOST is connected to your localhost and DB_DATABASE is set to the absolute path to the database.sqlite file on your PC. Run ‘php artisan migrate’ to migrate all databases. Run ‘php artisan serve’ to start your local development server. 

The CRUD app can be accessed at http://localhost:8000/crud

The weather app can be accessed at http://localhost:8000/weather 
Invalid zip codes return a HTTP error of 418 “I’m a teapot” because the server “refuses” to brew coffee because it is a teapot. (I’m so glad this is a thing :) )
