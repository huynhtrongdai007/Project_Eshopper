<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete
class MenuModel extends Model
{
    protected $table = 'tbl_menus';

     protected $fillable = [
        'name', 
        'parent_id',
        'slug'
    ];

    use SoftDeletes; 

   public function menuChidrent() {
      return $this->hasMany(MenuModel::class,'parent_id');
   }
}
