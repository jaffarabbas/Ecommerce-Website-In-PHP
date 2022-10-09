#!/bin/sh
$now=$(date +"%T")
git add .
git commit -m "Auto commit at $now"
git push origin master