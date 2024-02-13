<?php 

namespace App\Filters;

use Illuminate\Http\Request;
class ApiFilter{
//Parent Class for filtering different models
    protected $safeParms = [];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='
    ];

    //transform the request into an Eloquent query
    public function transform(Request $request) {
        $eloQuery = [];


        foreach ($this->safeParms as $parm => $operators) {
            //check if the request contains one of the safe paramaters
            $query = $request->query($parm); 

            if (!isset($query)) {
                continue;
            }

            //check each operator of the allowed operators for the parameter
            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$parm, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}
