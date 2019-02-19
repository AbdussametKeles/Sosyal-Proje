<?php 

include_once "../Config/database.php";

class GetUserDetailResponseModel {


	public $ad;
	public $soyad;
	public $sehirID;
	public $tel;
	public $mail;
	public $sifre;
	public $derece;
	public $yetkiID;
	public $dogumTarihi;
	public $hobiler;
	public $amaclar;
	public $puanOrtalamasi;
	public $biyografi;


}
class GetUserDetailRequestModel{

	public $token;
	public $userID;
}

?>