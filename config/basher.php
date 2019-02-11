<?php

return [
    '.env' => 'APP_NAME=Laravel
                APP_ENV=local
                APP_KEY=
                APP_DEBUG=true
                APP_URL=http://localhost
                
                LOG_CHANNEL=stack
                
                DB_CONNECTION=mysql
                DB_HOST=127.0.0.1
                DB_PORT=3306
                DB_DATABASE=homestead
                DB_USERNAME=homestead
                DB_PASSWORD=secret
                
                BROADCAST_DRIVER=log
                CACHE_DRIVER=file
                QUEUE_CONNECTION=sync
                SESSION_DRIVER=file
                SESSION_LIFETIME=120
                
                REDIS_HOST=127.0.0.1
                REDIS_PASSWORD=null
                REDIS_PORT=6379
                
                MAIL_DRIVER=smtp
                MAIL_HOST=smtp.mailtrap.io
                MAIL_PORT=2525
                MAIL_USERNAME=null
                MAIL_PASSWORD=null
                MAIL_ENCRYPTION=null
                
                PUSHER_APP_ID=
                PUSHER_APP_KEY=
                PUSHER_APP_SECRET=
                PUSHER_APP_CLUSTER=mt1
                
                MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
                MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"'
];