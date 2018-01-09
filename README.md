# Slim Framework 3 REST Api with CRUD

This is the simple REST Api implementing basic CRUD operations related to a user.

## Installation

 

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