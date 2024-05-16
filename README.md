# Docker-LEMP-stack-composer

## Use composer to create vendor directory

*Extension Dev container must be installed*

1. In Visual Studio Code open *Dev Containers: Open Folder in Container...*
2. Add configuration
3. Select a template - PHP devcontainer
4. Select PHP version

After container has been build, open terminal and run cmd (if composer.json exists)

`composer install`

The command creates folder *vendor* and dependencies.

You should now be able to open local parent folder and have PHP intellisense.