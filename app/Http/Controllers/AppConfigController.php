<?php namespace App\Http\Controllers;

/*For Admin*/
use App\AppConfig;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use \Serverfireteam\Panel\CrudController;
use App\Http\Controllers\CrudController;
use Illuminate\Http\Request;

class AppConfigController extends CrudController{

public function all($entity) {
        parent::all($entity); 

        $this->filter = \DataFilter::source(new AppConfig());
    
                
        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id','ID', true)->style("width:100px");
        $this->grid->add('label_name','Name');
        $this->addStylesToGrid();

        return $this->returnView(array('no_import'=>true));
    }

    public function  edit($entity){
        
        /*if (\Request::isMethod('patch') || \Request::isMethod('post'))
        {   
            $form = \Request::all();
            //$form['url'] = $this->_friendlyURL($form['url']);
            \Request::replace($form);
        }*/


        parent::edit($entity);

        
        
        /*
            dd($this->_friendlyURL($AppConfigword));
        */
        
        $AppConfig =  new AppConfig();
        $this->edit = \DataEdit::source($AppConfig);

        $this->edit->label('Edit Config');
        $this->edit->add('label_name','Name','text')->rule('required');
        $this->edit->add('body','Body','textarea')->rule('required');
        
        return $this->returnEditView();
    }    



}
