<?php

use Caligrafy\Controller;

class PageController extends Controller {
    
    public function showcaseForm()
    {
        // validate if the user is logged in      
        if (!authorized()) {
            redirect('/login');
            exit;
        } else {

            $this->associate('Project', 'projects');
            $project = $this->find();
            if ($project) {
                return view('showcase/add', array('project' => $project, 'put' => true));
            } else {
                return view('showcase/add');

            }   
        }
        
    }
    
    
}