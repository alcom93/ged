<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    use HasFactory;
    public $timestamps=false;
    public function users():BelongsTo
{
    return $this->belongsTo(User::class, 'role_id');
}
}
