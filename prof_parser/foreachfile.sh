#!/bin/bash

for file in htmls/a/*; do
	php prof_parser.php "$file"
done
