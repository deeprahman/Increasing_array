<?php
/**
 * Given an array, create an array form that arrray where
 * b[0] = the first item of array a;
 * b[1] = the last item of array a;
 * b[2] = the second item of array a;
 * b[3] = the second last item of array a
 *
 * and so on
 *
 * return true it b is a strictly increasing array
 */


class Main
{

	public static function driver(){
	
		$arr = [1,3,4,2];

		printf(PHP_EOL);
		print_r(solution($arr));
		printf(PHP_EOL);
	}
}


//===========================================================

function solution(array $a):bool
{
	$r = new Rearrange($a);
	return $r->creator();
}


class Rearrange
{
	public $a;
	public $b;

	public function __construct(array $a)
	{
		$this->a = $a;

		$this->b = [];

	}

	public function creator()
	{
		$size = sizeof($this->a);
		$l=0;
		$r = $size-1;
		while(true){


			if($l>$r){
				break;
			}
			// left pointer block
			{
				if($this->arrayBuilder($l)){
					$l++;
				}else{
				
					return false;
				}
		}
			
			if($l > $r){
				break;
			}

			// right pointer block
			{
				if($this->arrayBuilder($r)){
					$r--;
				}else{
					return false;
				}
		}
		}
		print_r($this->b);
		return true;
	}

	public function arrayBuilder(int $ptr)
	{
		static $k = 0;
		if(!isset($this->b[$k-1])){
			$this->b[$k] = $this->a[$ptr];
			$k++;
			return true;	
		}
		if($this->b[$k-1] < $this->a[$ptr]){
			$this->b[$k] = $this->a[$ptr];
			$k++;
			return true;
		}else{
			return false;
		}
		
	}
}


//=================================================
Main::driver();
