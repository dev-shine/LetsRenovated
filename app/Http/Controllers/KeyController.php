<?php namespace App\Http\Controllers;

/*For Admin*/
use App\Key;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use \Serverfireteam\Panel\CrudController;
use App\Http\Controllers\CrudController;
use Illuminate\Http\Request;

class KeyController extends CrudController{

public function all($entity) {
        parent::all($entity); 

        $this->filter = \DataFilter::source(new Key());
    
                
        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id','ID', true)->style("width:100px");
        $this->grid->add('key_lbl','Name');
        $this->grid->add('api_key','API Key');
        $this->grid->add('catelog_key','Catelog Key');
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
            dd($this->_friendlyURL($keyword));
        */
        
        $Key =  new Key();
        $this->edit = \DataEdit::source($Key);

        $this->edit->label('Edit Key');
        $this->edit->add('key_lbl','Name','text')->rule('required');
        $this->edit->add('api_key','API Key','text')->rule('required');
        $this->edit->add('catelog_key','Catelog Key','text')->rule('required');
        
        return $this->returnEditView();
    }    



}
