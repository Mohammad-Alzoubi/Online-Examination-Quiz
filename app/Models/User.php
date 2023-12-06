<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    private $limit = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'visible_password', 'occupation', 'address', 'phone', 'bio', 'is_admin'
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function storeUser($data)
    {
        $data['visible_password'] = $data['password'];
        $data['password']         = bcrypt($data['password']);
        $data['is_admin']         = 0;
        return User::create($data);
    }

    public function allUsers()
    {
        return User::latest()->paginate($this->limit);
    }

    public function findUser($id)
    {
        return User::find($id);
    }

    public function updateUser($data, $id)
    {

        $user = User::find($id);
        $user->name       =  $data['name'];
        $user->occupation =  $data['occupation'];
        $user->address    =  $data['address'];
        $user->phone      =  $data['phone'];

        if ($data['password']){
            $user->visible_password = $data['password'];
            $user->password         = bcrypt($data['password']);
        }
        $user->save();

        return $user;
    }

    public function deleteUser($id)
    {
        return User::where('id',$id)->delete();
    }

}
