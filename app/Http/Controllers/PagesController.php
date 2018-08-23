<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use App\Pages;
use Illuminate\Http\Request;

class PagesController extends CrudController{

    public function all($entity) {
        parent::all($entity); 

        $this->filter = \DataFilter::source(new Pages());
        /*$this->filter->add('id', 'ID', 'text');
        $this->filter->add('name', 'Name', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();*/
                
        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id','ID', true)->style("width:100px");
        $this->grid->add('page_name','Name');
        $this->grid->add('slug','URL');
        $this->addStylesToGrid();

        return $this->returnView(array('no_import'=>true));
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        $this->edit = \DataEdit::source(new Pages());

        $this->edit->label('Pages');
        $this->edit->link("rapyd-demo/filter","Articles", "TR")->back();
        //$this->edit->add('email','Email', 'text')->rule('required|min:5');
        $this->edit->add('page_name', 'Page Name', 'text')->rule('required');
        $this->edit->add('slug', 'Slug URL', 'text')->rule('required');
        $this->edit->add('page_keyword', 'Keyword', 'text')->rule('required');
        $this->edit->add('content', 'Content', 'textarea')->rule('required');
        return $this->returnEditView();
    }     
}
