<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class PropertyFilter extends ApiFilter{

    protected $safeParms = [
        'title' => ['eq'],
        'address' => ['eq'],
        'price' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'bedrooms' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'bathrooms' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'type' => ['eq', 'ne'],
        'status' => ['eq', 'ne'],
    ];
}
