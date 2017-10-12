<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use Dingo\Api\Exception\ResourceException;

class Controller extends BaseController
{
    // Change default ValidationException for some more descriptive with all validation errors
    protected function throwValidationException(\Illuminate\Http\Request $request, $validator)
    {
        throw new ResourceException('Validation errors.', $validator->errors());
    }
}
