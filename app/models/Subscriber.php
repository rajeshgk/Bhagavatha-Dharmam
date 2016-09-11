<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Subscriber extends Eloquent {

    protected $table = 'subscribers';
	protected $primaryKey = "account_id";
	
	protected $accountId;
	protected $entryNo;
	protected $dateOfJoin;
	protected $title;
	protected $initial;
	protected $name;
	protected $type;
	protected $doorNo;
	protected $address1;
	protected $address2;
	protected $address3;
	protected $city;
	protected $pincode;
	protected $phoneNo;
	protected $mobileNo;
	protected $email;
	protected $active;
	protected $cancelledOn;

	public function scopeActive($query) {
		return $query->where('active', "Y");
	}
	
	public function scopePage($query, $start = 0, $limit = 10) {
		return $query->skip($start)->take($limit);
	}
	public function scopeSearch($query, $search) {
	    $query = $query->where('account_id', 'LIKE', '%'.$search.'%');
		$query = $query->orWhere('entry_no', $search);
		$query = $query->orWhere('name', 'LIKE', '%'.$search.'%');
		$query = $query->orWhere('address1', 'LIKE', '%'.$search.'%');
		$query = $query->orWhere('address2', 'LIKE', '%'.$search.'%');
		$query = $query->orWhere('address3', 'LIKE', '%'.$search.'%');
		$query = $query->orWhere('city', 'LIKE', '%'.$search.'%');
		$query = $query->orWhere('pincode', 'LIKE', '%'.$search.'%');
		$query = $query->orWhere('phone_no', 'LIKE', '%'.$search.'%');
		$query = $query->orWhere('mobile_no', 'LIKE', '%'.$search.'%');
		return $query;
	}
}
?>