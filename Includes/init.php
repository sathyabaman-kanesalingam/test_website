<?php
	$showForm = true;

	$mgrEntries = array();
	$mgrEntries[1]='Nancy Davolio';
	$mgrEntries[2]='Andrew Fuller';
	$mgrEntries[3]='Janet Leverling';
	$mgrEntries[4]='Margaret Peacock';
	$mgrEntries[5]='Steven Buchanan';
	$mgrEntries[6]='Michael Suyama';
	$mgrEntries[7]='Robert King';
	$mgrEntries[8]='Laura Callahan';
	$mgrEntries[9]='Anne Dodsworth';

	$errors = array();
	$dbEntries = array(	'FirstName'=>'',
						'LastName'=>'',
						'Email'=>'',
						'Title'=>'',
						'TitleOfCourtesy'=>'',
						'Address'=>'',
						'City'=>'',
						'Region'=>'',
						'PostalCode'=>'',
						'Country'=>'',
						'HomePhone'=>'',
						'Extension'=>'',
						'Notes'=>'',
						'ReportsTo'=>'',
						'Password'=>'',
						'Email'=>'',
						'BirthMonth'=>1,
						'BirthDay'=>1,
						'BirthYear'=>date('Y'),
						'HireMonth'=>1,
						'HireDay'=>1,
						'HireYear'=>date('Y'));	
	$browserEntries = array();
?>
