<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tweet extends Model
{
   use SoftDeletes;

   protected $fillable = array(
      'message',
   );

   public function user()
   {
     return $this->belongsTo('App\User');
   }

   public function comments()
   {
       return $this->morphMany('App\Comment', 'commentable')->whereNull('parent_id');
   }

   public function likes()
   {
     return $this->hasMany('App\Like');
   }
}
