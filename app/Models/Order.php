<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Enums\OrderStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 *
 * @property int $id
 * @property int $user_id
 * @property int $total_price
 * @property int $total_product
 * @property string $user_address
 * @property string $province
 * @property string $city
 * @property string $postal_code
 * @property string|null $description
 * @property int|null $phone
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @property User $user
 * @property Collection|OrderItem[] $orderItems
 *
 * @package App\Models
 */
class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';
    public static $snakeAttributes = false;

    protected $casts = [
        'user_id' => 'int',
        'total_price' => 'int',
        'total_product'=>'int',
        'city' => 'string',
        'description' => 'string',
        'phone' => 'int',
        'status' => OrderStatus::class
    ];

    protected $fillable = [
        'user_id',
        'total_price',
        'total_product',
        'user_address',
        'province',
        'city',
        'postal_code',
        'description',
        'phone',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    #[Scope]
    protected function applySearch(Builder $query):void
    {
        $request = request();

        $query
            ->when($request->filled('search'), function (Builder $query) use ($request) {
                $Keyword = $request->query('search');

                $query->whereAny([
                    'phone',
                    'total_price',
                    'postal_code',
                    'description'
                ], "LIKE", "%$Keyword%");
            });
    }

    #[Scope]
    protected function applySort(Builder $query): void
    {
        $request = request();

        switch ($request->query('sort', 'newest')) {
            case 'create_at_desc':
            {
                $query
                    ->orderByDesc('created_at');
                break;
            }

            case 'create_at_asc':
            {
                $query
                    ->orderBy('created_at');
                break;
            }

            case 'price_high':
            {
                $query
                    ->orderByDesc('total_price');
                break;
            }

            case 'price_low':
            {
                $query
                    ->orderBy('total_price');
                break;
            }

            case 'status':
            {
                $query
                    ->orderByDesc('status');
                break;
            }

            default:
            {
                $query->orderByDesc('created_at');
            }
        }
    }
}
