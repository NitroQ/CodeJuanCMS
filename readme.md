<div align="center">
  <img src="https://media.discordapp.net/attachments/828579152428662794/830374882416132117/unknown.png?width=1024&height=228">
</div>

***

# :newspaper: CodeJuan

This is a project done using Laravel 5.2 PHP framework. This covers basics of the framework. 
Laravel 5.2 is full-stack modern PHP framework, that used all new features introduced in recent PHP versions.

## Setup Instructions

### Deployment Requirements:<br />

[Composer 2.0.XX](https://getcomposer.org/download/)  <br /> 
[XAMPP 5.6 or newer](https://www.apachefriends.org/download.html) or [WampServer 3.2.X](https://www.wampserver.com/en/)<br />
[Visual Studio Code](https://code.visualstudio.com/download) <br />
[Git](https://git-scm.com/downloads) <br />


### Installation

1) Option 1: Unzip and Copy Team-A-Codeniverse folder onto your xampp\htdocs folder. <br />
2) Option 2: Clone the repository by running this command: <br />

```sh
> git clone https://github.com/Blue-Hacks-2021/Team-A-Codeniverse.git
```

After cloning run following command to download the dependencies and generate env file and app key:

```sh
> composer install
> cp .env.example .env
> php artisan key:generate 
```

Find the .env file and edit following fields:

```sh
 DB_DATABASE= bluehacks
 DB_USERNAME= root
 DB_PASSWORD=
```

#### Database
1) Option 1: For best experience, create a database named "bluehacks" and import the [bluehacks.sql](https://mega.nz/file/nsw2HSaL#h5ARhkif9yPIvT5VTpIfY5CQGiSiWK9HMc5oV-TS3h8) file in the project to see the full functionality of the website. <br />
2) Option 2: run following command:

```sh
> php artisan migrate
> php artisan db:seed
```

## To run the project:
```sh
> php artisan serve
```

The  project should be up and running on your web server with: localhost:8000/

## To Access Administrator

To access the admin side of the system: localhost:8000/login

Credentials:

```sh
Email: admin@admin.com
Password: admin
```

***

## About the System


**CodeJuan** (CodeOne) aims to equip the public with the essential knowledge on __Disaster Risk Reduction__. CodeJuan is developed to inform and encourage the Filipino people to prepare, respond and put emphasis on emergencies. And that is through having an updated background of latest announcements from Local Government units regarding human-induced or natural disasters. Furthermore, it is a reference used for safety procedures, disaster management, contact services, and public directory.


## Project Modules/Features

### Administrator <br />

A page which will allow pre-registered admin accounts to login and view a list of registered users and their relevant details. This area can use a minimalist layout that is different to the design. Administators can manage their website content; add, edit, delete the content that is displayed to the users.

#### Modules:
**Dashboard** - displays at a glance information or summary of data specific to the donations. <br />
**Map** - Displays the evacuation centers. <br />
**Alerts** - Admin user post alerts/announcements through this module. <br />
**Disasters** - Admin user dynamically posts content for different disasters. <br />
**Build A Kit** - Admin user dynamically creates emergency kits and supplies. <br />
**Evacuation Centers** - Admin user can add new locations and evacuation centers which will be displayed in the map through markers. <br />
**Hotline Directory** - Admin user can add hotlines and important contacts related to emergencies. <br />
**Donations** - Admin can monitor donations and post donation drives.

### Client 

**Home** - Highlights the features of the website. <br />
**Alerts** - Shows important announcements. <br />
**Disaster** - Displays relevant information on the different disasters. It aims to increase the awareness and knowledge of users. <br />
**Prepare** - This feature aims to equip the users with the essentials to increase safety. <br />
**Kit** - Displays needed kits and supplies. <br />
**Plan** - Aims to make the users plan for the future in case of emergencies. <br />
**Safety Skills** - Aims to inform the users on survival skills. <br />
**Resources** - Displayes lists of resources that the users can use in case of emergency. <br />
**Evacuation Centers** - List of evacuation centers with location and contact. <br />
**Directory** -  List of important hotlines for emergencies and calamities. <br />
**Map** - Aims to provide users with knowledge of the different evacuation centers through mapping which marks the different centers. It also features routing that the user can use for directions. <br />

***

# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
