<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public $timestamps = false;

    public function deposit(float $value): Array
    {
        //dd($this->amount);
        $this->amount += number_format($value, 2, '.','');
        $deposit = $this->save();
        if($deposit):
            return[
                'success' => true,
                'message' => 'Depósito efetuado com sucesso!'
            ];
        endif;
        return[
            'success' => false,
            'message' => 'Falha na transação de depósito!'
        ];

    }
}
