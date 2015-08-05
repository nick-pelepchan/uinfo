/* UNIVERSAL CLASSES */
	.alert {
		background:url(/media/exclaim.png) <?=_COMP_LTR_?> top left / contain no-repeat;
		border-radius:4px;
		box-shadow: inset 3px 3px 10px -3px <?=_BLACK2_?>;
		color:<?=_RED_?>;
		font-size:1.5em;
		margin:.5em;
		padding:.5em .5em .5em 4em;
		text-align:center;
	}
	
	.block {
		display:block !important;
	}
	
	.center {
		margin:0 auto;
	}
	
	.clearb {
		clear:both;
	}
	
	.clearl {
		clear:left;
	}
	
	.clearr {
		clear:right;
	}

	.clearfix:after {
			clear: both;
			content: " ";
			display: block;
			height: 0;
			overflow: hidden;
			visibility: hidden;
	}

	.debug {
		display:none;
	}

	.fleft {
		float:left;
	}

	.fright {
		float:right;
	}

	.geshi-box {
		border:5px solid <?=_BLACK_?>;
		font-family:'Lucida Console','Bitstream Vera Sans Mono','Courier New',Monaco,Courier,monospace;
		font-size:.9em;
		font-variant:normal;
		overflow:auto;
		text-align:left;
		text-shadow:none;
		text-transform:none;
		word-wrap: break-word;
	}
	
	.inline {
		display:inline !important;
	}
	
	.math {
		display:inline-block;
		font-family:'Courier New', monospace;
		font-variant:normal;
		font-size:1em;
		font-weight:bold;
		margin:0 auto;
		vertical-align:middle;
	}

	.math .fraction {
		display:inline-block;
		margin:0;
		padding:.2em;
		vertical-align:middle;
	}

	.math .fraction .den {
		display:block;
		width:100%;
		float:left;
		clear:left;
		text-align:center;
	}

	.math .fraction .num {
		display:block;
		width:100%;
		float:left;
		clear:right;
		border-bottom:1px solid <?=_BLACK_?>;
		text-align:center;
	}

	.sub-text {
		font-size:.7em;
	}
	
	.tc {
		text-align:center
	}

	.tj {
		text-align:justify;
	}

	.tl {
		text-align:left;
	}

	.tr {
		text-align:right;
	}
	
	.v-center {
		position:absolute;
		left:0;
		top:40%;
		vertical-align:middle;
		width:100%;
	}
	
	.w50 {
		max-width:50%;
	}
	
	.soft-box {
		float:left;
		margin:.5vh 1%;
		width:calc(46% - 6px);
	}
	
	.hard-box {
		float:right;
		margin:.5vh 1%;
		width:calc(46% - 6px);
	}