<p align="center">
    <h1 align="center"> Fruad Detector System Using Laravel</h1>
</p>

## Installation

### Requirements

### Clone the repository from github.
  
The command installs the project in a directory named `YourDirectoryName`. You can choose a different
directory name if you want.

Clone Repository  https://github.com/saints23githubbeck/fruadDetection.git

### Install dependencies

    cd fruadDetection
    composer install

### Config file

Rename or copy `.env.example` file to `.env` 1.`php artisan key:generate` to generate app key.

1. Set your database credentials in your `.env` file
2. create new database in MySQL according to your database configuration in the .env
3. Set your `APP_URL` in your `.env` file.

### Database

1. Migrate database table `php artisan migrate`
1. Generate config `php artisan db:seed`

### Install Node Dependencies(optional)

1. `npm install` to install node dependencies


### Create Admin Account

1. `php artisan tinker` and than paste
    ```php
    App\Models\User::create([
        'first_name' => 'Admin',
        'last_name' => 'admin',
        'email'=>'dmishra@marygoldandco.com',
        'country'=>'ghana',
        'if'=>'127.34.65.0.4',
        'contact'=>'+233243334494',
        'password' => bcrypt('password')
    ]
    ```
    hit enter.


### Run Server

1. `php artisan serve` or Laravel Homestead
2. Visit `localhost:8000` in your browser
3. You can now login with email and password

"# fruadDetection" 
