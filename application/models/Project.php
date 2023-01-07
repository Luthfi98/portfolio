<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Eloquent{
    protected $table = 'projects';
    use SoftDeletes;

}
