#ThnkPHP URL_MODEL=>2 rewrite
location /sixchat/ {
    if (!-e $request_filename) {
        rewrite ^/sixchat/(.*)$ /sixchat/index.php?s=$1 last;
        break;
    }
}
