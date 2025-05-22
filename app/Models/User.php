<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role' //Agregando el campo role
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 🚀 NUEVOS MÉTODOS PARA ROLES

    /**
     * Verifica si el usuario es un administrador.
     */

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Verifica si el usuario es un empleado.
     */
    public function isEmployee(): bool
    {
        return $this->role === 'employee';
    }

    /**
     * Verifica si el usuario es un usuario regular.
     */
    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    /**
     * Verificar si tiene permisos de administración
     */
    public function hasAdminAccess(): bool
    {
        return in_array($this->role, ['admin', 'employee']);
    }

    /**
     * Obtener todos los roles disponibles
     */
    public static function getRoles(): array
    {
        return [
            'user' => 'Usuario',
            'employee' => 'Empleado',
            'admin' => 'Administrador',
        ];
    }

     // 🔗 RELACIONES EXISTENTES

    /**
     * Documentos creados por el usuario
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    /**
     * Seguimientos de documentos realizados por el usuario
     */
    public function documentTrackings()
    {
        return $this->hasMany(DocumentTracking::class);
    }

}
