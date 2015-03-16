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
7. And make sure that file is included in `proftpd.conf`: `Include /etc/proftpd/sql.conf`
8. Restart webserver
9. Restart proftpd `sudo /etc/init.d/proftpd restart`
 
## Credits
Bootstrap 3 template http://startbootstrap.com/template-overviews/sb-admin/
