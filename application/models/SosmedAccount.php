<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


class SosmedAccount extends Eloquent{
    protected $table = 'sosmed_accounts';
    use SoftDeletes;

    /**
     * SosmedAccount has one Sosmed.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sosmed()
    {
        // hasOne(RelatedModel, foreignKeyOnRelatedModel = sosmedAccount_id, localKey = id)
        return $this->hasOne(Sosmed::class, 'id', 'sosmed_id');
    }
}
