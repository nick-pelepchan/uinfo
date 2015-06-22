#Functional Design
##Site Directory
The site's layout begins with a main web root directory (webr).  Inside this directory a 'dir.ini' file must be located.  The 'ini_grab()' function builds the $GLOBALS['site_dir'] array by searching for this file and parsing its contents.

###dir.ini
```
[unique_id]
name = 'display name'
title = 'link title'
href = 'link'
back = 'tile background image'
sub = 'subdir'

...
```

###$GLOBALS['site_dir']
```
[unique_id]=>
    array(8) {
      ["name"]=>
      string(11) "display name"
      ["title"]=>
      string(48) "link title"
      ["href"]=>
      string(10) "link"
      ["back"]=>
      string(16) "tile background image"
      ["sub"]=>
      string(5) "subdir"
      ["incpth"]=>
      string(44) "/current/full/directory/path/"
      ["imgpth"]=>
      string(1) "/"
      ["child"]=>
				array() {
				...
				}
    }
```