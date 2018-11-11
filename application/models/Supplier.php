<?php

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  protected $table = 'supplier';
  public $timestamps = false;

  // function barang(){
  //   return $this->hasOne('Barang');
  // }

}

?>
