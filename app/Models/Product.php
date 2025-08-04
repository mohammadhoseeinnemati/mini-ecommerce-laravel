<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 *
 * @property int $id
 * @property string $name
 * @property int|null $name_en
 * @property int $price
 * @property int $qty
 * @property int $discount
 * @property string $description
 * @property int $category_id
 * @property Carbon $creates_at
 * @property Carbon $updates_at
 * @property string|null $deleted_at
 *
 * @property Category $category
 * @property Collection|OrderItem[] $orderItems
 *
 * @package App\Models
 */
class Product extends Model
{
	use SoftDeletes;
	protected $table = 'products';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'name_en' => 'string',
		'price' => 'int',
		'qty' => 'int',
		'discount' => 'int',
		'category_id' => 'int',
		'creates_at' => 'datetime',
		'updates_at' => 'datetime'
	];

	protected $fillable = [
		'name',
		'name_en',
		'price',
		'qty',
		'discount',
		'description',
		'category_id',
		'creates_at',
		'updates_at'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function orderItems()
	{
		return $this->hasMany(OrderItem::class);
	}
}
