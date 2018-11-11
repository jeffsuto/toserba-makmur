<?php

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
  protected $table = 'barang';
  public $timestamps = false;

  function supplier()
  {
    return $this->belongsTo('supplier');
  }

}

?>
