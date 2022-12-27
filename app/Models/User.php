<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;


class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
         return $this->hasMany(Post::class);
    }

    public function favorites()
    {
    return $this->belongsToMany(Post::class, 'favorites', 'user_id', 'post_id')->withTimestamps();
    }

    public function favorite($postId)
    {
    $exist = $this->is_favorite($postId);
    if($exist){
    return false;
    }else{
    $this->favorites()->attach($postId);
    return true;
    }
    }


    public function unfavorite($postId)
    {
        $exist = $this->is_favorite($postId);

        if($exist){
            $this->favorites()->detach($postId);
            return true;
        }else{
            return false;
        }
    }

   public function is_favorite($postId)
   {
       return $this->favorites()->where('post_id',$postId)->exists();
   }

    // フォロワー→フォロー
    public function followUsers()
    {
        return $this->belongsToMany(User::class, 'follow_users', 'followed_user_id', 'following_user_id');
    }

    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follow_users', 'following_user_id', 'followed_user_id');
    }
}
