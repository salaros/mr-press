#!/bin/bash

# Re-create the DB using stored config
vendor/bin/wp db drop --yes
vendor/bin/wp db create

# Create Wordpress tables
vendor/bin/wp core install --title=Example --admin_user=webmaster --admin_password=webmaster --admin_email=webmaster@example.org --url=example.org --skip-email

# Activate required plugins
vendor/bin/wp plugin activate timber-library
vendor/bin/wp plugin activate advanced-custom-fields

# Process the cron job template
wpRoot=$(pwd)
sed "s|WP_ROOT|${wpRoot}/public|g" conf/cron.d/wptpl-cron-job.example > conf/cron.d/wptpl-cron-job
