<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Violation extends Model
{
    use HasFactory, SoftDeletes ;
    protected $table = 'violations';
    protected $primaryKey = 'vlt_id';
    protected $guarded = [];

    const CREATED_AT = 'vlt_created_at';
    const UPDATED_AT = 'vlt_updated_at';
    const DELETED_AT = 'vlt_deleted_at';
}
