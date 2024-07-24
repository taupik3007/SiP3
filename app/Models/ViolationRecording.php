<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ViolationRecording extends Model
{
    use HasFactory;
    protected $table = 'violation_records';
    protected $primaryKey = 'vlr_id';
    protected $guarded = [];

    const CREATED_AT = 'vlr_created_at';
    const UPDATED_AT = 'vlr_updated_at';
    const DELETED_AT = 'vlr_deleted_at';

}
