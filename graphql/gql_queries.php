<?php
    use App\Models\Artist;
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
            ]
        ]
    ]);