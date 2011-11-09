# sfTwitterBootstrapPlugin

## How to setup

In config/ProjectConfiguration.php

```php
class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfTwitterBootstrapPlugin');
    ...
```

In apps/backend/config/view.yml

```yaml
default:
  stylesheets:    [ /sfTwitterBootstrapPlugin/bootstrap/bootstrap.css, /sfTwitterBootstrapPlugin/css/style.css, main.css]
  
  javascripts:    
    - "http://code.jquery.com/jquery-1.5.2.min.js"
    - "http://autobahn.tablesorter.com/jquery.tablesorter.min.js"
    - "/sfTwitterBootstrapPlugin/js/google-code-prettify/prettify.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-dropdown.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-twipsy.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-scrollspy.js"
    - "/sfTwitterBootstrapPlugin/js/application.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-dropdown.js"
  
  
  layout:         %SF_PLUGINS_DIR%/sfTwitterBootstrapPlugin/templates/layout
```

In apps/backend/config/app.yml

```yaml
all:
  sf_twitter_bootstrap:
    site:  Your project name
```

## Include a slot in all your screens :

Edit view.yml

```yaml
default:
  sf_twitter_bootstrap_permanent_slot: [ Module, component ]
```
