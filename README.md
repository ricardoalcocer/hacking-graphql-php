# QL

This branch expands on `base_app` and implements the `artist` and `artists` endpoints.

## Running

To run, go to the folder and type:

`php -S localhost:8080`

Then load up a GraphQL Client and point it to the server.

## Executing a Query

## artist

```graphql
query{
  artist(id:182) {
    id
    bio
    email
    stagename
    fname
    lname
    phone
    avatar
    formatted_address
    street_number
    route
    sublocality_level_1
    locality
    administrative_area_level_1
    country
    postal_code
    lat
    lon
  }
}
```


## artists

```graphql
query{
  artists(first:10 skip:0) {
    id
    bio
    email
    stagename
    fname
    lname
    phone
    avatar
    formatted_address
    street_number
    route
    sublocality_level_1
    locality
    administrative_area_level_1
    country
    postal_code
    lat
    lon
  } 
}
```
