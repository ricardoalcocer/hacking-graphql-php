<?php

    use GraphQL\Type\Definition\ObjectType;
    use GraphQL\Type\Definition\Type;

    $artist_type = new ObjectType([
            'name'                              => 'Artist',
            'description'                       => 'This is the Artist endpoint',
            'fields' => [
                'id'                            => Type::int(),
                'bio'                           => Type::string(),
                'email'                         => Type::string(),
                'stagename'                     => Type::string(),
                'fname'                         => Type::string(),
                'lname'                         => Type::string(),
                'phone'                         => Type::string(),
                'avatar'                        => Type::string(),
                'formatted_address'             => Type::string(),
                'street_number'                 => Type::string(),
                'route'                         => Type::string(),
                'sublocality_level_1'           => Type::string(),
                'locality'                      => Type::string(),
                'administrative_area_level_1'   => Type::string(),
                'country'                       => Type::string(),
                'postal_code'                   => Type::string(),
                'lat'                           => Type::string(),
                'lon'                           => Type::string()  
            ]
        ]);