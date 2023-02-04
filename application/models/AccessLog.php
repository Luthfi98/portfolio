<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


class AccessLog extends Eloquent{
    protected $table = 'access_logs';
    use SoftDeletes;

}
