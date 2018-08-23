<?php namespace App\Http\Controllers;

/*For Admin*/
use App\Menu;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use \Serverfireteam\Panel\CrudController;
use App\Http\Controllers\CrudController;

use Illuminate\Http\Request;

class MenuController extends CrudController{

public function all($entity) {
        parent::all($entity); 


        $query = \DB::table('tbl_mainmenu')->where('parent','0');
        $this->filter = \DataFilter::source($query);
      /*  $this->filter->add('id', 'ID', 'text');
        $this->filter->add('name', 'Name', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();*/
        

        $this->grid = \DataGrid::source($this->filter);
        
        

        //dd(get_class($this->grid));
        $this->grid->add('id','ID', true)->style("width:100px");
        $this->grid->add('name','Name');
        $this->grid->add('url','Url');
        $this->addStylesToGrid();

//        dd(get_class($this));
        return $this->returnView(array('no_import'=>true));
    }

 	public function  edit($entity){
        
        if (\Request::isMethod('patch') || \Request::isMethod('post'))
        {   
            $form = \Request::all();
            $form['url'] = $this->_friendlyURL($form['url']);
            \Request::replace($form);
        }

        $query = \DB::table('tbl_mainmenu')->where('parent','0');
        parent::edit($entity);

        //$vehicles = \App\vehicles::with('make','model','user');
        $topmenu = new Menu;

        $this->edit = \DataEdit::source($topmenu);

        $this->edit->label('Edit TopMenu');
        //$this->edit->link("rapyd-demo/filter","Articles", "TR")->back();
        //$this->edit->add('email','Email', 'text')->rule('required|min:5');
        $this->edit->add('name', 'Name', 'text')->rule('required');
        $this->edit->add('url', 'URL', 'text')->rule('required');
        $this->edit->add('parent', 'Parent', 'select')->options(\App\Menu::where('parent','0')->lists("name", "id"));
        return $this->returnEditView();
 }


}
