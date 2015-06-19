#!/bin/bash

cat ../vendor/fortawesome/font-awesome/scss/_icons.scss | \
    cut -c20- | \
    cut -d":" -f1 | \
    sed -e 's/$/,/' | \
    sort | \
    uniq | \
    tee get-fa-icon-list.log