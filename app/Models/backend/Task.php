<?php

namespace App\Models\backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'email',
        'description',
        'phone',
        'note',
        'url',
        'name',
        'country',
        'prefer_contact_type',
        'language',
        'is_completed',
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
