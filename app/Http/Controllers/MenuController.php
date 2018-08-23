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

        $parent = \Request::input('parent');
        $parent = isset($parent)?$parent:'0';
        $query = \DB::table('tbl_mainmenu')->where('parent',$parent);
        $this->filter = \DataFilter::source($query);
        /*
        $this->filter->add('id', 'ID', 'text');
        $this->filter->add('name', 'Name', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();
        */
        

        $this->grid = \DataGrid::source($this->filter);
        
        $this->grid->add('id','ID', true)->style("width:100px");
        $this->grid->add('name','Name');
        $this->grid->add('relative_url','Relative URL');
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
        $topmenu = new Menu;

        $this->edit = \DataEdit::source($topmenu);

        $lists = \App\Menu::lists("name", "id");
        $lists['0'] = 'None';

        $menus = \DB::table('tbl_mainmenu')->lists('name','id');
        $menus['0'] = 'Root';
        

        ksort($menus);


        $this->edit->label('Main Menu');
        //$this->edit->link("rapyd-demo/filter","Articles", "TR")->back();
        //$this->edit->add('email','Email', 'text')->rule('required|min:5');
        $this->edit->add('name', 'Name', 'text')->rule('required');
        $this->edit->add('url', 'URL', 'text')->rule('required');
        $this->edit->add('relative_url','Relative URL','text');
        $this->edit->add('parent', 'Parent', 'select')->options($menus);
        $this->edit->add('key_id', 'API Key', 'select')->options(\DB::table('tbl_keys')->lists('key_lbl','id'));
        $this->edit->add('side_nav', 'Links', 'textarea');
        return $this->returnEditView();
 }


}
