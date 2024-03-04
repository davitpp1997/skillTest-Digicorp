<?php 

class Token
{
	
	public $dataUser = array();

	function generate($user)
	{
		$bytes = random_bytes(2);
		$token = bin2hex($bytes);


		$indexUser =  array_search($user, array_column($this->dataUser, 'name') );

		if ( $indexUser == '' ) {
			$data  = array(
				'name' => $user,
				'token' => array($token)
			);

			array_push($this->dataUser, $data);

		}else{
			// echo "user sudah ada ".$indexUser." <br>";
			$token = bin2hex($bytes);
			array_push($this->dataUser[$indexUser]['token'], $token);

			$jumlahToken = count($this->dataUser[$indexUser]['token']);
			
			if( $jumlahToken > 10 ){
				array_shift($this->dataUser[$indexUser]['token']);
			}

		}
	}

	function verify_token($user, $token)
	{
		$status = 'true';
		$indexUser =  array_search($user, array_column($this->dataUser, 'name') );

		if ( $indexUser == '' ){
			$status = 'false';
		}
		else{
			// $tokenUser = $this->dataUser[$indexUser]['token'];
			$indexToken = array_search($token, $this->dataUser[$indexUser]['token'] );

			if ( $indexToken == '' ){
				$status = 'false';
			}else{
				$status = 'true';
				unset($this->dataUser[$indexUser]['token'][$indexToken]);
				// array_values($this->dataUser[$indexUser]) 
			}
		}

		return $status;
	}

	function getRandomTokenFromUser($user){
		$indexUser =  array_search($user, array_column($this->dataUser, 'name') );
		
		$token = $this->dataUser[$indexUser]['token'];
		$random_token=array_rand($token,2);

		return $token[$random_token[0]];
	}

	public function cari($user)
	{
		$indexUser =  array_search($user, array_column($this->dataUser, 'name') );
		print_r($this->dataUser[$indexUser]);
	}

	function cetak()
	{
		print_r($this->dataUser);
	}
}

$soalSatu = new Token();

echo "------------------2 user berbeda------------------<br>";
$soalSatu->generate('davit');
$soalSatu->generate('pratama');
$soalSatu->cetak();
echo "<br>";

echo "<br>------------------generate user yang sama mencapai 10 kali------------------<br>";
$soalSatu->generate('davit');
$soalSatu->generate('davit');
$soalSatu->generate('davit');
$soalSatu->generate('davit');
$soalSatu->generate('davit');
$soalSatu->generate('davit');
$soalSatu->generate('davit');
$soalSatu->generate('davit');
$soalSatu->generate('davit');
$soalSatu->cari('davit');
echo "<br>";

echo "<br>------------------saat user yang sama generate lebih dari 10 kali------------------<br>";
$soalSatu->generate('davit');
$soalSatu->cari('davit');

echo "<br><br>------------------verify token salah------------------<br>";
$verify = $soalSatu->verify_token('davit','hah1');
echo $verify;

echo "<br><br>------------------verify token benar------------------<br>";
$token = $soalSatu->getRandomTokenFromUser('davit');
$verify = $soalSatu->verify_token('davit',$token);
echo $verify;
echo "<br>";
$soalSatu->cari('davit');

?>