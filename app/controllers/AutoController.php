<?php
/**
* 
*/
class AutoController extends \BaseController
{
	public function postData($term){
		$return_arr = array();
	    $param = $term;
	    $fetch = DB::select( DB::raw("SELECT * FROM items WHERE itemCode REGEXP '^$param' LIMIT 5") );
	    foreach ($fetch as $key => $mt) {
	            $row_array[$key]['itemCode'] = $mt->itemCode;
	            $row_array[$key]['itemDesc'] = $mt->itemDesc;
	            $row_array[$key]['itemPrice'] = $mt->itemPrice;
	            array_push( $return_arr, $row_array );
	    }
	    return Response::json($return_arr);
	}
}