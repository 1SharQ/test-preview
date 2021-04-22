<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'body'
    ];
    
    public function likedBy(User $user){
        return $this->like->contains('user_id',$user->id);
    }

    public function user(){
       return $this->belongsTo(User::class);
    }
    
    public function like(){
        return $this->hasMany(Like::class);
     }
}
