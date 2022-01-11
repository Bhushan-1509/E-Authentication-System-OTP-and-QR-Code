<?php
include_once "phpqrcode/qrlib.php";



class qrGenerate{
  // public $text = "";
   public $path = "qr-images/";
   public $file;
    // QRcode::png($text);
    public $ecc = 'L';
    public $pixel_Size = 10;
    public $frame_Size = 10;
  public function __construct()
  {
      $this->file= $this->path . uniqid() . ".png";
  }
// Generates QR Code and Stores it in directory given
   public function generateQR($text){

    QRcode::png($text, $this->file, $this->ecc, $this->pixel_Size, $this->frame_Size);
    return $this->file;
   }

   public function generateCheckSum(){
       $hash=md5_file($this->file);
       return $hash;
   }
   public function deleteFile(){
     unlink($this->file);
   }
  
// Displaying the stored QR code from directory
   // echo "<center><img src='".$file."'></center>";

}

?>