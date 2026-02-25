# Student Package - Git Setup & Versioning Guide

## Step 1: Create Git Repository

### Option A: GitHub (Recommended)
1. Go to https://github.com/new
2. Repository name: `student`
3. Description: "Reusable Student Module for Laravel"
4. Select **Private** (or Public if you want open source)
5. Click "Create repository"

### Option B: GitLab
1. Go to https://gitlab.com/projects/new
2. Repository name: `student`
3. Click "Create project"

---

## Step 2: Initialize Git in Package Directory

```bash
cd packages/Student

# Initialize git
git init

# Create initial commit
git add .
git commit -m "Initial release v1.0.0"

# Add remote repository
# Replace with your actual repository URL
git remote add origin https://github.com/YOUR_USERNAME/student.git

# Push to remote
git push -u origin master
# Or: git push -u origin main
```

---

## Step 3: Create Version Tags

### Semantic Versioning Format
- `v1.0.0` - Initial release
- `v1.0.1` - Bug fixes
- `v1.1.0` - New features (backward compatible)
- `v2.0.0` - Breaking changes

```bash
# Create tag
git tag v1.0.0

# Push tag to remote
git push origin v1.0.0
```

---

## Step 4: Update Package for Release

Edit `composer.json` with correct info:

```json
{
    "name": "your-username/student",
    "description": "Reusable Student Module for Laravel",
    "homepage": "https://github.com/YOUR_USERNAME/student",
    "require": {
        "php": "^8.2",
        "laravel/framework": "^12.0"
    }
}
```

---

## Step 5: Update Main Project composer.json

### For Local Development (Path Repository)
Current setup already configured in main `composer.json`:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "./packages/*",
            "options": {
                "symlink": true
            }
        }
    ],
    "require": {
        "student/package": "*"
    }
}
```

Run: `composer update student/package`

### For Production (Private Repository)

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/YOUR_USERNAME/student.git"
        }
    ],
    "require": {
        "your-username/student": "^1.0"
    }
}
```

---

## Step 6: Version Update Workflow

### Making Updates

1. Make code changes
2. Update version in `composer.json`:
   ```json
   "version": "1.1.0"
   ```
3. Commit changes:
   ```bash
   git add .
   git commit -m "Add new feature"
   ```
4. Create new tag:
   ```bash
   git tag v1.1.0
   git push origin v1.1.0
   ```

### Updating in Main Project

```bash
# Update to latest version
composer update your-username/student

# Update to specific version
composer require your-username/student:^1.1.0
```

---

## Package Structure

```
packages/Student/
├── composer.json          # Package configuration
├── src/
│   ├── Config/            # Configuration files
│   ├── Database/
│   │   ├── Factories/    # Model factories
│   │   └── migrations/   # Database migrations
│   ├── Domain/
│   │   └── Models/        # Eloquent models
│   ├── Http/
│   │   ├── Controllers/  # Controllers
│   │   └── routes.php     # Route definitions
│   ├── Providers/         # Service providers
│   └── Resources/
│       └── js/
│           └── pages/     # Inertia Vue pages
├── .gitignore
└── README.md
```

---

## Development Commands

```bash
# In main Laravel project

# Install package
composer install

# Update package
composer update student/package

# Dump autoload
composer dump-autoload
```

---

## Troubleshooting

### Issue: Package not found
```bash
# Clear composer cache
composer clear-cache

# Update with verbose
composer update -vvv
```

### Issue: Symlink not working
Check that `options.symlink: true` is set in repository config.

### Issue: Service Provider not loading
Make sure the package is properly installed:
```bash
php artisan package:discover
```
