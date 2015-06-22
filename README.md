#Functional Design
##Site Directory Array
The site's functions begin by designating a main web root directory (`__DIR__`), which is stored in $GLOBALS['webr'].  Inside this directory a 'dir.ini' file *must* be located.  The 'ini_grab()' function builds the $GLOBALS['site_dir'] array by searching for this file and parsing its contents.  If an entry has a subdir value, then the function will enter the subdir and parse the dir.ini file within it.  This is controlled by the ini file 'sub' entries and will recurse as long as these entries have values.

###dir.ini
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

###$GLOBALS['site_dir']
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

##Page Design
![site design](https://raw.githubusercontent.com/unassailable/uinfo/master/media/design.png)

The site's design is currently based on a full screen, three-tile pattern.  However, because the pages are built automatically off the $GLOBALS['site_dir'] array, the design can easily be adapted to suit anyones needs.