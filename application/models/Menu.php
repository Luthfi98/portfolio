<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;


class Menu extends Eloquent{
    protected $table = 'menus';
    use SoftDeletes;

    /**
     * Menu has many Child.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   
    public function child()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = menu_id, localKey = id)
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }

    /**
     * Menu has one Parent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parent()
    {
        // hasOne(RelatedModel, foreignKeyOnRelatedModel = menu_id, localKey = id)
        return $this->hasOne(Menu::class, 'id', 'parent_id');
    }
}
