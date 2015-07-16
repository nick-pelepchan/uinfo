/* COMP-BOX */
	.comp-box {
		background:<?=_SEC2_?>;
/* 		border-radius:4px;
 */		box-shadow: inset -3px 3px 10px -3px <?=_BLACK2_?>;
/* 		border:3px solid <?=_GRAY_?>;
 */		color:<?=_GRAY_?>;
		padding:.5vh 1%;
	}

	.comp-box ::-moz-selection {
		background:<?=_SEC2_LT_?>;
		color:<?=_GRAY_?>;
		text-shadow:none;
	}

	.comp-box ::selection {
		background:<?=_SEC2_LT_?>;
		color:<?=_GRAY_?>;
		text-shadow:none;
	}

	.comp-box a:link,.comp-box a:visited,.comp-box a:active {
		color:<?=_PRIM_DKR_?>;
	}

	.comp-box a:hover {
		color:<?=_PRIM_?>;
	}

	.comp-box h1,.comp-box h2,.comp-box h3,.comp-box h4,.comp-box h5 {
		color:<?=_COMP_DKR_?>;
		text-shadow:0px 2px 1px <?=_SEC2_LT6_?>;
	}

	.comp-box hr {
		background:<?=_PRIM_?>;
		border-radius:5px;
		border-bottom:.3em double <?=_PRIM_DKR8_?>;
		border-left:.1em solid <?=_PRIM_DKR8_?>;
		border-right:.1em solid <?=_PRIM_DKR8_?>;
		color:<?=_PRIM_DKR_?>;
	}

	.comp-box hr:after {
		background:<?=_SEC2_?>;
	}