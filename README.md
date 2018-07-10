# Recettes

 ### Open source platform to manage and share recipes 
 
 ## Prerequiste 
 
 [PHP 7.1](http://php.net/downloads.php) 
 
 [MySQL](https://dev.mysql.com/downloads/) 
 
 ## Installation 
 
 Download project or `git clone https://github.com/azzed/Recettes-app.git your_project_name` 
 
 cd `path/to/project` 
 
 `composer install`

 Rename the `config.php.dist` file by `config.php`
 
 Delete the term `Recipe-app` in the url of the `URL.php` file 
        
For the database:
   
   * creates a database called projet5
    
   * import the file `bdd-projet5.sql` into the database

   * Open `config.php` file and change your settings:
        
       * 'dsn' =>'your port use' 
       * 'user' =>'your username' 
       * 'pwd' =>'your password' 





