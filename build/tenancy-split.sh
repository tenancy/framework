#!/usr/bin/env bash

git subsplit init git@github.com:tenancy/framework.git

# Tenancy.
git subsplit publish --heads="master" src/Tenancy:git@github.com:tenancy/tenancy.git

# Identification drivers
git subsplit publish --heads="master" src/Identification/Console:git@github.com:tenancy/identification-driver-console.git
git subsplit publish --heads="master" src/Identification/Environment:git@github.com:tenancy/identification-driver-environment.git
git subsplit publish --heads="master" src/Identification/Http:git@github.com:tenancy/identification-driver-http.git
git subsplit publish --heads="master" src/Identification/Queue:git@github.com:tenancy/identification-driver-queue.git

# Database drivers
git subsplit publish --heads="master" src/Database/Drivers/Mysql:git@github.com:tenancy/db-driver-mysql.git
git subsplit publish --heads="master" src/Database/Drivers/Sqlite:git@github.com:tenancy/db-driver-sqlite.git

# Testing
git subsplit publish --heads="master" src/Testing:git@github.com:tenancy/testing.git

rm -rf .subsplit/
