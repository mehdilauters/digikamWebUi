=======
digikamWebUi
============


![main screenshot](http://lauters.fr/blog/wp-content/uploads/2013/08/digikamScreenShot-1024x473.jpg "main screenshot")



Most important features are

- user management: a user can
    -   The root user can manage users permissions by drag’n drop from lists
    -    see albums from an available albums list
    -   see tags from an available tags list
    -   not see pictures tagged with a forbiden tag on an available album
    -   not see pictures from a given album on an available tag
    -   rate pictures
    -   tag / untag pictures
- Images preview: Pictures can be displayed as lists from albums or tags, or one by one
    -   Exif data
    -   Geolocalisations (google maps)
    -   rating/tags/album related…
- Cache management
    -   Thumbnails are generated at loading and stored in a cache folder
    -   The cache is optimized to not reload preview already downloaded by the browser


![Photo Preview](http://lauters.fr/blog/wp-content/uploads/2013/10/digikamScreenShot1-1024x468.jpg "Photo Preview")


More information available at http://lauters.fr/blog/digikamwebui/


To install the web interface in X steps:
- download the sources and put them into your WWW folder ( ie. /var/www/digikamWebUi )
- setup databases (file app/config/database.php, doc here http://book.cakephp.org/2.0/en/development/configuration.html )
    - The digikam one (containing the collection): 
          public $default = array(
            'datasource' => 'Database/Sqlite',
            'database' => '/PATH/TO/digikam4.db',
          );
    That's all for this one
    - The WebUi one (user management, user rights...)
        - Schema creation
            The SQL file to execute is app/Model/Datasource/digikamWebUi.sql
        - CakePhp configuration
            public $digikamWebUi = array(
                'datasource' => 'Database/Sqlite',
                'database' => 'PATH/TO/A/NEW/DATABASE/digikamWebUi.db',
            );
- create the admin user (Which is the first one registered)
    http://localhost/digikamWebUi/users/add
- Login
- Add users and manage their right
    
