<?php
// 5.4, 5.5 , 5.6
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Atendente extends Authenticatable
{
 use Notifiable;

 /**
 * The attributes that are mass assignable.
 *
 * @var array
 */

 protected $table = 'centralatendimento_atendentes_users';

 protected $fillable = [
 'name', 'email', 'password',
 ];

 /**
 * The attributes that should be hidden for arrays.
 *
 * @var array
 */
 protected $hidden = [
 'password', 'remember_token',
 ];
}
