<?php

namespace Modules\Projects\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projects extends Model
{
    use HasFactory;

    protected $table='projects';
    protected $fillable = ['password', 'project_name','topic','summery','action','outcomes','case_for_action','barrier_to_success','consequences'];
    
    protected static function newFactory()
    {
        return \Modules\Projects\Database\factories\ProjectsFactory::new();
    }
}
