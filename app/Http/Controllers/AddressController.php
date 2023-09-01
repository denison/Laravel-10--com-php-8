<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cep;

class AddressController extends Controller
{
     /**
     * Find address by zipcode
     *
     * @return json
    */
    public function findByZipcode($zipcode)
    {
        $cep = Cep::find($zipcode);
        $address = $cep->getCepModel();

        return json_encode($address);
    }

    private $customers;
    private $campaign;
}
