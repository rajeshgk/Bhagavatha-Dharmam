<?php
 
class SubscriberTableSeeder extends Seeder {
 
    public function run() {
        // our array of subscriber objects to create - just one in this case
		Event::listen("illuminate.query", function($query, $bindings, $time, $name){
			Log::info($query."\n");
			Log::info(json_encode($bindings)."\n");
		});
		
		if (file_exists('subscribers.csv')) {
			$subscribers = array();
			$list_content = file_get_contents("subscribers.csv");
			$list = str_getcsv($list_content, "\n");
			foreach ($list as $subscriber) {
				$subscriber_details = str_getcsv($subscriber, ",");
				if (count($subscriber_details) <= 1) {
					continue;
				}
				Log::info(print_r($subscriber_details, true));
				$account_id_details = explode("-", $subscriber_details[0]);
				if (count($account_id_details) <= 1) {
					continue;
				}
				Log::info(print_r($account_id_details, true));
				// FIXME - Duplicates found D-906, D -906, etc.,
				// $account_id = trim($account_id_details[0]) . "-" . trim(substr("0000".$account_id_details[1], -4, 4));
				$account_id = $account_id_details[0] . "-" . substr("0000".$account_id_details[1], -4, 4);
				$new_subscriber = array(
					"account_id" => $account_id,
					"entry_no" => $subscriber_details[1],
					"date_of_join" => date("Y-m-d H:i:s", ($subscriber_details[2] == "1900-01-01 00:00:00" ? null : strtotime($subscriber_details[2]))),
					"title" => $this->emptyIfNull($subscriber_details[3]),
					"initial" => $this->emptyIfNull($subscriber_details[4]),
					"name" => $this->emptyIfNull($subscriber_details[5]),
					"type" => $this->emptyIfNull($subscriber_details[6]),
					"door_no" => $this->emptyIfNull($subscriber_details[7]),
					"address1" => $this->emptyIfNull($subscriber_details[8]),
					"address2" => $this->emptyIfNull($subscriber_details[9]),
					"address3" => $this->emptyIfNull($subscriber_details[10]),
					"city" => $this->emptyIfNull($subscriber_details[11]),
					"pincode" => $this->emptyIfNull($subscriber_details[12]),
					"phone_no" => $this->emptyIfNull($subscriber_details[13]),
					"mobile_no" => $this->emptyIfNull($subscriber_details[14]),
					"email" => $this->emptyIfNull($subscriber_details[15]),
					"active" => $this->emptyIfNull($subscriber_details[20]),
					"cancelled_on" => date("Y-m-d H:i:s", ($subscriber_details[18] === "1900-01-01 00:00:00" ? null : strtotime($subscriber_details[19]))));
				Log::info(print_r($new_subscriber, true));
				DB::table('subscribers')->insert(array($new_subscriber));
			}
			
		}
	}
	
	private function emptyIfNull($value) {
		return $value == "NULL" ? "" : $value;
	}
 
}