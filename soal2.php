<?php
	/**
	 * 
	 */
	class siswa
	{
		public $nrp = '';
		public $nama = '';
		public $daftarNilai = array("kosong","kosong","kosong");

		function siswaWithValue($nrp,$nama,$mapel,$nilai)
		{
			$this->nrp = $nrp;
			$this->nama = $nama;

			$dataNilai = new Nilai($mapel,$nilai);

			for ($i=0; $i < 3; $i++) { 
				if($this->daftarNilai[$i] == "kosong"){
					$this->daftarNilai[$i] = $dataNilai;
					break;
				}
			}
		}

		function siswaRandom(){
			$bytes = random_bytes(5);
			$nama = bin2hex($bytes);

			$this->nrp = 'S00'.rand();
			$this->nama = $nama;
			$listMapel = array('Inggris', 'Indonesia', 'Jepang');

			for ($i=0; $i < 3; $i++) { 
				if($this->daftarNilai[$i] == "kosong"){
					$kMapel = rand(0,2);
					$mapel = $listMapel[$kMapel];
					$nilai = rand(0,100);
					$dataNilai = new Nilai($mapel,$nilai);
					$this->daftarNilai[$i] = $dataNilai;
					break;
				}
			}
		}

		function cetak(){
			echo "NRP : ".$this->nrp."<br>";
			echo "Nama : ".$this->nama."<br>";
			echo "Daftar Nilai<br>";

			$no = 1;
			foreach ($this->daftarNilai as $key => $value) {
				echo ($no++).". ";
				if($value == "kosong"){
					echo $value;
				}else{
					echo $value->getMapel()." => ".$value->getNilai();
				}
				echo "<br>";
			}

			// for ($i=0; $i < 3; $i++) { 
			// 	echo ($i+1).". ";
			// 	if()
				
			// }
		}
		
	}

	/**
	 * 
	 */
	class Nilai
	{
		public $mapel = '';
		public $nilai = 0;

		function __construct($mapel, $nilai)
		{
			$this->mapel = $mapel;
			$this->nilai = $nilai;
		}

		function getMapel(){
			return $this->mapel;
		}

		function getNilai(){
			return $this->nilai;
		}
	}

	echo "------------------Siswa Baru------------------<br>";
	$siswa1 = new Siswa();
	$siswa1->siswaWithValue('S00123', 'Davit', 'Inggris', 100);
	$siswa1->cetak();

	echo "<br><br>------------------10 Siswa Random------------------<br>";
	$dataSiswa = array();
	for ($i=0; $i < 10; $i++) { 
		$siswaAcak = new Siswa();
		$siswaAcak->siswaRandom();
		array_push($dataSiswa, $siswaAcak);
	}
	
	foreach ($dataSiswa as $key => $value) {
		$value->cetak();
		echo "<br>";
	}
?>