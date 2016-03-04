#!/bin/bash

# Re-create the DB using stored config
vendor/bin/wp --allow-root db drop --yes
vendor/bin/wp --allow-root db create

# Create Wordpress tables
vendor/bin/wp --allow-root core install --title=Example --admin_user=webmaster --admin_password=webmaster --admin_email=webmaster@example.org --url=example.org --skip-email

# Activate required plugins
vendor/bin/wp --allow-root plugin activate timber-library
vendor/bin/wp --allow-root plugin activate advanced-custom-fields

# Process the cron job template
wpRoot=$(pwd)
sed "s|WP_ROOT|${wpRoot}/public|g" conf/cron.d/wptpl-cron-job.example > conf/cron.d/wptpl-cron-job
