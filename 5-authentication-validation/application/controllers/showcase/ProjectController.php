<?php

use Caligrafy\Controller;

class ProjectController extends Controller {
    
    // Method 1: read all the projects that are in the database
    public function index()
    {
        $this->associate('Project', 'projects');
        
        // Get all the projects or return empty array in case of errors
        $projects = $this->all()?? array();
        
        // Display the projects
        return view('showcase/index', array('projects' => $projects));
        
    }
    
    
    // Method 2: read the details of a specific project
    
    public function readProject()
    {
        $this->associate('Project', 'projects');
        
        // find method that will return the id specified in the URI
        $project = $this->find();
        dump($project);
        
        // HasOne Relationship fetches information about the linked table, in this case user
        dump($project->user());
        
    }
    
    
    // Method 3: create a new project
    public function addProject()
    {
        $this->associate('Project', 'projects');
        
        $parameters = $this->request->parameters;
        $userInput = (Object)$parameters;
        $file = $this->request->files('image_url');
        $parameters['image_url'] = $file;
        
        // Input validation
        $validate = $this->validator->check($parameters, array('title' => 'required|alpha|max_len, 18',
                                                              'short_description' => 'required|max_len, 200',
                                                               'category' => 'required',
                                                               'description' => 'required',
                                                               'image_url' => 'required_file|extension,png;jpg;gif;jpeg;svg'
                                                              ));
        
        // invalid inputs
        if ($validate !== true) {
            return view('showcase/add', array('error' => true, 'status' => 'danger', 'message_header' => 'Whoooops, something went wrong', 'message' => 'Some of the inputs are invalid. Make sure all the required inputs are entered properly', 'errors' => $validate, 'project' => $userInput));
            exit;
        }
        
        
        if ($file) {
            $image_url = uploadFile($file);
        }
        
        $project = new Project();
        $project->title = $parameters['title']?? 'Title not entered';
        $project->category = $parameters['category']?? 'category not entered';
        $project->short_description = $parameters['short_description']?? 'short not entered';
        $project->description = $parameters['description']?? 'description not entered';
        $project->image_url = isset($image_url)? $image_url : 'http://';
        $project->user_id = $parameters['user_id']?? 1;
        
        $this->save($project);
        redirect('/');
        
    }
    
    
    // Method 4: update a specific project
    public function updateProject()
    {
        $this->associate('Project', 'projects');
        
        $project = $this->find();
        
        if ($project) {
            $parameters = $this->request->parameters;
            $userInput = (Object)$parameters;
            
            // Input validation
            $validate = $this->validator->check($parameters, array('title' => 'required|alpha|max_len, 18',
                                                                  'short_description' => 'required|max_len, 200',
                                                                   'category' => 'required',
                                                                   'description' => 'required'
                                                                  ));
        
            // invalid inputs
            if ($validate !== true) {
                return view('showcase/add', array('put' => true, 'error' => true, 'status' => 'danger', 'message_header' => 'Whoooops, something went wrong', 'message' => 'Some of the inputs are invalid. Make sure all the required inputs are entered properly', 'errors' => $validate, 'project' => $userInput));
                exit;
            }
            
            $project->title = $parameters['title']?? $project->title;
            $project->category = $parameters['category']?? $project->category;
            $project->short_description = $parameters['short_description']?? $project->short_description;
            $project->description = $parameters['description']?? $project->description;
            $project->image_url = $parameters['image_url']?? $project->image_url;
            $project->user_id = $parameters['user_id']?? $project->user_id;
            
            $this->save($project);
            redirect('/');
            
        } else {
            echo "I could not find the project for you";
        }
        
        
    }
    
    
    // Method 5: delete a specific project
    public function deleteProject() 
    {
        $this->associate('Project', 'projects');
        $this->delete();
        redirect('/');
        
    }
    
    
    
    
}


