#!/bin/bash
TIMESTAMP=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="backups"
mkdir -p $BACKUP_DIR

# Get DB credentials from .env
source .env

# Backup database
sail exec mysql mysqldump -u root -p${DB_PASSWORD} ${DB_DATABASE} > "$BACKUP_DIR/db_backup_$TIMESTAMP.sql"

echo "✅ Database backed up to: $BACKUP_DIR/db_backup_$TIMESTAMP.sql"

# Keep only last 7 backups
ls -t $BACKUP_DIR/db_backup_*.sql 2>/dev/null | tail -n +8 | xargs -r rm

echo "✅ Old backups cleaned (kept last 7)"
