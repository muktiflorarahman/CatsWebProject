<?php
/* För att ta emot formuläret från addCat.php */
class CatValidator
{
    /* medlemsvariabler*/
    private $data;
    private $errors = [];
    private static $fields = ["name", "info", "picture"];

    /* konstruktor */

    public function __construct($postData)
    {
        $this->data = $postData;
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

    private function validateName()
    {
        /* vi trimmar bort mellanslag */
        $val = trim($this->data["name"]);

        /* kollar om fältet är tomt */
        if (empty($val)) {
            $this->addError("name", "Namn fältet får ej vara tomt!");
        }
    }

    private function validateBreed()
    {
        $option = isset($_POST["breed"]) ? $_POST["breed"] : false;
        if (!$option) {
            $this->addError("breed", "Välj en ras.");
        }
    }

    private function validateInfo()
    {
        /* vi trimmar bort mellanslag */
        $val = trim($this->data["info"]);

        /* kollar om fältet är tomt */
        if (empty($val)) {
            $this->addError("info", "Informationsfältet får ej vara tomt!");
        }
    }

    private function validatePicture()
    {
        /* vi trimmar bort mellanslag */
        $val = trim($this->data["picture"]);

        /* kollar om fältet är tomt */
        if (empty($val)) {
            $this->addError("picture", "Bildfältet får ej vara tomt!");
        }
    }

    private function addError($key, $message)
    {
        $this->errors[$key] = $message;
    }
}
