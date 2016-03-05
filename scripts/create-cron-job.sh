#!/bin/bash

wpRoot=${PWD}
jobName=${PWD##*/}
if [[ $(id -u) -ne 0 ]] ; then sudoPrefix=sudo ; fi

# Process the cron job template
sed "s|WP_ROOT|${wpRoot}/public|g" conf/cron.d/wptpl-cron-job.example > conf/cron.d/wptpl-cron-job

# Enable the newly created cron job
$sudoPrefix cp -nv conf/cron.d/wptpl-cron-job /etc/cron.d/$jobName
