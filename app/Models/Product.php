<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Enums\isDefault;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
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
 * @property Carbon $created_at
 * @property Carbon $updated_at
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
	public static $snakeAttributes = false;

	protected $casts = [
		'name_en' => 'string',
		'price' => 'int',
		'qty' => 'int',
		'discount' => 'int',
		'category_id' => 'int',
	];

	protected $fillable = [
		'name',
		'name_en',
		'price',
		'qty',
		'discount',
		'description',
		'category_id',
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function orderItems()
	{
		return $this->hasMany(OrderItem::class);
	}

	public function images()
	{
		return $this->hasMany(ProductImage::class);
	}

	public function defaultImage()
	{
		return $this->hasOne(ProductImage::class)
            ->where('is_default', isDefault::YES);
	}

    #[Scope]
    protected function applySearch(Builder $query):void
    {
        $request = request();

        $query
            ->when($request->filled('search'), function (Builder $query) use ($request) {
                $Keyword = $request->query('search');

                $query->whereAny([
                    'name',
                    'name_en',
                    'description'
                ], "LIKE", "%$Keyword%");
            });
    }

    #[Scope]
    protected function applySort(Builder $query): void
    {
        $request = request();

        switch ($request->query('sort', 'newest')) {
            case 'name_asc':
            {
                $query
                    ->orderBy('name',);
                break;
            }

            case 'name_desc':
            {
                $query
                    ->orderByDesc('name');
                break;
            }

            case 'price_asc':
            {
                $query
                    ->orderBy('price');
                break;
            }

            case 'price_desc':
            {
                $query
                    ->orderByDesc('price');
                break;
            }


            default:
            {
                $query->orderByDesc('created_at');
            }
        }
    }
}
