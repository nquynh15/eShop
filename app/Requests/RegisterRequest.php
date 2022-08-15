<?php

require_once('app/Requests/BaseRequest.php');

class RegisterRequest extends BaseRequest
{
    public function validateRegister($data)
    {
        if (empty($data['name'])) {
            $this->errors['name'] = "tên không được để trống";
        }
        
        if (empty($data['email'])) {
            $this->errors['email'] = "Email không được để trống";
        }

        if (empty($data['password'])) {
            $this->errors['password'] = "mật khẩu không được để trống";
        } else 
                if($data['password'] !== $data['confirm_password']) {
                    $this->errors['confirm_password'] = "mật khẩu với mật khẩu xác nhận phải giống nhau";
                }

    }
}