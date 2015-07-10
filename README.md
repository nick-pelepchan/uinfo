#Unassailable.info
The entirety of this site is designed with HTML, PHP and CSS.

##To-do
- ~~Major~~ Minor underlying function optimization
- Update academic pages (general template with sub content) to new format
- Update information aggregation (data scraping and manipulation template) pages to new format
- Update Jeep KL (technical documentation template) pages to new format

##Page Design
Because the pages are built automatically using the page_set() function and the $_SESSION['site_dir'] array, the design can easily be adapted to suit anyone's needs.  The [inc](https://github.com/unassailable/uinfo/tree/master/inc) folder contains the main [css.style.php](https://github.com/unassailable/uinfo/blob/master/inc/css.style.php) and other various css templates.

![site design](https://raw.githubusercontent.com/unassailable/uinfo/master/media/design.png)

The current design is based on a [full screen (100% x 100vh)](https://github.com/unassailable/uinfo/blob/master/inc/css.layout.css), three-tile repeating pattern.  These tiles auto populate based on $GLOBALS['curr'], which is the array of links established by the current page (set by the [page_set() function](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L63)).

Every tile is grouped into a overarching "tileset" div class.  If the page's link array does not contain a full number of elements, divisible by nine, the remaining tiles are populated as blank tiles.

The tiles stack from top to bottom, giving the user an easy and visually based method of navigation.

![tileset](https://raw.githubusercontent.com/unassailable/uinfo/master/media/tileset.png)

##Theming Support
The site's theme is controlled through the [css.style.php](https://github.com/unassailable/uinfo/blob/master/inc/css.style.php) file.  From within this file color schemes, fonts and styles are linked to index.php.

###Color pallets
The [var.color.php](https://github.com/unassailable/uinfo/blob/master/inc/var.color.php) file contains the primary pallet information for the entire site.  The colors are established using rgb values put into various arrays.
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
The site's functions begin by designating a main web root directory (`__DIR__`), which is stored in [$GLOBALS['webr']](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L6).  Inside this directory a 'dir.ini' file *must* be located.  The [ini_grab()](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L36) function builds the $_SESSION['site_dir'] array by searching for this file and parsing its contents.  If an entry has a subdir value, then the function will enter the subdir and parse the dir.ini file within it.  This is controlled by the ini file 'sub' entries and will recurse as long as these entries have values.

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

The value `href = 'another link" target="_blank'` is rendered as `<a href="another link" target="_blank"...`.  Effectively escaping the href attribute and assigning a target attribute while maintaining full site function.

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
After building the site directory, the [page_set()](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L63) method is called.  This method calls upon the $GLOBALS['loc'] variable, which is assigned by the [HTTP POST of 'loc'](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L9)  $GLOBALS['loc'] is used to assign $GLOBALS['parent'], the current page's parent page's array, and $GLOBALS['curr'].

From here the method parses any [specific page options](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L77) which may be required, before building the [output page](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L82).

##Tile Setting
The default option, set by [POST 'ts'](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L8), is to parse $GLOBALS['curr'] and render tiles on the page.  The [tileset()](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L96-L127) function first [checks](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L102-L107) if the user is viewing the 'main' (root) page.  This is done to automatically include a return tile, to the current page's parent, when not viewing the 'main' page.  After this check, the function [enters a loop](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L108-L120) and builds a tile for each element within $GLOBALS['curr'].

Each tile is built using the appropriate [sub-function](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L129-L154) and positioned using [CSS classes](https://github.com/unassailable/uinfo/blob/master/inc/css.layout.css#L77-L130).  The sub-function sequentially [sets the class](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L142) of each tile using the current value of '$i', from the parent function, and the [num2word()](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L703-L813) function.

After $GLOBALS['curr'] has been exhausted, the function enters a [loop](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L121-L124) to populate the remaining empty tiles, if required.  Finally, the tileset div is closed.

##Image Gallery
The existing [tileset](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L96)'s design provided an easy framework upon which a simple photo gallery could be implemented.  The tiles utilize the [background-image property](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L142) to quickly load each image, specified by the dir.ini's 'back' declaration, as a tile's background.  The actual images are [loaded](https://github.com/unassailable/uinfo/blob/master/inc/function.php#L147) onto the page within [hidden divs](https://github.com/unassailable/uinfo/blob/master/inc/css.style.php#L372-L376).  Instead of linking to another page, each tile is designed to function as a button which toggles the visibility of the corresponding image using CSS [pseudo-classes](https://github.com/unassailable/uinfo/blob/master/inc/css.style.php#L378-L390).