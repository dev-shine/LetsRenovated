<?php
namespace App\library;


use Serverfireteam\Panel\libs\AppHelper;

class dashboard
{    
    
    public static $urls; 
    
    public static function create()
    {
        self::$urls = \Config::get('panel.panelControllers');
        
        $config    = \Serverfireteam\Panel\Link::all();
        $dashboard = array();

        // Make Dashboard Items
        foreach ($config as $key => $value) {                        

	    $modelName = $value['url'];           
            if ( in_array($modelName, self::$urls)) {
               $model = "Serverfireteam\Panel\\".$modelName;
            } else {
               $appHelper = new AppHelper(); 
               $model = $appHelper->getNameSpace() . $modelName;
            }

            //if($modelName != 'Link')dd($model);
            //if (class_exists($value)) {
            $dashboard[] = array(
                'title'	  => $value['display'],
                'count'	  => $model::count(),
                'showListUrl' => 'panel/' . $modelName . '/all',
                'addUrl'	  => 'panel/' . $modelName . '/edit',
            );   

        }

	return $dashboard;
    }
}
