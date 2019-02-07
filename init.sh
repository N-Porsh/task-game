#!/usr/bin/env bash

if [ -e package.json ]; then
    echo "Node.js service, running npm install";
    npm install --no-bin-links
fi

if [ -e composer.json ]; then
    echo "PHP service, running composer install";
    composer update
    composer install
fi

cd ..