#!/bin/bash

# Start the PHP server in the MDEditor directory
# cd MDEditor
php -S 127.0.0.1:8989 &

# Open the URL in a browser
sleep 2 # Wait for the server to start
xdg-open http://127.0.0.1:8989/
