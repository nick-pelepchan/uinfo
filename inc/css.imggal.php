/* IMAGE GALLERY */
	.zoom span {
		background:none !important;
		border:none !important;
		margin:0 !important;
		padding:0 !important;
	}
	
	.zoom img {
		display:none;
		position:relative;
		z-index:3;
	}
	
	.izoom {
		display:inline-block;
		margin:.5vh auto;
	}
	
	.izoom img {
		max-height:50vh;
		max-width:40vw;
	}
	
	.four-gal {
		display:block;
		float:left;
		margin:2.5%;
		max-height:20%;
		max-width:20%;
	}

	.zoom:focus img, .izoom:focus img { /*http://www.w3.org/Style/Examples/007/center.en.html*/
		background:<?=_BLACK9_?>;
		display:inline;
		left:50%;
		margin-right:-50%;
		max-height:85vh;
		max-width:95vw;
		padding:50vh 50vw;
		position:fixed;
		top:50%;
		transform:translate(-50%,-50%);
		z-index:50;
	}