#!/bin/bash
mysqldump -u simabes -p cws > cws_backup.sql
cp -rf * ~/Dropbox/cws/
git add --all
git commit -m "backup"
git push
