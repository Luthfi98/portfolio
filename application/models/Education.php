<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


class Education extends Eloquent{
    protected $table = 'educations';
    use SoftDeletes;

}
