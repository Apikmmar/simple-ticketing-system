# TICKETING SYSTEM
BASIC TICKETING SYSTEM THAT REQUIRE USER TO REGISTER AND LOGIN TO GET THE TICKET. CONSIST OF 2 USERS- GUEST AND STAFF. STAFF WILL UPDATE AND CHANGE THE TICKET NUMBER MEANWHILE USER ALLOW TO GET THE. THE SYSTEM IMPLEMENT 1 TO MANY RELATIONSHIP. THE TICKET WILL RESET TO 1001 AUTOMATICALLY EVERYDAY FOR FIRST TICKET OWNER.

## Installation

To clone this project
```bash
    1. Open the Terminal in Laragon.
    2. Make sure the current directory is '/www'.
    3. Type in 'git clone <url> <project-name>'.
    4. Type in 'cd <project-name>' to enter the project's directory.
    5. Type 'code .' to open the current directory in VS Code.
```

To setup and publish this project
```bash
    1. In the VS Code Click ctrl key +J to open terminal
    2. Type in 'composer install' to install the packages and dependencies.
    3. Type in 'npm install' to install the packages and dependencies.
    4. Type in 'npm run build' to runs the build field from the package.json scripts field.
    5. Type in 'cp .env.example .env' to create the env file.
    6. Type in 'php artisan key:generate' to generate application key.
    7. Type in 'php artisan migrate' to run all migration.
    8. Finally, type in 'php artisan migrate:refresh --seed' to migrate the database tables for the project.
```

## Run
```bash
  1. Type in 'cd <project-name>' to enter the project's directory.
  2. php artisan serve
```
    
## Download
 - [Laragon](https://laragon.org/download/)
 - [Visual Studio Code](https://code.visualstudio.com/download)


## Appendix
Developed and Deployed using Visual Studio Code, Laragon, Heidi SQL, Github.

## Programmer's
- [@Afiq](https://github.com/Apikmmar)

## Documentation
 - [Laravel](https://laravel.com/docs/10.x)
 - [Visual Studio Code](https://code.visualstudio.com/docs)

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
