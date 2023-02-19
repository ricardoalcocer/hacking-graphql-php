<?php
    use GraphQL\GraphQL;
    use GraphQL\Type\Schema;

    require('gql_object_types.php');
    require('gql_queries.php');

    $schema = new Schema([
        'query'     => $rootQuery,
        'mutation'  => null
    ]);

    try{
        $rawIn  = file_get_contents('php://input');
        $in     = json_decode($rawIn, true);
        $query  = $in['query'];
        $result = GraphQL::executeQuery($schema, $query);
        $output = $result->toArray();
    }catch(\Exception $e){
        $output = [
            'error' => [
                'message' => $e->getMessage()
            ]
        ];
    }

    Header('Content-Type: application/json');
    echo json_encode($output);