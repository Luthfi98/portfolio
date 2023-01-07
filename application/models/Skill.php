<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


class Skill extends Eloquent{
    protected $table = 'skills';
    use SoftDeletes;

}
