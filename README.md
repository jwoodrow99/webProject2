# NAME

**MAJOR NOTES**

This is the project description.

**Our stack:**
* Ubuntu
* Nginx
* PHP (with Laravel)
* MySQL

We will be using Laravel with the [Homestead Vagrant box](https://laravel.com/docs/5.8/homestead) for the development environment. This repo contains all of the necessary configuration files for the vagrant box as well as step by step instructions on how to set up the development environment.

## Setup dev environment

**All steps are the same if you are using Windows or Mac, however if you are a windows user it is recommended to use the Power Shell or the Git Bash terminal for all terminal commands.**

 1. Download dependencies
	 * [Oracle VM](https://www.virtualbox.org/wiki/Downloads)
	 * [Vagrant](https://www.vagrantup.com/downloads.html)
2. Install the Laravel Homestead Box for vagrant
``` vagrant box add laravel/homestead ```
3. Clone the Homestead repo to the directory of the project
``` git clone https://github.com/laravel/homestead.git ~/Workspace/NAME```
4. Navigate to the directory & checkout release
```
cd ~/Workspace/NAME
git checkout release 
```
5. Install homestead
	* Windows: ``` init.bat ```
	* Mac / Linux: ``` bash init.sh ```
6. Generate encryption keys
``` ssh-keygen -t rsa -C "you@homestead.com"```
7. Clone the following repo into the bookreso directory
``` 
git clone REPO-LINK NAME-app
```
8. Copy the Homestead.yaml file from the app repo into the homestead folder
```
cp ~/Workspace/NAME/NAME-app/Homestead.yaml.example ~/Workspace/NAME/Homestead.yaml
```
9. Start your Vagrant / Homestead box
``` 
vagrant up 
vagrant ssh 
```
10. Setup laravel dependencies for both applications
	* In the application folder run the following commands
```
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
```
11. Edit your host file to map "NAME.test" to 192.168.10.10
	* [Edit host file OSX](https://www.imore.com/how-edit-your-macs-hosts-file-and-why-you-would-want)
	* [Edit host file Windows](https://www.techwalla.com/articles/how-to-edit-your-windows-hosts-file)
	* ***EXAMPLE:*** ```192.168.10.10 NAME.test```
12. Close your Vagrant / Homestead box
``` 
exit
vagrant halt 
```

Now what you have is a local development environment inside of a VM already configured for a PHP & Laravel application!

***NOTE:*** The application is linked in your VM, any changes you make in either the vm or locally will automatically change in the other.

***Passwords for all features on Homestead:***<br/>
Username: ***homestead***<br/>
Password: ***secret***<br/>
MySQL port: ***2200 OR 33060***<br/>

***REFRENCE***
* [Laravel Homestead Guide](https://laravel.com/docs/5.8/homestead)
* [Laravel Quickstart Guide](https://laravel.com/docs/4.2/quick)
