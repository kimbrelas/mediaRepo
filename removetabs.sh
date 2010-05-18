#!/bin/bash
function remove_tabs {
  for file in $1; do
    if [ -f $file ]; then
      expand --tabs=2 $file > $file.NoTabs; rm $file; mv $file.NoTabs $file;
    else
      remove_tabs $file
    fi
  done
}

remove_tabs $1
