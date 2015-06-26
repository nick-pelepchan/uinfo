#Unassailable.info
The entirety of this site is designed with HTML, PHP and CSS.

NOTE: Still working out quite a few bugs with the underlying functions.  The site is not live yet.

##Page Design
Because the pages are built automatically using the page_set() function and the $GLOBALS['site_dir'] array, the design can easily be adapted to suit anyone's needs.  The [admin](https://github.com/unassailable/uinfo/tree/master/admin) folder contains the main [style.php](https://github.com/unassailable/uinfo/blob/master/admin/style.php) and css templates.

![site design](https://raw.githubusercontent.com/unassailable/uinfo/master/media/design.png)

The current design is based on a [full screen (100% x 100vh)](https://github.com/unassailable/uinfo/blob/master/admin/layout.css), three-tile repeating pattern.  These tiles auto populate based on $GLOBALS['curr'], which is the array of the page the user is currently viewing (set by the [page_set() function](https://github.com/unassailable/uinfo/blob/master/admin/functions.php)).

Each set of nine tiles are grouped into a "tileset" div class.  If the array does not contain a full number of elements, divisible by nine, the remaining tiles are populated as blank tiles.

The tilesets stack from top to bottom, giving the user an easy and visually based method of scrolling.

![tileset](https://raw.githubusercontent.com/unassailable/uinfo/master/media/tileset.png)

##Theming Support
The site's theme is controlled through the [style.php](https://github.com/unassailable/uinfo/blob/master/admin/style.php) file.  From within this file color schemes, fonts and styles are linked to index.php.

###Color pallets
The [colors.php](https://github.com/unassailable/uinfo/blob/master/admin/colors.php) file contains the primary pallet information for the entire site.  The colors are established using rgb values put into various arrays.
```
$base = array(
	array(
		// Primary color:
		'prim_ltr' => '235,240,242',
		'prim_lt' => '203,222,231',
		'prim' => '155,193,210',
		'prim_dk' => '108,162,185',
		'prim_dkr' => '70,134,162',
	),
```
These arrays are then piped into a function which writes a series of sub arrays to $GLOBALS['pallet'].  Each sub array contains a color group (primary_light, complementary_darker, red, blue...) and all groups have the rgba values .1-1 populated.
```
["pallet"]=>
	array(29) {
		["prim_ltr"]=>
		array(10) {
			["prim_ltr"]=>
			string(19) "rgba(235,240,242,1)"
			["prim_ltr1"]=>
			string(20) "rgba(235,240,242,.1)"
			["prim_ltr2"]=>
			string(20) "rgba(235,240,242,.2)"
			["prim_ltr3"]=>
			string(20) "rgba(235,240,242,.3)"
			["prim_ltr4"]=>
			string(20) "rgba(235,240,242,.4)"
			["prim_ltr5"]=>
			string(20) "rgba(235,240,242,.5)"
			["prim_ltr6"]=>
			string(20) "rgba(235,240,242,.6)"
			["prim_ltr7"]=>
			string(20) "rgba(235,240,242,.7)"
			["prim_ltr8"]=>
			string(20) "rgba(235,240,242,.8)"
			["prim_ltr9"]=>
			string(20) "rgba(235,240,242,.9)"
		}
```
To use a color, simply use the php shorthand tag for the desired color. 
```
<?=$prim_ltr7?>
```
or using full global variables
```
<?=$GLOBALS['pallet']['prim_ltr']['prim_ltr7']?>
```

##Functional Design
###Site Directory Array
The site's functions begin by designating a main web root directory (`__DIR__`), which is stored in $GLOBALS['webr'].  Inside this directory a 'dir.ini' file *must* be located.  The 'ini_grab()' function builds the $GLOBALS['site_dir'] array by searching for this file and parsing its contents.  If an entry has a subdir value, then the function will enter the subdir and parse the dir.ini file within it.  This is controlled by the ini file 'sub' entries and will recurse as long as these entries have values.

####dir.ini
```
[unique_id]
name = 'display name'
title = 'link title'
href = 'link'
back = 'tile background image'
sub = 'subdir'

[unique_id]
name = 'another name'
title = 'another title'
href = 'another link" target="_blank'
back = 'another background image'
sub = ''

...
```

Note: Values from the ini files are parsed *verbatim*.  By default the HTML tags utilize double quotes (").  This allows the values to be customized on a case by case basis easily.

The value `href = 'another link" target="_blank'` is rendered as `<a href="another link" target="_blank"...`.  Effectively escaping the href attribute and assigning a target attribute while maintaining full function.

####$GLOBALS['site_dir']
```
[unique_id]=>
	array(8) {
		['name']=>
		string() 'display name'
		['title']=>
		string() 'link title'
		['href']=>
		string() 'link'
		['back']=>
		string() 'tile background image'
		['sub']=>
		string() 'subdir'
		['incpth']=>
		string() '/current/full/directory/path/'
		['imgpth']=>
		string() '/'
		['child']=>
			array(8) {
				...
			},
		['name']=>
		string() 'another name'
		['title']=>
		string() 'another title'
		['href']=>
		string() 'another link" target="_blank'
		['back']=>
		string() 'another background image'
		['sub']=>
		string() 'subdir'
		['incpth']=>
		string() '/current/full/directory/path/'
		['imgpth']=>
		string() '/'
		['child']=> ''
    }
```

##Page Set Function
TBD

##Image Gallery
TBD