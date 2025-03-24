<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ Use this instead of Model
use Illuminate\Notifications\Notifiable;
require base_path('vendor/autoload.php');
use Spatie\Permission\src\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    protected $table = 'users'; // Explicitly defining the table

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ]; // Allowing mass assignment
}
