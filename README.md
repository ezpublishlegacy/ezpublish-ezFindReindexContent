# ezpublish-ezFindReindexContent

## Description

Extends the legacy ezfind extension to add a reindex content link to all objects

This addresses an issue in sites which use Solr, but for performance reasons have asObjects set to false when doing fetches. asObjects = false gives you the data direct from Solr, which is fast, but with Solr being a volatile document data source there's always a risk of it being out of sync.

Another issue addressed is this: ezFind does not reindex content when a priority is changed (by default). Manually re-saving each object can be tedious.

## Screenshots
### The menu link
![Reindex Content Menu Link](https://cloud.githubusercontent.com/assets/389843/7044453/8147c6a2-ddeb-11e4-91d6-16127a8e3bbc.png)
### The reindex page
![Reindex Content Page](https://cloud.githubusercontent.com/assets/389843/7044454/814ae74c-ddeb-11e4-891b-fe051be41919.png)

## Installation
Copy the folder to your extensions directory
- Note that ezfind must be installed

If you use an override file then you may need to add ActiveExtensions[]=gazfind to your settings/override/site.ini under [ExtensionSettings]

Regenerate Autoloads

Clear your caches

## Contact
Use github issues.
