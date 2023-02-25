<?php

// Create a cat validator class to handle validation
class CatValidator
{
  // Member variables
  private $data;
  private $errors = [];
  private static $fields = ['name', 'info'];

  // Constructor which takes in POST data from the form
  public function __construct($post_data)
  {
    $this->data = $post_data;
  }

  public function validateForm()
  {
    // Check 'required fields'-presence in the data
    foreach (self::$fields as $field) {

      if (!array_key_exists($field, $this->data)) {
        trigger_error("$field is not present in data");
        return;
      }
    }

    $this->validateName();
    $this->validateBreed();
    $this->validateInfo();
    $this->validatePicture();

    return $this->errors;
  }

  // Create methods to validate individual fields
  // Create a method to validate an name
  private function validateName()
  {
    // Trim out any white space
    $val = trim($this->data['name']);

    // Is the value empty
    if (empty($val)) {
      $this->addError('name', 'namn fältet får ej vara tomt');
    }
  }

  // Create a method to validate the breed
  private function validateBreed()
  {
    $option = isset($_POST['breed']) ? $_POST['breed'] : false;
    if (!$option) {
      $this->addError('breed', 'ras måste ha ett värde.');
    }
  }

  private function validateInfo()
  {
    // Trim out any white space
    $val = trim($this->data['info']);

    // Is the value empty
    if (empty($val)) {
      $this->addError('info', 'info fältet får ej vara tomt.');
    }
  }

  private function validatePicture()
  {
    $option = isset($_POST['picture']) ? $_POST['picture'] : false;
    if (!$option) {
      $this->addError('picture', 'bild fältet måste ha ett värde.');
    }
  }

  // Return an error array once all checks are done
  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
