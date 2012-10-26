<?php
class GPIO {

   private $_path;
   private $_dir;
   private $_export;
   private $_unexport;
   private $_value;
   private $_direction;
   private $_pin;
   private $_mappedPins;

   public function __construct($path = "/sys/class/gpio/", $mPins = false)
   {
   $this->_path = $path;

      if (!is_array($mPins))
   $this->_mappedPins = array("1" => "0",
               "2" => "7",
               "3" => "8",
               "4" => "18",
               "5" => "1",
               "6" => "17",
               "7" => "14",
               "8" => "15",
               "9" => "22",
               "10" => "23",
               "11" => "24",
               "12" => "10",
               "13" => "25",
               "14" => "9",
               "15" => "11",
               "16" => "4");
   else
      $this->_mappedPins = $mPins;
               
   }

   public function Pins()
   {
      return $this->_mappedPins;
   }

   public function Active($pin)
   {
   $pin = $this->_mappedPins[$pin];
   
   $this->_dir = $this->_path . "gpio" . $pin; 
        $this->_value = $this->_dir . "/value";
   $this->_export = $this->_path . "export";
   $this->_direction = $this->_dir . "/direction";
        $this->_value = $this->_dir . "/value";
        $this->_pin = $pin;
   }

   public function Value($pin, $value = 0)
   {

   $value = $this->FixValue($value);

   $this->Active($pin);

   if (!is_dir($this->_dir))
      $this->Export();

   $this->Write($this->_value, $value);
   }
 
   public function Export($direction = "out")
   {
   if (!is_dir($this->_dir))
     $this->Write($this->_export, $this->_pin);

   $this->Write($this->_direction, $direction);
   }

   public function Unexport($pin)
   {
   $this->Active($pin);

   $this->_unexport = $this->_path . "unexport";
   $this->Write($this->_unexport, $this->_pin);
   }

   public function Status($pin)
   {
   $this->Active($pin);
   return $this->FixValue($this->Read($this->_value));
   
   }

   public function StatusAll()
   {
      $json_data = array();

      foreach($this->Pins() as $pin => $value)
   $json_data[$pin] = $this->Status($pin);

      return json_encode($json_data);
   }

   public function Read($path)
   {
      $cmd = ("/usr/bin/sudo /bin/sh -c 'cat $path'");
      return shell_exec($cmd);
   }

   public function Write($path, $value)
   {
      $cmd = ("/usr/bin/sudo /bin/sh -c 'echo \"$value\" > $path'\n");
      echo $value;
      shell_exec($cmd);
   }

   public function On() 
   {
      foreach ($this->_mappedPins as $pin => $value)
       $this->Value($pin, 1);
   }

   public function Off() 
   {
      foreach ($this->_mappedPins as $pin => $value)
       $this->Value($pin, 0);
   }

   public function Test($delay = 1)
   {
      foreach ($this->_mappedPins as $pin => $value)
      {
       $this->Value($pin, 1);
         sleep($delay);
       $this->Value($pin, 0);
      }

   }

   //GPIO pins are backwards 1 is off 0 is on so I swapped them.

   public function FixValue($value)
   {
   if ($value == 1)
     $value = 0;
        else
     $value = 1;

      return $value;
   } 
}

?>
