<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderItems
 *
 * @property int $id
 * @property int $order_id
 * @property string $product_title
 * @property string $price
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItems newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItems newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItems query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItems whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItems whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItems whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItems wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItems whereProductTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItems whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItems whereUpdatedAt($value)
 * @method static \Database\Factories\OrderItemFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
class OrderItem extends Model
{
    use HasFactory;
}
