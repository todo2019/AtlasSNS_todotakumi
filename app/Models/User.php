<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'icon_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

     public function followings()
    {
        return $this->belongsToMany(
            User::class,
            'follows',       // フォロー関係を保存する中間テーブル
            'following_id',   // このユーザーID
            'followed_id'    // フォロー相手のユーザーID
        );
    }

     public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'followed_id',
            'following_id'
        );
    }

    public function post(){
        return $this->hasMany(Post::class);
    }

     public function isFollowing($userId)
    {
        return $this->followings()->where('followed_id', $userId)->exists();
    }

     public function follow($userId)
    {
        if (!$this->isFollowing($userId)) {
            $this->followings()->attach($userId);
        }
    }

     public function unfollow($userId)
    {
        if ($this->isFollowing($userId)) {
            $this->followings()->detach($userId);
        }
    }

}

    class Follow extends Model
    {

    public function followCount()
    {
    return FollowUser::where('following_id', $this->id)->count();
    }

    public function followerCount()
    {
    return FollowUser::where('followed_id', $this->id)->count();
    }

    }
