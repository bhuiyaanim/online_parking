<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $primaryKey = 'id';
	public $timestamps = false;
	//protected $table = "user_table";
	//const CREATED_AT = "sfhdh";
	//const UPDATED_AT = "sdvfhsdfh";
	public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}
