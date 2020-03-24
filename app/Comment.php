<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
  use SoftDeletes;


      //
    protected $fillable = array(
        'body',
    );

    public function user()
    {
        return $this->belongsTo( 'App\Tweet' );
    }

    public function replies()
    {
        return $this->hasMany('App\Comment', 'parent_id');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }


}
