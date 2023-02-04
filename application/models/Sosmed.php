<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


class Sosmed extends Eloquent{
    protected $table = 'sosmeds';
    use SoftDeletes;

}
