#!/bin/bash
function remove_tabs {
  expand --tabs=2 $1 > $1.NoTabs; rm $1; mv $1.NoTabs $1;
}

find . \( -name *.php -o -name *.css -o -name *.js -o -name *.yml \) | while read file; do
  remove_tabs $file
done
