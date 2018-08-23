<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'tbl_categories';


    public static function getCategories()
    {
    	///Will be from db
		$categories = array();
		$categories = Category::all();
		return $categories;
		/*$categories[] = array( 'name' => 'Kitchen Sinks',
											 'class' => '',
		             'search_options' => array( 'keywords' => 'kitchen sink' ) );
		$categories[] = array( 'name' => 'Sink: Acrylic',
											 'class' => 'category',
		             'search_options' => array( 'keywords' => 'acrylic kitchen sink' ) );
		$categories[] = array( 'name' => 'Acrylic Single Sink',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'single acrylic sink' ) );
		$categories[] = array( 'name' => 'Acrylic Double Sink',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'double acrylic sink' ) );
		$categories[] = array( 'name' => 'Acrylic Drop-In',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'drop in acrylic sink' ) );
		$categories[] = array( 'name' => 'Acrylic Undermount',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'undermount acrylic sink' ) );
		$categories[] = array( 'name' => 'Sink: Cast Iron',
											 'class' => 'category',
		             'search_options' => array( 'keywords' => 'cast iron kitchen sink' ) );
		$categories[] = array( 'name' => 'Cast Iron Single Sink',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'single cast iron sink' ) );
		$categories[] = array( 'name' => 'Cast Iron Double Sink',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'double cast iron sink' ) );
		$categories[] = array( 'name' => 'Cast Iron Drop-In',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'drop in cast iron sink' ) );
		$categories[] = array( 'name' => 'Cast Iron Undermount',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'undermount cast iron sink' ) );
		$categories[] = array( 'name' => 'Sink: Copper',
											 'class' => 'category',
		             'search_options' => array( 'keywords' => 'copper kitchen sink' ) );
		$categories[] = array( 'name' => 'Copper Single Sink',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'single copper sink' ) );
		$categories[] = array( 'name' => 'Copper Double Sink',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'double copper sink' ) );
		$categories[] = array( 'name' => 'Copper Drop-In',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'drop in copper sink' ) );
		$categories[] = array( 'name' => 'Copper Undermount',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'undermount copper sink' ) );
		$categories[] = array( 'name' => 'Sink: Composite',
											 'class' => 'category',
		             'search_options' => array( 'keywords' => 'composite kitchen sink' ) );
		$categories[] = array( 'name' => 'Composite Single Sink',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'single composite sink' ) );
		$categories[] = array( 'name' => 'Composite Double Sink',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'double composite sink' ) );
		$categories[] = array( 'name' => 'Composite Drop-In',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'drop in composite sink' ) );
		$categories[] = array( 'name' => 'Composite Undermount',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'undermount composite sink' ) );
		$categories[] = array( 'name' => 'Sink: Stainless Steel',
											 'class' => 'category',
		             'search_options' => array( 'keywords' => 'stainless steel sink' ) );
		$categories[] = array( 'name' => 'Stainless Steel Single Sink',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'single stainless steel sink' ) );
		$categories[] = array( 'name' => 'Stainless Steel Double Sink',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'double stainless steel sink' ) );
		$categories[] = array( 'name' => 'Stainless Steel Drop-In',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'drop in stainless steel sink' ) );
		$categories[] = array( 'name' => 'Stainless Steel Undermount',
											 'class' => 'cat-item',
		             'search_options' => array( 'keywords' => 'undermount stainless steel sink' ) );
		$categories[] = array( 'name' => 'Sink: Bar',
											 'class' => 'category',
		             'search_options' => array( 'keywords' => 'bar sink' ) );
		$categories[] = array( 'name' => 'Sink: Drop-In',
											 'class' => 'category',
		             'search_options' => array( 'keywords' => 'drop-in kitchen sink' ) );
		$categories[] = array( 'name' => 'Sink: Undermount',
											 'class' => 'category',
		             'search_options' => array( 'keywords' => 'undermount kitchen sink' ) );

  	 	return $categories;*/
    }
}
