<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderItem
 * 
 * @property int $id
 * @property int $product_id
 * @property int $order_id
 * @property int $price
 * @property int $total_price
 * @property int $discount
 * @property int $qty
 * @property int $total_discount
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Order $order
 * @property Product $product
 *
 * @package App\Models
 */
class OrderItem extends Model
{
	use SoftDeletes;
	protected $table = 'order_items';
	public static $snakeAttributes = false;

	protected $casts = [
		'product_id' => 'int',
		'order_id' => 'int',
		'price' => 'int',
		'total_price' => 'int',
		'discount' => 'int',
		'qty' => 'int',
		'total_discount' => 'int'
	];

	protected $fillable = [
		'product_id',
		'order_id',
		'price',
		'total_price',
		'discount',
		'qty',
		'total_discount'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
