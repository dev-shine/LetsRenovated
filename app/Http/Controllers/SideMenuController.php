<?php namespace App\Http\Controllers;

/*For Admin*/
use App\SideMenu;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use \Serverfireteam\Panel\CrudController;
use App\Http\Controllers\CrudController;

use Illuminate\Http\Request;

class SideMenuController extends CrudController{

    public function all($entity) {
        parent::all($entity); 


        $parent = \Request::input('parent');
        $parent = isset($parent)?$parent:'0';
        $query = \DB::table('tbl_sidemenu')->where('parent',$parent);

        $this->filter = \DataFilter::source($query);
      /*  $this->filter->add('id', 'ID', 'text');
        $this->filter->add('name', 'Name', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();*/
                
        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id','ID', true)->style("width:100px");
        $this->grid->add('name','Name');
        $this->grid->add('url','Url');
        $this->grid->add('parent','Parent');
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

        //$vehicles = \App\vehicles::with('make','model','user');
        $topmenu =  new SideMenu();

        
        $this->edit = \DataEdit::source($topmenu);

        $lists = \App\SideMenu::lists("name", "id");
        $lists['0'] = 'None';

        $this->edit->label('TopMenu');
        //$this->edit->link("rapyd-demo/filter","Articles", "TR")->back();
        //$this->edit->add('email','Email', 'text')->rule('required|min:5');
        $this->edit->add('name', 'Name', 'text')->rule('required');
        $this->edit->add('url', 'URL', 'text');
        $this->edit->add('parent', 'Parent', 'select')->options($lists);
        return $this->returnEditView();
 }


}
