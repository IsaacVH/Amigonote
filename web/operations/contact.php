<?php
	require_once("/web/settings/global.php");

	class Contact {
		private $contactid;
		private $contacttypeid;
		private $firstname;
		private $lastname;
		private $phone;
		private $email;
		private $address;
		private $city;
		private $state;
		private $postalcode;
		private $age;
		private $gender;

		public function __construct($new_contacttypeid = null, $new_firstname = null, $new_lastname = null, 
			$new_phone = null, $new_email = null, $new_address = null, $new_city = null, $new_state = null, 
			$new_postalcode = null, $new_age = null, $new_gender = null) {
			
			$this->contacttypeid = $new_contacttypeid;
			$this->firstname = $new_firstname;
			$this->lastname = $new_lastname;
			$this->phone = $new_phone;
			$this->email = $new_email;
			$this->address = $new_address;
			$this->city = $new_city;
			$this->state = $new_state;
			$this->postalcode = $new_postalcode;
			$this->age = $new_age;
			$this->gender = $new_gender;
		}

		public function getPropertyArray() {
			$array = array();
			foreach($this as $key => $value) {
				$array[$key] = $value;
			}
			return $array;
		}

		public function getContactId() 		{ return $this->userid; 	}
		public function getContactTypeId() 	{ return $this->imageid; 	}
		public function getFirstName()		{ return $this->firstname; 	}
		public function getLastName() 		{ return $this->lastname; 	}
		public function getPhone() 			{ return $this->phone; 		}
		public function getEmail() 			{ return $this->email; 		}
		public function getAddress() 		{ return $this->address; 	}
		public function getCity()			{ return $this->city;		}
		public function getState()			{ return $this->state;		}
		public function getPostalCode()		{ return $this->postalcode;	}
		public function getAge()			{ return $this->age;		}
		public function getGender() 		{ return $this->gender;		}

		public function setContactId($new_contactid) 		{ $this->userid = $new_userid;			}
		public function setContactTypeId($new_contacttypeid){ $this->imageid = $new_imageid;		}
		public function setFirstName($new_firstname)		{ $this->firstname = $new_firstname;	}
		public function setLastName($new_lastname) 			{ $this->lastname = $new_lastname;		}
		public function setPhone($new_phone) 				{ $this->phone = $new_phone;			}
		public function setEmail($new_email) 				{ $this->email = $new_email;			}
		public function setAddress($new_address) 			{ $this->address = $new_address;		}
		public function setCity($new_city)					{ $this->city = $new_city;				}
		public function setState($new_state)				{ $this->state = $new_state;			}
		public function setPostalCode($new_postalcode)		{ $this->postalcode = $new_postalcode;	}
		public function setAge($new_age)					{ $this->age = $new_age;				}
		public function setGender($new_gender) 				{ $this->gender = $new_gender;			}
	}

	class ContactOperations {
		static function DeleteContact($contactid) {
			if($contactid === null) {
				return new QueryResult(false, "'contactid' cannot be null.", null);
			} else {
				$query = "DELETE FROM contact WHERE ContactId = '$contactid';";
				return query_result($query);
			}
		}

		static function CreateContact($userid, $contact) {
			if(gettype($contact) != gettype(new Contact())) {
				return new QueryResult(false, "Object must be of a type: Contact", null);
			} else {
				$query = "INSERT INTO contact (";
				$properties = $contact->getPropertyArray();
				foreach($properties as $key => $value) {
					if($value != null) {
						$query .= $key . ", ";
					}
				}
				$query = substr($query, 0, -2);
				$query .= ") VALUES (";
				foreach($properties as $key => $value) {
					if($value != null) {
						$query .= "'" . $value . "', ";
					}
				}
				$query = substr($query, 0, -2);

				$query .= ");";

				$result = query_result($query);
				if($result->isSuccess) {

					// Create Contact Model
					//$new_contact = Contact::ArrayToModel();

					return $result;
				} else {
					return $result;
				}
			}
		}

		static function GetContact($contactid) {

		}

		static function GetContacts($filters) {

		}

		static function GetContactsForUser($userid, $filters) {

		}

		static function UpdateContact($contactid, $contact) {

		}
	}

    $class = new Contact(1, "Jerry", "Devel", "(382) 382-5872", "things.stuff@gmail.com");
    $items = ContactOperations::CreateContact(0, $class);
	// $proparray = $class->getPropertyArray();
	echo "<br>";
	var_dump($items);
?>