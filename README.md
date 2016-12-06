# CS408Project
PHP project

Because this was done in PHP, it can be run in several different ways.

For this project, I put the two directories in /var/www/html/ on an EC2 instance running ubuntu with LAMP installed

$ sudo apt-get install lamp-server^
$ sudo mkdir /var/www/html/project
$ cp project/* /var/www/html/project/

Because some of the functions rely on file i/o, I had to user modify privileges and ownership in the directories to let it run, but I would assume this is more dependent on your machine

$ sudo chown -R root:<wwwsomething> /var/www/html/project
$ sudo chmod 777 /var/www/html/project -R

This is not the most secure way to do this, but it's not my personal computer and it worked for me

Once it's all set up, you should be able to access it through a browser at <address>/project/