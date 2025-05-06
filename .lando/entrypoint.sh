#!/bin/sh
# Auto-start services as root
service supervisor start
supervisorctl start horizon:*

# Below is copied from the default entrypoint
set -e

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
        set -- apache2-foreground "$@"
fi

exec "$@"
