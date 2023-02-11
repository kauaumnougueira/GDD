<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function atribuirRoles(){
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'lider']);
        $role = Role::create(['name' => 'vice-lider']);
        $role = Role::create(['name' => 'tesoureiro']);
        $role = Role::create(['name' => 'secretario']);
        $role = Role::create(['name' => 'membro']);



        //permissões admin
        $permission = Permission::create(['name' => 'all']); //rotas e permissões futuras somente para admins
        $role = Role::findByName('admin');
        $role->givePermissionTo($permission);

        //permissões líder
        $permission = Permission::create(['name' => 'criacao']);
        $role = Role::findByName('lider');
        $role->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'edicao']);
        $role = Role::findByName('lider');
        $role->givePermissionTo($permission);

        //permissões tesoureiro
        $permission = Permission::create(['name' => 'criacao']);
        $role = Role::findByName('tesoureiro');
        $role->givePermissionTo($permission);

        //permissões secretário
        $permission = Permission::create(['name' => 'criacao']);
        $role = Role::findByName('secretario');
        $role->givePermissionTo($permission);

        //permissões membro (permissões desnecessárias, ja feitas pela auth)
        $permission = Permission::create(['name' => 'visualização']);
        $role = Role::findByName('membro');
        $role->givePermissionTo($permission);


        //essa parte de atribuição será definida pelo admin quando os membros estiverem cadastrados e aparecendo
        $user = User::find(1);
        $user->assignRole('admin'); //eu



        if ($user->hasRole('lider')) {
            //
        }

        if ($user->hasPermissionTo('edit articles')) {
            //
        }
    }
}
