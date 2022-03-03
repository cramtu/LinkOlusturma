<?php

namespace App\Http\Controllers;

use App\Models\Ayar;
use Illuminate\Http\Request;

class Iyzico extends Controller
{
    protected $options;
    protected $request;
    protected $basketItems;
    public function __construct()
    {

        $ayar=Ayar::get()->first();

        $this->options = new \Iyzipay\Options();
        $this->options->setApiKey($ayar->setApiKey);
        $this->options->setSecretKey($ayar->setSecretKey);
        $this->options->setBaseUrl($ayar->setBaseUrl);
        $this->basketItems = [];



        /*
        $this->options = new \Iyzipay\Options();
        $this->options->setApiKey("sandbox-bJy1xjsHAG97HEZjTPVINISuw2C3dYs6");
        $this->options->setSecretKey("sandbox-6ZLCK0HOPKXYfmRV4oHftWLJZvj1Vn2O");
        $this->options->setBaseUrl("https://sandbox-api.iyzipay.com");
        $this->basketItems = [];

        */
    }

    public function setform(Array $params){
        $this->request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
        $this->request->setLocale(\Iyzipay\Model\Locale::TR);
        $this->request->setConversationId($params['conversationId']);
        $this->request->setPrice($params['price']);
        $this->request->setPaidPrice($params['paidPrice']);
        $this->request->setCurrency(\Iyzipay\Model\Currency::TL);
        $this->request->setBasketId($params['basketId']);
        $this->request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $this->request->setCallbackUrl(route('callback'));
        $this->request->setEnabledInstallments(array(2, 3, 6, 9));
        return $this;
    }

    public function setBuyer(Array $params){

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId($params['Id']);
        $buyer->setName($params['name']);
        $buyer->setSurname($params['surname']);
        $buyer->setGsmNumber($params['phone']);
        $buyer->setEmail($params['email']);
        $buyer->setIdentityNumber($params['tc']);
       // $buyer->setLastLoginDate("2015-10-05 12:43:35");
       // $buyer->setRegistrationDate("2013-04-21 15:12:09"); Zorunlu değil
        $buyer->setRegistrationAddress($params['address']);
        $buyer->setIp($params['ip']);
        $buyer->setCity($params['city']);
        $buyer->setCountry($params['country']);
       // $buyer->setZipCode("34732");
        $this->request->setBuyer($buyer);
        return $this;
    }

    public function setShipping(Array $params){

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName($params['name']);
        $shippingAddress->setCity($params['city']);
        $shippingAddress->setCountry($params['country']);
        $shippingAddress->setAddress($params['address']);
        //$shippingAddress->setZipCode($params['']);
        $this->request->setShippingAddress($shippingAddress);
        return $this;
    }
    public function setBilling(Array $params){
        $billinAddress = new \Iyzipay\Model\Address();
        $billinAddress->setContactName($params['name']);
        $billinAddress->setCity($params['city']);
        $billinAddress->setCountry($params['country']);
        $billinAddress->setAddress($params['address']);
        $this->request->setBillingAddress($billinAddress);
        return $this;
    }

    public function setItems(Array $items){
        foreach ($items as $key=>$item){

            $basketItem = new \Iyzipay\Model\BasketItem();
            $basketItem->setId($item['id']);
            $basketItem->setName($item['name']);
            $basketItem->setCategory1($item['category']);
          //  $basketItem->setCategory2("Accessories");
            $basketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            $basketItem->setPrice($item['price']);
            array_push($this->basketItems,$basketItem);

        }
        $this->request->setBasketItems($this->basketItems);
        return $this;


    }

    public function paymentForm(){
        $form = \Iyzipay\Model\CheckoutFormInitialize::create($this->request, $this->options);

       return $form;
    }

    public function callbackForm($token,$consersationID){
        $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId($consersationID);
        $request->setToken($token);
        $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, $this->options);
        return $checkoutForm;
    }



}
