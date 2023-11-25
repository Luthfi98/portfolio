<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


class Phonebook extends Eloquent{
    protected $table = 'phonebooks';
    use SoftDeletes;

}
