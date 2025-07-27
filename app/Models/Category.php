<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $name
 * @property int $is_active
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categories';
	public static $snakeAttributes = false;

	protected $casts = [
		'is_active' => 'int'
	];

	protected $fillable = [
		'name',
		'is_active'
	];

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
