<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $primaryKey = 'cls_id';
    protected $guarded = [];

    const CREATED_AT = 'cls_created_at';
    const UPDATED_AT = 'cls_updated_at';
    const DELETED_AT = 'cls_deleted_at';
}
