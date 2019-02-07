### Task description:
Create a program ([using the api documented here](https://www.dragonsofmugloar.com/doc/)) which:

1. Starts a new game
2. Fetches a list of ads
3. Picks the best ads to solve and solves them
4. Optionally buys items to improve its chances.
5. Repeats from step two until lives run out.

Your solution is considered acceptable when the application is reliably able to achieve a score of at least 1000 points.



### Installation:
##### Vagrant option:
1. install [VM VirtualBox v5.1.14](https://www.virtualbox.org/wiki/Download_Old_Builds) or newer
2. install [Vagrant](https://www.vagrantup.com/downloads.html) for your OS
3. check VagrantFile for some configuration if needed (default host port is: **8080**)
4. open terminal, navigate to application folder and type: **vagrant up**
5. wait, it should download all the necessaries, you will see the message when it finishes.

##### Manual option:
1. [Install composer](https://getcomposer.org/download/)
2. If you are on MAC: check php version in terminal: `php -v`
3. If PHP is installed then navigate to app folder and type this: `composer install` (it will install all dependencies)


### Run application
##### Using Vagrant:
Option 1: open browser localhost:8080 - it will execute script, wait for results

Option 2: in terminal, navigate to app folder and type: 
    * `vagrant ssh`
    * `cd /vagrant`
    * `composer run`
    
##### Manual (MAC/Linux)
1. From terminal: Go to app folder
2. run from terminal: `php -S localhost:8080 public/index.php`

    As a result, next link is available:
    Localhost: http://localhost:8000/

You can browse this url in order to run script 

**OR**
type from app folder in terminal: `php public/index.php`

**OR**
type from app folder in terminal `composer run`