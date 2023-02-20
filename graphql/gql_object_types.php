<?php
    use App\Models\Artist;
    use App\Models\EventFormat;
    use App\Models\Host;
    use App\Models\Venue;
    use App\Models\VenuePhoto;
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

    $host_type = new ObjectType([
        'name'                              => 'Host',
        'description'                       => 'This is the Host endpoint',
        'fields' => [
            'id'                            => Type::int(),
            'name'                          => Type::string(),
            'bio'                           => Type::string(),
            'phone'                         => Type::string(),
            'website'                       => Type::string(),
            'avatar'                        => Type::string(),
            'postal_code'                   => Type::string(),
            'country'                       => Type::string(),
            'administrative_area_level_1'   => Type::string(),
            'locality'                      => Type::string(),
            'sublocality_level_1'           => Type::string(),
            'route'                         => Type::string(),
            'street_number'                 => Type::string(),
            'formatted_address'             => Type::string()
        ]
    ]);

    $venue_photo_type = new ObjectType([
        'name'                              => 'VenuePhoto',
        'description'                       => 'Thie is the venue photo endpoint',
        'fields' => [
            'id'                            => Type::int(),
            'venue_id'                      => Type::string(),
            'url'                           => Type::string(),
            'description'                   => Type::string()
        ]
    ]);

    $event_format_type = new ObjectType([
        'name'                              => 'EventFormat',
        'description'                       => 'Thie is the event format type endpoint',
        'fields' => [
            'id'                            => Type::int(),
            'name'                          => Type::string(),
            'description'                   => Type::string()
        ]
    ]);

    $venue_type = new ObjectType([
        'name'                              => 'Venue',
        'description'                       => 'Thie is the venue endpoint',
        'fields' => function() use (&$venue_photo_type){
            return [
                'id'                           => Type::int(),
                'name'                         => Type::string(),
                'host_id'                      => Type::int(),
                'addr1'                        => Type::string(),
                'addr2'                        => Type::string(),
                'zipcode'                      => Type::string(),
                'phone'                        => Type::string(),
                'email'                        => Type::string(),
                'website'                      => Type::string(),
                'lon'                          => Type::string(),
                'lat'                          => Type::string(),
                'postal_code'                  => Type::string(),
                'country'                      => Type::string(),
                'administrative_area_level_1'  => Type::string(),
                'locality'                     => Type::string(),
                'sublocality_level_1'          => Type::string(),
                'route'                        => Type::string(),
                'street_number'                => Type::string(),
                'formatted_address'            => Type::string(),
                'photos'                       => [
                    'type'                     => Type::listOf($venue_photo_type),
                    'description'              => 'Photos for this venue',
                    'resolve'   => function($root,$args){
                        $venueId   = $root['id'];
                        $photos    = VenuePhoto::all()->where('venue_id',$venueId);
                        return $photos->toArray();
                    }
                ]
            ];
        }
    ]);
    
    $event_type = new ObjectType([
        'name'                                  => 'Event',
        'description'                           => 'This is the Event endpoint',
        'fields'   => function() use (&$artist_type, &$host_type ,&$venue_type, &$event_format_type){
            return [
                'id'                            => Type::int(),
                'guid'                          => Type::string(),
                'host_id'                       => Type::int(),
                'artist_id'                     => Type::int(),
                'artist'                        => [
                    'type'                      => $artist_type,
                    'description'               => 'Artist profile for this event',
                    'resolve'   => function($root,$args){
                        $artistId   = $root['artist_id'];
                        $artist     = Artist::find($artistId);
                        return $artist->toArray();
                    }
                ],
                'host'                        => [
                    'type'                      => $host_type,
                    'description'               => 'Host profile for this event',
                    'resolve'   => function($root,$args){
                        $hostId   = $root['host_id'];
                        $host     = Host::find($hostId);
                        return $host->toArray();
                    }
                ],
                'format'                        => [
                    'type'                      => $event_format_type,
                    'description'               => 'Formatfor this event',
                    'resolve'   => function($root,$args){
                        $formatId   = $root['format_id'];
                        $format     = EventFormat::find($formatId);
                        return $format->toArray();
                    }
                ],
                'venue_id'                      => Type::int(),
                'venue'                        => [
                    'type'                      => $venue_type,
                    'description'               => 'Venue profile for this event',
                    'resolve'   => function($root,$args){
                        $venueId   = $root['venue_id'];
                        $venue     = Venue::find($venueId);
                        return $venue->toArray();
                    }
                ],
                'name'                          => Type::string(),
                'description'                   => Type::string(),
                'format_id'                     => Type::int(),
                'start_at'                      => Type::string(),
                'end_at'                        => Type::string(),
                'max_attendees'                 => Type::string()
            ];
        }
    ]);

    $event_type_basic = new ObjectType([
        'name'                                  => 'Event',
        'description'                           => 'This is the Event endpoint',
        'fields'   => [
                'id'                            => Type::int(),
                'guid'                          => Type::string(),
                'host_id'                       => Type::int(),
                'artist_id'                     => Type::int(),
                'venue_id'                      => Type::int(),
                'name'                          => Type::string(),
                'description'                   => Type::string(),
                'format_id'                     => Type::int(),
                'start_at'                      => Type::string(),
                'end_at'                        => Type::string(),
                'max_attendees'                 => Type::string()
            ]
    ]);