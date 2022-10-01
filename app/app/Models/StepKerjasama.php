<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepKerjasama extends Model
{
    use HasFactory;
    protected $table = 'step_kerjasama';
    protected $guarded = [];

    public function form()
    {
        return $this->hasOne(Form::class, 'id', 'form_id');
    }

    const UPDATED_AT = null;
    const CREATED_AT = null;
}
