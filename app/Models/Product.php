<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Product
 *
 * @property int $id
 * @property string $title
 * @property float $price
 * @property string|null $description
 * @property string $category
 * @property string $image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Product extends Model implements HasMedia
{
	use SoftDeletes;
    use HasMediaTrait;
	protected $table = 'products';

	protected $casts = [
		'price' => 'float'
	];

	protected $fillable = [
		'title',
		'price',
		'description',
		'category',
		'image'
	];

	public function scopePrice($query){
	    if (request('price_min')) {
	        $query->where('price','>=',request('price_min'));
	    }
	    if (request('price_max')) {
	        $query->where('price','<=',request('price_max'));
	    }
	    return $query;
    }

    public function scopeSearch($query){
	    $search = request('search');
        if ($search) {
            $query->where("title","LIKE", "%{$search}%")
                ->orWhere("description","LIKE", "%{$search}%");
        }
        return $query;
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('image')
            ->singleFile();
    }
}
