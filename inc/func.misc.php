<?php

/////////////////////////////////////////////////////////////////
// OTHER
//

// html source tab modification
function tb($m){
	switch($m){
		case '+':
			$GLOBALS['tb']++;
			break;
		case '-':
			$GLOBALS['tb']--;
			break;
		case '.':
			$str='';
			for($i=0;$i<$GLOBALS['tb'];$i++){
				$str = $str."\t";
			};
			return $str;
			break;
	};
};

// alert div
function alert($str){
	echo "\n\n".'<div class="alert">'.$str.'</div>';
}

// prints all the colors on the page
function color_pallet($pallet) {
	echo '<div>';
		foreach($GLOBALS[$pallet] as $k => $v){
			foreach($v as $l => $w){
				echo '<a role="button" title="'.$l.' ('.$w.')" style="background:rgb('.$w.');display:inline-block;margin:1px;height:20px;width:20px;"></a>';
			};
		};
	echo '</div>';
	
	return;
};

function num2word($number) { //http://www.karlrixon.co.uk/writing/convert-numbers-to-words-with-php/
   
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
   
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
   
    $string = $fraction = null;
   
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
   
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
   
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
   
    return $string;
}

function js_link($src){
	if(file_exists($src)){
		echo "\n"."<script type=\"text/javascript\" src=\"$src\"></script>";
	} else {
		echo "\n"."Unable to load ".$src;
	};
};

function oside($cmd,$c){
  include('./admin/vars.php');
	if($os==1){
		echo "<!-- ";
		eval($cmd.";");
		echo " -->";
	} else {
		switch($c) {
			case 1:
				eval($cmd.";");
			case 2:
		}
	}
};

function download($file){
  $bn = basename($file);
  echo '<span class="absr"><form method="get" action="'.$file.'"><button type="submit">Download '.$bn.'</button></form></span>';
};

function grab_files($fp,$str){
  $dir=opendir("$fp");
  $i=0;
  
  while($file=readdir($dir)){
    $hstk = mime_Content_type($fp.'/'.$file);
    $pos = strpos("$hstk","$str");
    $desc = strpos("$file",'desc');
    if(!($pos === false) && ($desc === false)){
      $arr[$i++]="$file";
    };
  };
  sort($arr);
  return($arr);
};

function debug_arr($arr){
		echo "<!--";
		print_r($arr);
		echo "-->";
}
//
//
/////////////////////////////////////////////////////////////////

?>