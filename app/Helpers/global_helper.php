<?php
use App\Models\UserModel;

if(!function_exists('current_user'))
{
    function current_user()
    {
        $session = session();
        $user_id = $session->get('user_id');
        $user_model = new UserModel();
        $user = $user_model->get_data($user_id);
        return $user;
    }
}

if(!function_exists('order_page_number'))
{
    function order_page_number($currentPage, $perPage)
    {
        if (is_null($currentPage)) {
            $nomor = 1;
        } else {
            $nomor = 1 + ($perPage * ($currentPage - 1));
        }
        return $nomor;
    }
}

if(!function_exists('thousand_separator'))
{
    function thousand_separator($amount)
    {
        return number_format($amount, 2, ",", ".");
    }
}