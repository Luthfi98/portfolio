<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


class Profile extends Eloquent{
    protected $table = 'profiles';
    use SoftDeletes;
    protected $fillable = [
        'name',
        'about',
        'gender',
        'pob',
        'dob',
        'address',
        'city',
        'zip_code',
        'email',
        'phone',
        'height',
        'weight',
        'marital_status',
        'role',
        'last_education',
        'last_experience'
    ];
}
