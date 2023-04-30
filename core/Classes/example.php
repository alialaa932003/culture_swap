<?php

namespace core\Classes;

echo "Put your class here";


// Notes

//! Multiple Constructors:
//----------------------

// class MyClass
// {
//   private $value1;
//   private $value2;
//   private $value3;

//   public function __construct() --> empty constructor
//   {

//   }
//   public function __construct1($val1, $val2) --> Your first constructor
//   {
//     $this->value1 = $val1;
//     $this->value2 = $val2;
//   }
//   public function __construct2($val1, $val2, $val3) --> Your second constructor
//   {
//     $this->value1 = $val1;
//     $this->value2 = $val2;
//     $this->value3 = $val3;
//   }
// }

// $obj = new MyClass(); --> This is the empty constructor
// $obj->__construct1("value1", "value2");
// $obj->__construct2("value1", "value2", "value3");

//-----------------------------------------------------

//! Example for creating add , delete , setters methods

// class post {
//   private $id;
//   private $name;
//   private $age;

//   public construct(){

//   }
//   public function add($data) { //! --> Data here will be sent as associative array
//     $id = postDB::add($data);
//     extract($data);
//     $this->id = $id;
//     $this->name = $name;
//     $this->age = $age;
//   }

//   public static function delete($id) {
//     postDB::delete($id);
//   }
//   public static function setTitle($title) { //! --> Your setters will be like this , the same idea
//     postDB::updata($this->id, 'title', $title);
//     $this->title = $title;
//   }

// }

// //! when you create the object
// $myPost = newPost();
// $myPost->add([
//     'name' => 'shehab',
//     'age' => '20'
//   ]);