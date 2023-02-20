# QL-Event

This branch expands on `ql` and implements the `event` endpoint, which exposes a more complex object type.

## Running

To run, go to the folder and type:

`php -S localhost:8080`

Then load up a GraphQL Client and point it to the server.

## Executing a Query

## event

```graphql
query{
  event(id: 6) {
    id
    guid
    host_id
    artist_id
    artist {
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
    host {
      id
      name
      bio
      phone
      website
      avatar
      postal_code
      country
      administrative_area_level_1
      locality
      sublocality_level_1
      route
      street_number
      formatted_address
    }
    format {
      id
      name
      description
    }
    venue_id
    venue {
      id
      name
      host_id
      addr1
      addr2
      zipcode
      phone
      email
      website
      lon
      lat
      postal_code
      country
      administrative_area_level_1
      locality
      sublocality_level_1
      route
      street_number
      formatted_address
      photos {
        id
        venue_id
        url
        description
      }
    }
    name
    description
    format_id
    start_at
    end_at
    max_attendees
  } 
}
```

