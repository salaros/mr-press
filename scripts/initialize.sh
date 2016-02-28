#!/bin/bash

vendor/bin/wp db drop --yes
vendor/bin/wp db create
vendor/bin/wp core install --title=Example --admin_user=webmaster --admin_password=webmaster --admin_email=webmaster@example.org --skip-email
vendor/bin/wp plugin activate timber-library
