<?php

namespace App\Http\Controllers;

use App\Models\Codes;

class CodesController extends Controller
{
    public function isValidCode($code){
        $code = Codes::where('code', $code)->first();
        if($code){
            if($code->is_active == 0){
                return (object)[
                    'isValid'=> false,
                    'error'=> 'Ten kupon jest nieaktywny.'
                ];
            }
            return (object)[
                'isValid'=> true,
                'amount'=> $code->value
            ];
        }
        return (object)[
            'isValid'=> false,
            'error'=> 'Ten kupon nie istnieje.'
        ];
    }
}
