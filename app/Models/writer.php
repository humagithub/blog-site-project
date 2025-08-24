<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'image'];

    protected $hidden = ['password'];

    protected $casts = [
        'password' => 'hashed',
    ];

    protected $table = 'users'; // Ensure it uses the 'users' table

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
