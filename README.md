#Functional Design
##Site Directory
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
      ['child']=> '',
    }
```