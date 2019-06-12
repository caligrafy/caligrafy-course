<?php

use Caligrafy\Controller;

class PageController extends Controller {
    
    public function showcaseForm()
    {
        $this->associate('Project', 'projects');
        $project = $this->find();
        if ($project) {
            return view('showcase/add', array('project' => $project, 'put' => true));
        } else {
            return view('showcase/add');
            
        }
        
    }
    
    
}