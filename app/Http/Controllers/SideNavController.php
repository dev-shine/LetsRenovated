<?php namespace App\Http\Controllers;

/*For Admin*/
use App\SideNav;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use \Serverfireteam\Panel\CrudController;
use App\Http\Controllers\CrudController;
use Illuminate\Http\Request;

class SideNavController extends CrudController{

public function all($entity) {
        parent::all($entity); 

        $this->filter = \DataFilter::source(new SideNav());
      /*  $this->filter->add('id', 'ID', 'text');
        $this->filter->add('name', 'Name', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();*/
                
        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id','ID', true)->style("width:100px");
        $this->grid->add('name','Name');
        $this->grid->add('url','Url');
        $this->addStylesToGrid();

        return $this->returnView(array('no_import'=>true));
    }

    public function  edit($entity){
        
        if (\Request::isMethod('patch') || \Request::isMethod('post'))
        {   
            $form = \Request::all();
            $form['url'] = $this->_friendlyURL($form['url']);
            \Request::replace($form);
        }


        parent::edit($entity);

        
        
        /*
            dd($this->_friendlyURL($keyword));
        */
        
        $SideNav =  new SideNav();
        $this->edit = \DataEdit::source($SideNav);

        $this->edit->label('Edit SideNav');
        $this->edit->add('name', 'Name', 'text')->rule('required');
        $this->edit->add('url', 'URL', 'text')->rule('required');
        return $this->returnEditView();
    }    



}
