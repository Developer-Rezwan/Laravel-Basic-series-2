<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudeController extends Controller
{
	    public function get_all_data(){
	    	$data = DB::table('costomers')->get();
	        dd($data);
	    } 


	public function get_single_data(){
		$data = DB::table('costomers')->first();
		dd($data);
	}

	public function get_specific_data(){
		$data = DB::table('costomers')->where('costomer_name','arifa')->get();
		dd($data);
	}

	public function only_find_by_id(){
		$data = DB::table('costomers')->find(4);
		dd($data);
	}

	public function specific_column_data_list(){
		$data = DB::table('costomers')->pluck('costomer_name');
		dd($data);
	}

	public function count_table_row(){
		$data = DB::table('costomers')->count();
		dd($data);
	}

	public function total_amount(){
		$data = DB::table('costomers')->sum('Product_prices');
		dd($data);
	}

	public function maximum_amount(){
		$data = DB::table('costomers')->max('Product_prices');
		dd($data);
	}

	public function avarage_amount(){
		$data = DB::table('costomers')->avg('Product_prices');
		dd($data);
	}

	public function total_amount_a_costomer(){
		$data = DB::table('costomers')->where('costomer_name','Rezwan')->sum('Product_prices');
		dd($data);
	}

	public function needed_table_data(){
		$data = DB::table('costomers')
		->select('Email as costomer_email','Product_prices')
		->where('costomer_name','sajeeb')->get();
		
		dd($data->costomer_email);
	}

/** inner join a 2 table er common elements gulo show korbe **/
	public function inner_join_table(){
		$data = DB::table('costomers')
		          ->select('costomers.Email' , 'invoices.amount')
		          ->join('invoices','invoices.costomer_id','=' ,'costomers.id')
		          ->get();
		dd($data);

	}

/** left join a left/ table() er vitor je name deya hobe setar sob elements soho join kora table er common elements gula dekhabe **/

	public function left_join_table(){
		$data = DB::table('costomers')
		          ->select('costomers.Email' , 'invoices.amount')
		          ->leftjoin('invoices','invoices.costomer_id','=' ,'costomers.id')
		          ->get();
		dd($data);

	}


	public function right_join_table(){
		$data = DB::table('costomers')
		          ->select('costomers.Email' , 'invoices.amount')
		          ->rightjoin('invoices','invoices.costomer_id','=' ,'costomers.id')
		          ->get();
		dd($data);

	}

	/** SELECT * FROM `costomers`
JOIN invoices ON costomers.id = invoices.Costomer_id *** Database a avabe likhte hobe ****/

/*** Specific data select ****/
	public function use_of_where(){
		$data = DB::table('invoices')
		->select('amount')
		->where('amount','>=','2233')
		->get();
		dd($data);

	}

/*** Data search system ****/
	public function search_by_where(){
		$data = DB::table('invoices')
		->select('amount')
		->where('amount','like','%22%')
		->get();
		dd($data);

	}

/*** Multiple data condition set up ****/
	public function multiple_condition(){
		$data = DB::table('invoices')
		->select('amount')
		->where('amount','>','2233') // It's work as a AND
		->where('amount','<','44444')
		->get();
		dd($data);

	}

	public function multiple_data_select_condition(){
		$data = DB::table('invoices')
		->select('amount')
		->where('amount','>','2233') // It's work as OR
		->orWhere('id','=','3')
		->get();
		dd($data);

	}

	public function multiple_data_select_Between(){
		$data = DB::table('costomers')
		->whereBetween('id',[1,7])
		->get();
		dd($data);

	}

	public function multiple_data_select_Not_Between(){
		$data = DB::table('costomers')
		->whereNotBetween('id',[1,7])
		->get();
		dd($data);

	}

	public function multiple_data_select_In(){
		$data = DB::table('costomers')
		->whereIn('id',[1,2,3])
		->get();
		dd($data);

	}

	public function multiple_data_select_Not_In(){
		$data = DB::table('costomers')
		->whereNotIn('id',[1,5])
		->get();
		dd($data);

	}

	public function multiple_data_select_Null(){
		$data = DB::table('costomers')
		->whereNull('updated_at') // Jekhane Updated at Null thakbe
		->get();
		dd($data);

	}

	public function multiple_data_select_Not_Null(){
		$data = DB::table('costomers')
		->whereNotNull('updated_at') // Jekhane Updated at Null thakbe na
		->get();
		dd($data);

	}

	public function data_select_Order_By_DESC(){
		$data = DB::table('costomers')
		->orderBy('id','DESC')
		->get();
		dd($data);

	}

	public function data_select_Order_By_ASC(){
		$data = DB::table('costomers')
		->orderBy('id','ASC')
		->get();
		dd($data);

	}

	public function data_select_Order_By_LIMIT(){
		$data = DB::table('costomers')
		->orderBy('id','ASC')
		->offset(3) // skip korano ke bujhay, Mane first 3 ta skip kore Porer 2 ta nilam
		->limit(2) // Limit er jonno shudhu limit o use kora jay
		->get();
		dd($data);

	}
/*** Same to limit and offset er moto .. Jekono akti use kora jabe ****

	public function data_select_Order_By_LIMIT(){
		$data = DB::table('costomers')
		->orderBy('id','ASC')
		->skip(3) // skip korano ke bujhay, Mane first 3 ta skip kore Porer 2 ta nilam
		->take(2)
		->get();
		dd($data);

	}
******************************************************/
/********* Big data select system *******************/
	public function Use_of_chunk(){
		DB::table('costomers')->orderBy('id')->chunk(2,function($costomers){
           echo "Chunk <pre>";
           print_r($costomers);
		});

	}

	/***************** Data insert in data base ****************/
	public function data_insert(){
		DB::table('costomers')
		->insert(
       ['email' => 'arifajahan@gmail.com','Costomer_name'=>'Sweety']
		);
		echo "Data successfully Inserted!";
	}

	/***************** Data insert in data base ****************/
	public function multiple_data_insert(){
		DB::table('costomers')
		->insert([
       ['email' => 'arifajahan@gmail.com','Costomer_name'=>'Sweety'],
       ['email' => 'rezwanhossainn@gmail.com','Costomer_name'=>'Rezwan']
		]);
		echo "Data successfully Inserted!";
	}

	/***************** Data Update in database ****************/
	public function data_update(){
		DB::table('costomers')
		->where('id',4)
		->update([
          'Costomer_name' => 'Arifa jahan',
          'Email' => 'arifajahansweety@gmail.com'
		]);
		echo "Data successfully Updated!";
	}

	/***************** Data Update or Insert in database ****************/
	public function data_update_or_insert(){
		DB::table('costomers')
		->updateOrInsert(
			['Costomer_name' => 'Rezwan Hossain sweety'], // This is work as Where condision and insert or update condition
			['Email' => 'rezwanhossain'] // Upadated value
		);
		echo "Succfully Up to date";
	}

	/***************** Data Update or Insert in database ****************/
	public function data_delete(){
		DB::table('costomers')
		->where('id',2)
		->delete();
		echo "Succfully Deletd!";
	}
}
