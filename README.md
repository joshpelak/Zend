Zend Framework 2 Test Project

Hosting SETUP:
Virtual Host
------------
Afterwards, set up a virtual host to point to the public/ directory of the
project and you should be ready to go!

Alternatively — if you are using PHP 5.4 or above — you may start the internal PHP cli-server in the public
directory:

    cd public
    php -S 0.0.0.0:8080 index.php

This will start the cli-server on port 8080, and bind it to all network
interfaces.
