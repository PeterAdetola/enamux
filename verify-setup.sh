#!/bin/bash

echo "==================================="
echo "Project Gallery System - Setup Verification"
echo "==================================="
echo ""

# Check if ProjectGalleryParser exists in correct location
if [ -f "app/Helpers/ProjectGalleryParser.php" ]; then
    echo "✓ ProjectGalleryParser.php found in app/Helpers/"
else
    echo "✗ ProjectGalleryParser.php NOT found in app/Helpers/"
    echo "  Please copy it to: app/Helpers/ProjectGalleryParser.php"
fi

# Check if ProjectController exists
if [ -f "app/Http/Controllers/ProjectController.php" ]; then
    echo "✓ ProjectController.php found"

    # Check if controller doesn't contain ProjectGalleryParser class definition
    if grep -q "class ProjectGalleryParser" "app/Http/Controllers/ProjectController.php"; then
        echo "✗ ERROR: ProjectController contains ProjectGalleryParser class definition!"
        echo "  This should only be in app/Helpers/ProjectGalleryParser.php"
    else
        echo "✓ ProjectController looks good (no duplicate class)"
    fi
else
    echo "✗ ProjectController.php NOT found"
fi

# Check for view files
if [ -f "resources/views/frontend/projects/index.blade.php" ]; then
    echo "✓ index.blade.php found"
else
    echo "✗ index.blade.php NOT found in resources/views/frontend/projects/"
fi

if [ -f "resources/views/frontend/projects/show.blade.php" ]; then
    echo "✓ show.blade.php found"
else
    echo "✗ show.blade.php NOT found in resources/views/frontend/projects/"
fi

# Check if storage/app/projects directory exists
if [ -d "storage/app/projects" ]; then
    echo "✓ storage/app/projects directory exists"

    # Count projects
    PROJECT_COUNT=$(find storage/app/projects -mindepth 1 -maxdepth 1 -type d | wc -l)
    echo "  Found $PROJECT_COUNT project(s)"
else
    echo "✗ storage/app/projects directory NOT found"
    echo "  Creating it now..."
    mkdir -p storage/app/projects
fi

echo ""
echo "==================================="
echo "Running Laravel commands..."
echo "==================================="

php artisan clear-compiled
php artisan config:clear
php artisan cache:clear
composer dump-autoload

echo ""
echo "✓ Cache cleared and autoload regenerated"
echo ""
echo "Setup verification complete!"
