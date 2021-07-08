## Installation

1. Copy the primary-category-project folder into your wp-content/plugins folder
2. Activate the Primary Category Project plugin via the plugin admin page

## Settings

1. Navigate to  settings page.
    - Settings -> Primary Category
    - Plugins page -> Settings link in Primary Category Project
    - 
2. Add/Edit Post and select primary category	
	

#### How to use

Use following shortcode to display result

```PHP
[primarycategory_posts post_type="post" taxonomy="category" primary_taxonomy_id="30"]
```

```PHP
[primarycategory_posts taxonomy="category" primary_taxonomy_id="30"]
```
