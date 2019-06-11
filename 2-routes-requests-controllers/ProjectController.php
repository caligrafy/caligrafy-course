<?php

// REMEMBER to always define the namespace of the core Controller class. The namespace for all the Caligrafy core classes is 'Caligrafy'
use Caligrafy\Controller;

class ProjectController extends Controller {
    
    /* Any controller that you create needs to extend the core Controller of the framework that comes prepackaged with out-of-the-box methods for you to use
     * Consult the Caligrafy docummentation to know more about the properties and methods of a Controller
     * Caligrafy Main Github: https://github.com/DoryAzar/caligrafy
    */
    
    public function index()
    {
       
        echo "I am calling it from the index method controller";
        echo "This is my first test paragraph"; 
        
    }
    
    public function banana()
    {
        echo "I am calling it from the banana method controller";
        
    }
    
    public function readProject() 
    {
        // REMEMBER that the dump method allows you to display any data type on the screen
        
        // use the fetch method from Request to get the id parameter
        dump($this->request->fetch('id'));
        
        // Or use the fetch property to from Request to get the id parameter
        dump($this->request->fetch->id);
        
    }
    
    
}


