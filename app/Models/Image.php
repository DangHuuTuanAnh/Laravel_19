<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $table = 'images';
	protected $fillable = ['name', 'path'];
    public function product(){
    	return $this->belongsTo(Product::class);
    }
}
