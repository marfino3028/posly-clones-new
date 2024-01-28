<?php

namespace App\Models;

use App\Traits\AddCreatedUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory, AddCreatedUser;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'user_id',
        'username',
        'code',
        'email',
        'country',
        'province',
        'city',
        'district',
        'subdistrict',
        'phone',
        'address',
        'status',
        'photo',
        'postal_code',
        'office_name',
        'office_address',
        'office_postal_code',
        'office_phone'
    ];

    protected $hidden = ['deleted_at', 'created_user_id', 'deleted_user_id', 'modified_user_id'];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'status' => 'integer',
    ];


    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
