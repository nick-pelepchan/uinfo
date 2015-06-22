Directory Structure:

  root
    |-admin
    |-media
    |~dir.ini
		|~index.php
    |~header.php
    |~main.php
		|~topbar.php
    |~footer.php

INI File 
  dir.ini contains a list of pages and tells the function to search a subdirectory if required.

  dir.ini format:
	
    [0]
    name = 'NAME' (Visible link name)
    title = 'TITLE' (Hover link title)
    href = 'PG DIRECTORY NAME'
    sub = '' (no sub-pages)
    
    [1]
    name = 'NAME'
    title = 'TITLE'
    href = 'PG DIRECTORY NAME'
    sub = 'y' (sub-pages exist)
    
    ...
    
    sub.ini format
    [0]
    name = 'NAME' (Visible link name)
    title = 'TITLE' (Hover link title)
    href = 'SPG DIRECTORY NAME'
    
    [1]
    name = 'NAME'
    title = 'TITLE'
    href = 'SPG DIRECTORY NAME'
    
    ...
  
  The top level navigation menu consists of single text links with a max width of 7em (variable with font size).  Every sub-item has one of two formats:
    -If the sub-item has children the link will be 75px x 200px and a background image may be utilized by placing a PNG with the same name as the 'href value' in the current directory.
    -If the sub-item has no children it will default to the standard height and a width of 200px.
    
Site Functions
  PG function
    This function iterates through the top level side.ini building an array of pages.  If a page has children, the function will iterate through the side.ini in each child directory until a 'bottom' is reached.
    
    The array utilizes keys named pg0, pg1, pg2... and the value is assigned using the 'href' entry in the side.ini file. 
    
  SPG function
    This function iterates through the current directory's sub.ini file building an array of all sub-pages.  The sub.ini and side.ini CANNOT both exist in the same directory.
    
    The array utilizes keys named spg0, spg1, spg2... and the value is assigned using the 'href' entry in the sub.ini file. 