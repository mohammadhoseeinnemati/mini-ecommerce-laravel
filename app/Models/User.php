<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property int | null $avatar_file_id
 * @property string $password
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	protected $table = 'users';
	public static $snakeAttributes = false;

	protected $casts = [
		'avatar_file_id' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'phone',
		'avatar_file_id',
		'password'
	];

	public function orders()
	{
		return $this->hasMany(Order::class);
	}

    public function otps()
    {
        return $this->hasMany(Otp::class, 'user_id');
    }

}
