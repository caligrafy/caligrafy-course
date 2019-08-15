<?php

use Caligrafy\Controller;
use Caligrafy\CryptoPayment;

class PaymentController extends Controller {
    
    public function chargeCredit()
    {
        
        $this->activatePayment();
        
        // Create a card object from the posted information
        //$parameters = $this->request->parameters(); // fetches the inputs from the form
        $card = [
            'card' => array(
            'number' => '4242 4242 4242 4242', 
            'exp_month' => '8', 
            'exp_year' => '2020',
            'cvc' => '1234') 
        ];
        
        // Create a payment transaction
        dump($this->payment->createTransaction(1000, 'USD', $card));
        
    }
    
    public function chargeCrypto()
    {
        
        // Activate Coinbase Commerce Payment
        $crypto = new CryptoPayment();
        
        // Create a payment transaction
        $transaction = $crypto->createTransaction(10, 'USD', array('name' => 'Our Course Test Product', 'description' => 'This is a product test that we created in the course'));
        
        return view('default/index', array('cryptourl' => $transaction->hosted_url));
        
        
    }
    
    public function getCharges()
    {
        $crypto = new CryptoPayment();
        dump($crypto->getCharges());
        
        
    }
    
    public function getStatus()
    {
        $crypto = new CryptoPayment();
        $id = $this->request->fetch->id;
        dump($crypto->getChargeStatus($id));
        
    }
        
}
    
    