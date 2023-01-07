<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


class Experience extends Eloquent{
    protected $table = 'experiences';
    use SoftDeletes;

}
