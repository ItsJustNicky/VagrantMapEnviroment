# COSC349 A1 Complex Virtual Machine Enviroment
## Map based Web virtual machine enviroment


## Description
A set of virtual machines used to host and manipulate an SQL database that implements potential points of interest, displayed virtually through a webserver, with an administrative machine that has access to the two other machines for potenital administrative purposes, such as addition of new information within the database or updates required to webserver


## Installation
- install Vagrant
- (optional) install oracle VM  Virtual box
- cd into chosen directory
- git clone https://altitude.otago.ac.nz/patni711/cosc349a1
- cd into cosc349a1
- Vagrant up
- Vagrant ssh adminVM
- ssh vagrant@192.168.56.12 for database VM
- ssh vagrant@192.168.56.11 for webserver VM
- http://127.0.0.1:8080/ to view webserver

## Usage
The webserverVM allows for points of interest but through customization of the SQL database you can alter these to whatever points you prefer for potenital representation of any data you choose, the application allows for points or areas, and of which the colours can be cuztomized within the javascript file provided, allowing for various represntations within mapping


## Authors and acknowledgment
This project implements the https://leafletjs.com/ - open open source mapping application implemented in Java Script.

## License
Leaflet is open source software, and as such is free to use so long as it is credited on the page, as in the case of the webserver home page footer

## WebServerVM
A Vagrant virtual box used to create and host webpages for the main application, the map, and the database representation, http://127.0.0.1:8080/test-database these are used to provide an example of a mapping application, with highlights on various points of interest, such as the wellington parliment building, or areas of interest such as the korean demilitarized zone. The webserver does through implementation of a modified version of a previous javascript project. CSS and HTML is handled through the Style.css doc, and the index.php doc, of which are completely customizeable

## DatabaseVM
A Vagrant vitrual box used to create and host an sql database containing potential points of interest, locations within the SQL database, and areas of interest, areas within the SQL database, the database itself is denoted as Fvision, and allows for two users to interact with it, Webuser to allow the webserverVM to select the data for use and display, and ADMIN, for admin useage in editing or alteration of data after the machines have been launched.

## adminVM
A Vagrant virtual box used to create SSH connections to the other two machines to allow the manipulation, alteration, and maintenance of systems belonging to those machines, this includes editing data within the SQL database, in the form of adding or removing entries, adding in potential new types of points, and datascrubing incorrect entries. It also allows for site maintenance without the need for direct access to the WebServerVM, to allow for systemctl resets in the event settings need to be altered, or should either be running out of date packages, the admin server is able to run apt-get update in the event you dont want to reset the whole system, and cannot access the machines directly, as would be the case from an administrative POV

