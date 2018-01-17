<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\HasRelationships;

class Role extends Model
{
    use HasRelationships;

    protected $table = 'voyager_roles';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(Voyager::modelClass('User'), 'voyager_user_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany(Voyager::modelClass('Permission'), 'voyager_permission_role');
    }
}
