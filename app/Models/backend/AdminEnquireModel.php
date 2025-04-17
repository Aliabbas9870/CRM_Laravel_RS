<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminEnquireModel extends Model
{
    use HasFactory;


    protected $connection = 'second_db'; // no space before or after

    protected $table = 'enquiries';
    public $timestamps = false;


    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'prefer_contact_type',
        'note',
        'from',
        'url',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    // protected $primaryKey = 'id'; // Use this instead of $id = 'id';

}
