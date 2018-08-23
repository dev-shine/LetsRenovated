<?php
//namespace Serverfireteam\Panel;
namespace App\Http\Controllers;



/*  
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;

class CrudController extends Controller
{
    public $grid;
    public $entity;
    public $set;
    public $edit;
    public $filter;
    protected $lang;

    public function __construct(\Lang $lang)
    {         
       // $this->entity = $params['entity'];
        $route = \App::make('route');
        $this->lang = $lang;
        $this->route = $route;
        $routeParamters = $route::current()->parameters();
        $this->setEntity($routeParamters['entity']);                      
    }

    /**
    * @param string $entity name of the entity
    */
    public function all($entity)
    {                                                          
        //$this->addStylesToGrid();                   
    }
    
    /**
    * @param string $entity name of the entity
    */
    public function edit($entity)
    {

    }


    public function getEntity(){
        return $this->entity;
    }

     public function setEntity($entity){
        $this->entity = $entity;
    }
    
    public function addStylesToGrid($order_by = 'id')
    {
        $this->grid->edit('edit', 'Show', 'show|modify|delete');
        $this->grid->orderBy($order_by, 'desc');     
        $this->grid->paginate(10);
        
    }

    public function returnView($parameter = null)
    {
        $configs = \Serverfireteam\Panel\Link::returnUrls();   
        if ( !isset($configs) || $configs == null ){   
            throw new \Exception('NO URL is set for yet');                                                      
        } else if( !in_array($this->entity, $configs)){
            throw new \Exception('This url is not set yet!');                                                                            
        } 
        else {        

            //$this->filter->model = $this->filter->model->where('parent','0');
            //$this->grid->source->model->where('parent','0');
            //dd(get_class($this->grid));

            //dd($this->grid->source->model->where('parent','0'));
            return \View::make('panelViews::all', array(
             'grid' 	      => $this->grid,
             'filter'         => $this->filter,
	         'current_entity' => $this->entity,
             'params' => ($parameter)?$parameter:array('no_import'=>false),
	         'import_message' => (\Session::has('import_message')) ? \Session::get('import_message') : ''
            ));   
        }                      
    }
    
    public function returnEditView()
    {
        $configs = \Serverfireteam\Panel\Link::returnUrls();

        if ( !isset($configs) || $configs == null ){   
            throw new \Exception('NO URL is set for yet');                                                      
        } else if( !in_array($this->entity, $configs)){
            throw new \Exception('This url is set yet !');                                                                            
        }  else {        
           return \View::make('panelViews::edit', array(
             'edit' => $this->edit
            )); 
        }           
    }
    
     public function finalizeFilter(){
        $lang = \App::make('lang');
        $this->filter->submit($this->lang->get('panel::fields.search'));
        $this->filter->reset($this->lang->get('panel::fields.reset'));
    }
    
    
}
