#!/bin/sh
set -e

# Wait for dependencies
if [ $WAIT_FOR_DEPENDENCIES -eq 1 ]; then
  # MySQL
  dockerize -wait tcp://$DB_HOST:$DB_PORT -timeout 120s
  # Mail
  dockerize -wait tcp://$MAIL_HOST:$MAIL_PORT -timeout 10s
fi

exec /entrypoint.sh "$@"
