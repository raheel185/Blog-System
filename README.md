# PHP Blog Website
Simple blog system for personal development using procedural PHP and MYSQL.


# Setup

Update the `connect.php` file with your database credentials.  
Import the `database.sql` file.  

If installed on a sub-folder, edit the `config.php` and replace the empty constant with the folder's name.  

The pagination results per page can be set on the `config.php` file.  

=======
>>>>>>> 5b2c9e8009c0de5be2deb2f34748882cf0c5a365
### URL Rewrite
The latest update introduces 'slugs', also known as 'SEO URLs'.   
After you update to the latest version, click on the "Generate slugs (SEO URLs)" button on the admin dashboard and slugs will be generated for all existing posts.   

The blog posts URL structure is like this: `http://localhost/p/4/apple-reveals-apple-watch-series-7`   

If you use Apache, enable the Apache rewrite module for the .htaccess rewrite rule to work.

If you use NGINX, you can insert something similar to the code below in your NGINX configuration block.      
```
location / {
    rewrite ^p/(.*) view.php?id=$1;
}
```
   


