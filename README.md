
# icalMerger
Merge various ical feeds and return a new combined feed.

## Installation

 1. Download the repository and upload the files to your webhosting
 2. Make sure the domain routs directly to the index.php file
 3. Rename `config-demo.json` to `config.json`
 4. Change the example entries in `config.json` and add your personalised ical urls
 5. Change the `api_key` .
 6. Forbid direct access to the config.json file. 

## Usage
Simply add the url of your hosting eg. cal.mydomain.tld?api_key=your_token to your calendar app. Thats it. With every request it will pull the original ics url and merge them on the fly. Deadsimple
