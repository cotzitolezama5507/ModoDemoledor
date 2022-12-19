<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Item;


class Loan extends Model
{
   
    public static function validate($request)
    {
        $request->validate([
            "user_id" => "required|numeric|gt:0",
            "book_id" => "required|numeric|gt:0",
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

    public function getIdUser()
    {
        return $this->attributes['user_id'];
    }
    public function setIdUser($id)
    {
        $this->attributes['user_id'] = $id;
    }

    public function getIdBook()
    {
        return $this->attributes['book_id'];
    }
    public function setIdBook($id)
    {
        $this->attributes['book_id'] = $id;
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
    

}
