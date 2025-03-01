
# Clean Architecture PHP Project
📂 Project Structure

```
/clean-architecture-php
│── /src
│   ├── /Domain          # Business Entities (Core Logic)
│   │   ├── User.php
│   ├── /Infrastructure  # Database & External Services
│   │   ├── UserRepository.php
│   ├── /Application     # Use Cases (Business Logic Execution)
│   │   ├── GetUser.php
│── /public              # Entry Point (Presentation Layer)
│   ├── index.php
│── /database            # Database Schema
│   ├── schema.sql
│── composer.json        # Composer Dependencies
│── .env (optional)      # Environment Variables
```



## 1. Create Project Directory
```
mkdir clean-architecture-php && cd clean-architecture-php
```
## 2. Initialize Composer
```
composer init --name="yourname/clean-architecture" --require=php:^7.4 --no-interaction
```
## 3. Set Up Autoloading      
```
{
    "name": "nazim/clean-architecture",
    "require": {
        "php": ">=7.4"
    },


    "autoload": {
    "psr-4": {
        "Domain\\": "src/Domain/",
        "Infrastructure\\": "src/Infrastructure/",
        "Application\\": "src/Application/",
        "Presentation\\": "public/"
    }
}

}

```
Then run:
```
composer dump-autoload
```
## 4. Create Database & Tables
```
mysql -u root -p -e "CREATE DATABASE clean_architecture;"
mysql -u root -p clean_architecture < database/schema.sql
```
## 5. create and Update .env file
```
DB_HOST=localhost
DB_NAME=clean_architecture
DB_USER=root
DB_PASS=root
``` 
## 6. Start PHP Server
```
php -S localhost:8000 -t public
```
Now, visit http://localhost:8000/index.php?id=1 to test the API!