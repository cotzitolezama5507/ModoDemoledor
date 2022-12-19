<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;


class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'namebook', 'pages'
    ]; 
    public static function validate($request)
    {
        $request->validate([
            "namebook" => "required|max:255",
            "pages" => "required|numeric|gt:0",
            "category_id"=>"required|numeric|gt:0",
            "image" => 'image',
            
        ]);
    }
    /*
    public static function sumPricesByQuantities($products, $productsInSession)
    {
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->getPrice()*$productsInSession[$product->getId()]);
        }
        return $total;
    }

    */
    public function getId()
    {
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getNameBook()
    {
        return $this->attributes['namebook'];
    }
    public function setNameBook($name)
    {
        $this->attributes['namebook'] = $name;
    }
    public function getPages()
    {
        return $this->attributes['pages'];
    }
    public function setPages($description)
    {
        $this->attributes['pages'] = $description;
    }
    public function getCategory_id()
    {
        return $this->attributes['category_id'];
    }
    public function setCategory_id($image)
    {
        $this->attributes['category_id'] = $image;
    }
    public function getImage()
    {
        return $this->attributes['image'];
    }
    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }




    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }
    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }
    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }
    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }
      /*
        public function items()
        {
            return $this->hasMany(Item::class);
        }
  
        public function getItems()
        {
            return $this->items;
        }
        public function setItems($items)
        {
            $this->items = $items;
        }
    */

}
