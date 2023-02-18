<?php
    use App\Models\Artist;
    use App\Models\Event;
    use GraphQL\Type\Definition\ObjectType;
    use GraphQL\Type\Definition\Type;

    $rootQuery = new ObjectType([
        'name'          => 'Query',
        'description'   => 'This is the root query area',
        'fields' => [
            'artist' => [
                'type' => $artist_type,
                'args' => [
                    'id' => Type::int(),
                ],
                'resolve' => function($root,$args){
                    $thisArtist = Artist::find($args['id'])->toArray();
                    return $thisArtist;
                }
            ],
            'artists' => [
                'type' => Type::listOf($artist_type),
                'args' => [
                    'first'     => Type::int(),
                    'skip'      => Type::int()
                ],
                'resolve' => function($root,$args){
                    $artists = Artist::all()->skip($args['skip'])->take($args['first'])->toArray();
                    return $artists;
                }
            ],
            'event'             => [
                'type'          => $event_type,
                'description'   => "Provides access and event by its id.",
                'args'          => [
                    'id'        => Type::int()
                ],
                'resolve'       => function($root,$args){
                    $event = Event::find($args['id'])->toArray();
                    return $event;
                }
            ],
        ]
    ]);