
# Software architecture project - Electronic device e-shop

This system is developed using the PHP language framework Laravel (8.83.6). The MySql DB engine is used for data storage.

## Technical solutions
- MVC laravel principles. System use Model Objects to manipulate data in data layer, Controller objects are used to make logical operations with requests, Views responsible for front-end part.

- Front-end is made using bootstrap framework.


## Requirements
- PHP
- MySql DB
- Composer

## Application set up

1. Clone Github repo:

```bash
  git clone https://github.com/RafalKLab/LaravelEshop.git
```

2. Navigate to the project folder

```bash
  cd LaravelEshop
```

3. Install Composer dependencies

```bash
  composer install
```

4. Install NPM dependencies

```bash
  npm install
```

5. Make a copy of .env.example file

```bash
  cp .env.example .env
```

6. Generate app encryption key

```bash
  php artisan key:generate
```

7. Create a new database for the system
8. Add the information from the newly created database to the .env file

`DB_DATABASE` = databse name

`DB_USERNAME` = databse user

`DB_USERNAME` = databse password

Example
```
DB_DATABASE=teacherSystem
DB_USERNAME=root
DB_PASSWORD=
```

9. Move the migration tables to the database

```bash
  php artisan migrate
```

10. Make storage for system images
```bash
  php artisan storage:link
```



## Launch application

Inside the project folder, use the command:

```bash
  php artisan serve
```


## Authors

- [@RafalKLab](https://github.com/RafalKLab)

