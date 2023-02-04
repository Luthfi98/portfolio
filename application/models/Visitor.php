<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


class Visitor extends Eloquent{
    protected $table = 'visitors';
    use SoftDeletes;

}
