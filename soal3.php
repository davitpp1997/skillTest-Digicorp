<?php 

/**
 * 
 */
class LaluLintas
{
	public $lampu = array();
	public $counter = 0;

	function __construct($lampu)
	{
		$this->lampu = $lampu;
	}

	function nyalaLampu(){
		if($this->counter == 3){
			$this->counter = 0;
		}
		return $this->lampu[$this->counter++];
	}
}

$lampu = array('merah', 'kuning', 'hijau');

$laluLintas = new LaluLintas($lampu);

echo "------------------Dipanggil 1x------------------<br>";
echo $laluLintas->nyalaLampu()."<br>";

echo "<br>------------------Saat dipanggil lebih dari 1x------------------<br>";
echo $laluLintas->nyalaLampu()."<br>";
echo $laluLintas->nyalaLampu()."<br>";
echo $laluLintas->nyalaLampu()."<br>";
echo $laluLintas->nyalaLampu()."<br>";
echo $laluLintas->nyalaLampu();

?>