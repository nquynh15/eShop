<?php

require_once('app/Requests/BaseRequest.php');
class ProductsRequest extends BaseRequest{
    public function validateProducts($data)
    {
        if (empty($data['name'])) {
            $this->errors['name'] = "tên categories không được để trống";
        }
        if(empty($data['description'])){
            $this->errors['description'] = "mô tả  không được để trống";
        }
        if(empty($data['size'])){
            $this->errors['size']="kích cỡ khong duoc de trong";
        }
        
        if(empty($data['color'])){
            $this->errors['color']="màu khong duoc de trong";
        }
        
        

    }
}