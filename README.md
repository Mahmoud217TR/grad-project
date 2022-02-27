### Graduation Project

[Discord Server](https://discord.gg/F6JpFq879y)

### Instructions

## Installing PHP
**Step 1 - Download the PHP files:**
https://windows.php.net/downloads/releases/php-8.1.3-Win32-vs16-x64.zip

**Step 2 - Extract the files:**
Create a new php folder in the root of your `C:\` drive and extract the contents of the ZIP into it.

**Step 3 - Configure php.ini:**
PHP’s configuration file is named `php.ini`. This doesn’t exist initially, so copy `C:\php\php.ini-development` to `C:\php\php.ini`. 
There are several lines you may need to change in a text editor (use search to find the current value). In most cases, you’ll need to remove a leading semicolon `(;)` to uncomment a setting.
`extension=curl`
`extension=gd`
`extension=mbstring`
`extension=pdo_mysql`
`extension=sqlite3`

**Step 4 - Add** `C:\php` **to the path environment variable:**
to ensure Windows can find the PHP executable, you need to change the `PATH` environment variable. Click the Windows Start button and type “environment”, then click Edit the system environment variables. Select the Advanced tab, and click the Environment Variables button.

Scroll down the System variables list and click Path followed by the Edit button. Click New and add `C:\php`.


## Installing Composer
**Step 1 - Download Composer Setup:**
https://getcomposer.org/Composer-Setup.exe

**Step 2 - Install Composer**

**Step 3 - Modify php.ini:**
remove the `;` before `extension=fileinfo`


## Installing Laravel

Open your `CMD` and type: `composer global require laravel/installer`


## Installing Node.js
**Step 1 - Download Node.js Installer:**
https://nodejs.org/dist/v16.14.0/node-v16.14.0-x64.msi

**Step 2 - Install Node.js**

**Step 3 - Verify Installation:**
open your `CMD` and type `npm -v`


## Downloading Project Files
**Step 1:**
open your `CMD` at the local directory **where you want to clone your repository**.

**Step 2:**
Paste this command `git clone https://github.com/Mahmoud217TR/grad-project.git`.

**IMPORTANT**: once you downloaded the project run the you have several steps:

**Step 1 - in tmp folder open pack1 and extract the files to there appropriate places**

**Step 2 - Run the following commands:**

`composer install`
`npm install`
`npm run dev`


## Dealing with the Projects

-To run the project on local server on your device use the command: `php artisan serve`

-To apply the changes of js and css files: `npm run dev`

-To pull the new changes **ALWAYS DO IT BEFORE ANY COMMITS**: `git pull`