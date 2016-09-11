<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bhagavatha Dharmam Subscribers</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
	<link href="//www.datatables.net/media/blog/bootstrap/DT_bootstrap.css" rel="stylesheet">
	<link href="//www.datatables.net/release-datatables/media/css/demo_table_jui.css" rel="stylesheet">
	<link href="//www.datatables.net/release-datatables/examples/examples_support/themes/smoothness/jquery-ui-1.8.4.custom.css" rel="stylesheet">
</head>
<body> 
<div class="container">
 <div class="row">
  <div class="col-md-12">
    <h1>Bhagavatha Dharmam - Subscribers List</h1>
	<br>
<table class="table-bordered table-hover table-condensed table-responsive" id="bds">
    <thead>
        <tr>
            <th>Account Id</th>
            <th>Entry No</th>
            <th>Date Of Join</th>
            <th>Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Pincode</th>
            <th>Phone No</th>
            <th>Email</th>
            <th>Active</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<br>
</div>
</div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>	
<script>
$(document).ready(function() {
    $('#bds').dataTable( {
		"sDom": 'Rlfrtip',
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": '/api/v1/subs',
		"bStateSave": true,
		"sPaginationType": "full_numbers",
		"bJQueryUI": true,
        "aoColumns": [ 
            { "mData": "account_id", aaSorting: ["asc"], 
				"mRender": function ( data, type, full ) {
							return '<a class="profile" href="/profile/' + data + '">' + data + '</a>';
						  } },
            { "mData": "entry_no", sClass: "text-right"},
            { "mData": "date_of_join", sType: "date", 
				"mRender": function ( data, type, full ) {
							return (data == "0000-00-00 00:00:00" ? "" : data);
						  } },
            { "mData": "name", "bSortable" : false,
				"mRender": function ( data, type, full ) {
							return (full.title + " " + full.initial + " " + full.name);
						  } },
            { "mData": "address1", "bSortable" : false,
				"mRender": function ( data, type, full ) {
							return (full.door_no + " " + full.address1 + "\n" + full.address2 + "\n" + full.address3);
						  } },            
			{ "mData": "city" },
            { "mData": "pincode" },
            { "mData": "phone_no", "bSortable" : false,
				"mRender": function ( data, type, full ) {
							return (full.phone_no + "\n" + full.mobile_no);
						  } },   
		    { "mData": "email" ,
				"mRender": function ( data, type, full ) {
							return '<a href="mailto:' + data + '">' + data + '</a>';
						  } },
			{ "mData": "active" ,
				"mRender": function ( data, type, full ) {
							return (data == "Y" ? "Yes" : "No");
						  } },
        ]
	});
});
</script>
</body>
</html>