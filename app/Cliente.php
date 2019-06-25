<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //


    //fun~çao que recupera o endereço do cliente apartir do id
    public function endereco(){
    	return $this->hasOne('App\Endereco');
    }
}
