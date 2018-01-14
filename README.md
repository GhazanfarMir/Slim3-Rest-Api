# Slim3 Framework REST Api with CRUD

[![StyleCI](https://styleci.io/repos/116841369/shield?branch=master)](https://styleci.io/repos/116841369)
[![Build Status](https://travis-ci.org/ghazanfarmir/Slim3-Rest-Api.svg?branch=master)](https://travis-ci.org/ghazanfarmir/Slim3-Rest-Api)

This is the simple REST Api implementing basic CRUD operations related to a user.

## Installation

#### Git Clone

To get the latest source you can use git clone.

`$ git clone https://github.com/ghazanfarmir/Slim-RestApi-CRUD.git /path/to/slim-rest-api-crud`

#### Composer

Installation can be done with the use of composer. If you don't have composer yet you can install it by doing:

`$ curl -s https://getcomposer.org/installer | php`

To install it globally

`$ sudo mv composer.phar /usr/local/bin/composer`

```
$ cd /path/to/slim-rest-api-crud
$ composer update
$ composer install
```

## Database Setup

 - Import `dababase/mysql.sql` in your MySQL Server, this will create `users` table.
 - Copy `.env.example` to `.env`  
 - Update .env with your database credentials
 
```
// .env 

# Database
DB_DRIVER=mysql
DB_HOST=localhost
DB_NAME=
DB_USERNAME=
DB_PASSWORD=

```

## Usage

### Api Endpoints

```

$ GET       /api/v1/users           // all users
$ GET       /api/v1/users/{id}      // specific user
$ POST      /api/v1/users           // add new user
$ PUT       /api/v1/users/{id}      // update an existing user
$ DELETE    /api/v1/users/{id}      // delete an existing user

```


### Requests (POST/PUT)

#### $ POST /api/v1/users

```
{
	"first_name": "John",
	"surname": "Doe",
	"email": "johndoe@example.com",
	"date_of_birth": "1920-03-02"
}
```

#### $ PUT /api/v1/users/{id}

```
{
	"first_name": "John",
	"surname": "Doe",
	"email": "johndoe@example.com",
	"date_of_birth": "1920-03-02"
}
```

...

### Responses

Each endpoint provides an JSON response with relevant data

#### $ GET /api/v1/users

```
{
    'code': 200,
    'total_results': {total_items_count}
    'data': [
    
        { ... },
        { ... },
        { ... },
        
        ...
        
    ]
}
```

#### $ GET /api/v1/users/{id}

```
{
    'code': 200,
    'data': {
        ... 
        ...
    }
}

OR

{
    'code': 404,
    'message': 'no user found'
}
```

#### $ POST /api/v1/users

```
{
    'code': 201,
    'message': 'New user added successfully.',
    'data': {
        ... 
        ...
    }
}
```

#### $ PUT /api/v1/users/{id}

```
{
    'code': 200,
    'message': 'User has been updated successfully.',
    'data': {
        ... 
        ...
    }
}
```

#### $ DELETE /api/v1/users/{id}

```
{
    'code': 200,
    'message': 'User has been deleted successfully.'
}
```
