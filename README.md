#Functional Design
##Site Directory
The site's layout begins with a main web root directory (webr).  Inside this directory a 'dir.ini' file must be located.  The 'ini_grab()' function begins building the global 'site_dir' variable by searching for this file and parsing its contents.

###dir.ini:
```
[id]
name = 'display name'
title = 'link title'
href = 'link'
back = 'image tile background url'
sub = 'y'
```