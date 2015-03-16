#proFTPd Web Admin

[![Build Status](https://travis-ci.org/hmazter/proftpd-ftpadmin.svg?branch=master)](https://travis-ci.org/hmazter/proftpd-ftpadmin)

Web interface to manage user and groups. View transfer and login logs.
All access limit still needs to be handled in config files. Included config for the sql log triggers.

## Installation
1. Clone the git-repo: `git clone https://github.com/hmazter/proftpd-ftpadmin.git`
2. Create a database
3. Set the database name, usernamer and password in `app/config/database.php`
4. Run database migrations `php artisan migrate`
5. Set up a webserver (apache, nginx, etc) pointing to `proftpd-ftpadmin/public`
6. Copy `mod_sql.conf` to `/etc/proftpd/sql.conf`
7. Update db_name, db_user and db_pass in `/etc/proftpd/sql.conf`
7. And make sure that file is included in `proftpd.conf`: `Include /etc/proftpd/sql.conf`
8. Restart webserver
9. Restart proftpd `sudo /etc/init.d/proftpd restart`

## Configuration
1. Copy `limits.conf.example` to `/etc/proftpd/conf.d/limits.conf`
2. Make appropriate changes to `limits.conf`, Add Group names
3. Add the groups with matching names to the `groups` table in the database, with a gid that is not colliding with any on the system
4. Start adding users from the web UI, `/users`, selecting a group for each user. Homedir should probably be the same as the ftp root, also set att the root node in the `limits.conf` file. Shell is best set as `/bin/false` to block ssh login for that user.

 
## Credits
Bootstrap 3 template http://startbootstrap.com/template-overviews/sb-admin/
Laravel 4 http://laravel.com/docs/4.2