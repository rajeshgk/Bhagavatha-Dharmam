<?php

class SubscriberController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()	{
		$subscribers = Subscriber::search(Input::get('sSearch'))->page(Input::get('iDisplayStart'), 
				Input::get('iDisplayLength'))->orderBy(Input::get("mDataProp_".Input::get('iSortCol_0')), Input::get("sSortDir_0"))->get();
		$search_count = Subscriber::search(Input::get('sSearch'))->count();
		$total = Subscriber::count();
	 
		/*$subs_array = $subscribers->toArray();
		$subs_data_table = array();
		foreach($subs_array as $subscriber) {
			$subscriber_data_table = array();
			//var_dump($subscriber);
			$subscriber_data_table['account_id'] = $subscriber['account_id'];
			$subscriber_data_table['entry_no'] = $subscriber['entry_no'];
			$subscriber_data_table['date_of_join'] = $subscriber['date_of_join'];
			$subscriber_data_table['name'] = $subscriber['title'] . ' ' . $subscriber['initial'] . ' ' . $subscriber['name'];
			$subscriber_data_table['address'] = $subscriber['door_no'] . " " . $subscriber['address1'] . "\n" . 
										$subscriber['address2'] . "\n" . $subscriber['address3'];
			$subscriber_data_table['city'] = $subscriber['city'];
			$subscriber_data_table['pincode'] = $subscriber['pincode'];
			$subscriber_data_table['phone no'] = $subscriber['phone_no'] . "\n" . $subscriber['mobile_no'];
			$subscriber_data_table['email'] = $subscriber['email'];
			$subscriber_data_table['active'] = $subscriber['active'];
			$subs_data_table[] = $subscriber_data_table;
		}*/
		return Response::json(array(
			'error' => false,
			"sEcho" => intval(Input::get('sEcho')),
			'iTotalRecords' => $total,
			'iTotalDisplayRecords' => $search_count,
			'aaData' => $subscribers->toArray()),
			200
		);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)	{

		return Response::json(array(
			'error' => false,
			'aaData' => $id->toArray()),
			200
		);
	}

}