<?php

require_once('app/Requests/BaseRequest.php');

class ResetpasswordRequest extends BaseRequest
{
    public function validateLogin($data)
    {
        if (empty($data['password'])) {
            $this->errors['password'] = "mật khẩu không được để trống";
        }

        if (empty($data['newpassword'])) {
            $this->errors['newpassword'] = "mật khẩu mới không được để trống";
        }
        else 
                if($data['newpassword'] !== $data['renewpassword']) {
                    $this->errors['renewpassword'] = "mật khẩu xác nhận  phải giống nhau";
                }
    }
}