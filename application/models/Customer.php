<?php

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $table = 'customers';
  public $timestamps = false;

  function kota()
  {
    return $this->hasOne('Kota', 'id_kota', 'id_kota');
  }
}

?>
