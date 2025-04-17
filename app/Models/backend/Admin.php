<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Admin extends Model
{
    use HasFactory, Notifiable;

    // Specify which attributes can be mass-assigned
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Specify which attributes should be hidden for arrays
    protected $hidden = [
        'password',       // Hides the password when converting to an array or JSON
        'remember_token', // Hides the remember token when converting to an array or JSON
    ];

    // Additional methods can be added here for custom behavior, if needed
}
