#!/bin/sh

echo "Stopping MAMP"
sudo /Applications/MAMP/bin/stop.sh
sudo killall httpd mysqld
 
echo "Copy Bin"
sudo rsync -arv --progress mysql-5.7.*/bin/* /Applications/MAMP/Library/bin/ --exclude=mysqld_multi --exclude=mysqld_safe 
 
echo "Copy Share"
sudo rsync -arv --progress mysql-5.7.*/share/* /Applications/MAMP/Library/share/
 
echo "Building Mysql 5.7 Folder"
sudo cp -r /Applications/MAMP/db/mysql56 /Applications/MAMP/db/mysql57
sudo rm -fr /Applications/MAMP/db/mysql57/mysql/innodb_*
sudo rm -fr /Applications/MAMP/db/mysql57/mysql/slave_*
sudo chmod -R o+rw  /Applications/MAMP/db/mysql57/
sed -i.bak 's/mysql56/mysql57/g' /Applications/MAMP/Library/bin/mysqld_safe
 
echo "Fixing Access (workaround)"
sudo chmod -R o+rw  /Applications/MAMP/tmp/mysql/
 
echo "Starting MySQL"
sudo /Applications/MAMP/Library/bin/mysqld_safe --port=3306 --socket=/Applications/MAMP/tmp/mysql/mysql.sock --pid-file=/Applications/MAMP/tmp/mysql/mysql.pid --log-error=/Applications/MAMP/logs/mysql_error.log
 
echo "Migrate, finaly, to new version"
sudo /Applications/MAMP/Library/bin/mysql_upgrade --user=root --password=root --port=3306 --socket=/Applications/MAMP/tmp/mysql/mysql.sock --force
