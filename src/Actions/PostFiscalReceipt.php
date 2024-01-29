<?php

namespace IbrahimBougaoua\LaravelVfdplus\Actions;

use GuzzleHttp\Client;

class PostFiscalReceipt
{
    public $data = [];

    public $customer_info = [];

    public $payment_methods = [];

    public $cart_totals = [];

    public $cart_items = [];

    public $user_info = [];

    public $response = [];

    public function initData(...$args)
    {
        $this->data['credential_code'] = $args[0];
        $this->data['branch_id'] = $args[1];
        $this->data['depart_id'] = $args[2];
        $this->data['trans_no'] = $args[3];
        $this->data['idate'] = $args[4];
        $this->data['itime'] = $args[5];
    }

    public function setCustomerInfo(...$args)
    {
        $this->customer_info['cust_name'] = $args[0];
        $this->customer_info['cust_id_type'] = $args[1];
        $this->customer_info['cust_id'] = $args[2];
        $this->customer_info['cust_phone'] = $args[3];
        $this->customer_info['cust_vrn'] = $args[4];
        $this->customer_info['cust_addr'] = $args[5];
        $this->customer_info['id_for'] = $args[6];

        $this->data['customer_info'] = $this->customer_info;
    }

    public function setPaymentMethods(array $items)
    {
        $this->data['payment_methods'] = $items;
    }

    public function setCartTotals(...$args)
    {
        $this->cart_totals['item_counts'] = $args[0];
        $this->cart_totals['total_amount'] = $args[1];
        $this->cart_totals['total_amount_exclude_discount'] = $args[2];
        $this->cart_totals['discount'] = $args[3];

        $this->data['cart_totals'] = $this->cart_totals;
    }

    public function setCartItems(array $items)
    {
        $this->data['cart_items'] = $items;
    }

    public function setUserInfo(...$args)
    {
        $this->user_info['user_id'] = $args[0];
        $this->user_info['username'] = $args[1];
        $this->user_info['till_id'] = $args[2];

        $this->data['user_info'] = $this->user_info;
    }

    public function getCurrentData()
    {
        return $this->data;
    }

    public function getQrCode($width = '100', $height = '100')
    {
        return config('vfdplus.qrserver').'/?size='.$width.'x'.$height.'&data='.config('vfdplus.verify').$this->getDemoCode();
    }

    public function post()
    {
        $client = new Client();

        $response = $client->post(
            config('vfdplus.home').config('vfdplus.post_fiscal_receipt'),
            [
                'headers' => [
                    'VFDPLUS-API-KEY' => config('vfdplus.vfdplus_api_key'),
                    'Accept' => 'application/json',
                ],
                'json' => $this->data,
            ]
        );

        $this->response = json_decode($response->getBody()->getContents(), true);
    }

    public function getDemoCode()
    {
        return $this->response['msg_data']['rctvnum'].'_'.str_replace(':', '', $this->response['msg_data']['itime']);
    }

    public function getResponse()
    {
        return $this->response;
    }
}
