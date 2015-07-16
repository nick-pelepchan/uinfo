/* PRIMARY LAYOUT
	|-html
		|-body	(@z-1)
			|-cont (abs@z-2)
				|-topbar (relative@z-4)
				|-tileset (relative@z-3)
					|1|2 2|3|4|
					|1|5|6|3|7|
					|8|5|9 9|7|
				...
	*/

<?php	
// ROWS & COLUMNS
	$lr1='.8vh';
	$lr2='31.6vh';
	$lr3='62.4vh';
	$lc1='.8%';
	$lc2='20.6%';
	$lc3='40.4%';
	$lc4='60.2%';
	$lc5='80%';
?>
	
	body {
		height:100vh;
		overflow-y:auto;
		overflow-x:hidden;
		width:100vw;
		z-index:1;
	}

	#cont {
		left:5vw;
		margin:0 auto;
		min-height:100vh;
		position:absolute;
		right:5vw;
		top:0;
		z-index:2;
	}
	
	#topbar {
		height:6vh;
		left:0;
		position:fixed;
		top:0;
		width:100%;
		z-index:4;
	}
	
	#back {
		position:absolute;
		right:0;
		top:0;
	}
	
	#main {
		margin-top:6vh;
		padding:1vh 1vw;
		z-index:3;
	}

	.tileset {
		height:92vh;
		position:relative;
		width:100%;
		z-index:3;
	}
	
	.tile, .rtile, .btile {
		float:left;
		margin:0 .8% .8vh 0;
		position:relative;
	}
	
	.one {
		clear:left;
		height:60.8vh;
		margin-left:.8%;
		width:19%;
	}
	
	.two {
		height:30vh;
		width:38.8%;
	}
	
	.three {
		height:60.8vh;
		width:19%;
	}
	
	.four {
		height:30vh;
		width:19%;
	}
	
	.five {
		height:60.8vh;
		margin-left:-79.2%;
		margin-top:30.8vh;
		width:19%;
	}
	
	.six {
		height:30vh;
		margin-left:-59.4%;
		margin-top:30.8vh;
		width:19%;
	}
	
	.seven {
		height:60.8vh;
		width:19%;
	}
	
	.eight {
		height:30vh;
		margin-top:-30.8vh;
		margin-left:.8%;
		width:19%;
	}
	
	.nine {
		height:30vh;
		margin-left:40.4%;
		margin-top:-30.8vh;
		width:38.8%;
	}
	
	.tiny-tile, .tiny-btile {
		float:left;
		margin:0 .6% .6vh 0;
		position:relative;
	}
	
	.tiny-one {
		clear:left;
		height:45.6vh;
		margin-left:.6%;
		width:13.6%;
	}
	
	.tiny-two {
		height:22.5vh;
		width:13.6%;
	}
	
	.tiny-three {
		height:22.5vh;
		width:27.8%;
	}
	
	.tiny-four {
		height:45.6vh;
		width:13.6%;
	}
	
	.tiny-five {
		height:22.5vh;
		width:27.8%;
	}
	
	.tiny-six {
		height:22.5vh;
		margin-left:-85.2%;
		margin-top:23.1vh;
		width:27.8%;
	}
	
	.tiny-seven {
		height:22.5vh;
		margin-left:-56.8%;
		margin-top:23.1vh;
		width:13.6%;
	}
	
	.tiny-eight {
		height:45.6vh;
		width:13.6%;
	}
	
	.tiny-nine {
		height:22.5vh;
		width:13.6%;
	}
	
	.tiny-ten {
		height:22.5vh;
		margin-left:.6%;
		margin-top:-23.1vh;
		width:27.8%;
	}
	
	.tiny-eleven {
		height:22.5vh;
		margin-left:29%;
		margin-top:-23.1vh;
		width:13.6%;
	}
	
	.tiny-twelve {
		height:45.6vh;
		margin-left:43.2%;
		margin-top:-23.1vh;
		width:13.6%;
	}
	
	.tiny-thirteen {
		height:22.5vh;
		margin-top:-23.1vh;
		width:13.6%;
	}
	
	.tiny-fourteen {
		height:45.6vh;
		margin-left:28.4%;
		margin-top:-23.1vh;
		width:13.6%;
	}
	
	.tiny-fifteen {
		height:22.5vh;
		margin-left:.6%;
		margin-top:-23.1vh;
		width:13.6%;
	}
	
	.tiny-sixteen {
		height:22.5vh;
		margin-left:14.8%;
		margin-top:-23.1vh;
		width:27.8%;
	}
	
	.tiny-seventeen {
		height:22.5vh;
		margin-left:57.4%;
		margin-top:-23.1vh;
		width:27.8%;
	}
	
	.down {
		height:60vh;
		left:12.5%;
		position:absolute;
		top:<?=$lr1?>;
		width:75%;
	}
	
	.down-text {
		height:30vh;
		left:12.5%;
		font-size:2rem;
		font-family:'Special Elite';
		line-height:2.2rem;
		position:absolute;
		text-align:center;
		top:61.6vh;
		width:75%;
	}
	
	#debug {
		position:relative;
	}

/* END PRIMARY LAYOUT */
