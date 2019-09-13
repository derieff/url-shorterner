<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Validator;
use DB;
use Response;
use App\DataLinks;

class ProcessController extends Controller
{
    public function generate_new_link_randomly(Request $request){
  //   	$validator = Validator::make($request->all(), [
  //           'previous_link' => 'required|active_url',
  //       ]);

  //       if ($validator->fails()) {
		// 	return Response::json(['code' => '402', 'status' => false, 'message' => $validator->errors()->all()], 200);
		// }
		if( empty($request->previous_link) ){
			return Response::json(['code' => '444', 'status' => true,
	            'message' => 'Link harus diisi'
	        ], 200);
		}

		$previous_link = $request->previous_link;

		if( 
			!preg_match(
		        "/^([a-zA-Z0-9][a-zA-Z0-9-_]*\.)*[a-zA-Z0-9]*[a-zA-Z0-9-_]*
		        [[a-zA-Z0-9]+$/", $previous_link
	    	)
	    ){
			return Response::json(['code' => '444', 'status' => true,
	            'message' => 'Link tidak valid'
	        ], 200);
	    }

	    $cek_data = DataLinks::select('new_link')
	    	->where('previous_link', $previous_link)->first();
	    if( !empty($cek_data) ){
	    	$new_link = $cek_data->new_link;

	    	return Response::json(['code' => '200', 'status' => true,
	            'message' => 'Link sudah pernah terdaftar',
	            'previous_link' => $previous_link,
	            'new_link' => $new_link
	        ], 200);
	    }else{
	    	$creating_new_link = true;

	    	while($creating_new_link){
		    	$randoming = $this->randomizer().$this->randomizer().$this->randomizer().$this->randomizer().$this->randomizer().$this->randomizer().$this->randomizer().$this->randomizer();

		    	$new_link = "https://emc.group/".$randoming;

		    	$cek_new_link = DataLinks::where('new_link', $new_link)->first();

		    	if( empty($cek_new_link) ){
		    		$creating_new_link = false;

		    		return Response::json(['code' => '200', 'status' => true,
			            'message' => 'Link baru berhasil dibuat',
			            'previous_link' => $previous_link,
			            'new_link' => $new_link
			        ], 200);	
		    	}
	    	}
	    }

    }

    private function randomizer(){
	    $consonan = array("1","2","3","4","5","6","7","8","9","0",
	        "A","B","C","D","E","F","G","H","I","J","J","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
	        "a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"
	    );
	    $kon1 = array();

	    while(count($kon1) < 1){
	        $x = mt_rand(0, count($consonan)-1);
	        if(!in_array($x, $kon1)){
	        	$kon1[] = $x;
	        }
	    }
		$random_con1 = "";
		foreach($kon1 as $key){
			$random_con1 .= $consonan[$key];
		}

		return $random_con1;
    }
}
