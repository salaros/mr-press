#!/bin/bash

# Re-create the DB using stored config
vendor/bin/wp db drop --yes
vendor/bin/wp db create

# Create Wordpress tables
vendor/bin/wp core install --title=Example --admin_user=webmaster --admin_password=webmaster --admin_email=webmaster@example.org --skip-email

# Activate required plugins
vendor/bin/wp plugin activate timber-library
vendor/bin/wp plugin activate advanced-custom-fields
