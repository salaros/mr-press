#!/bin/bash

# Process the cron job template
wpRoot=${PWD}
sed "s|WP_ROOT|${wpRoot}/public|g" conf/cron.d/wptpl-cron-job.example > conf/cron.d/wptpl-cron-job

jobName=${PWD##*/}
sudo cp -nv conf/cron.d/wptpl-cron-job /etc/cron.d/$jobName
