# sfTwitterBootstrapPlugin

This symfony1 plugin provides a dashboard/menu and a theme for the admin generator for your backend. It is based on the [Twitter Bootstrap](http://twitter.github.com/bootstrap/).
It works with Propel or Doctrine.
The generated dashboard/menu is based on the great [sfAdminDashPlugin](https://github.com/kbond/sfAdminDashPlugin).

## Requirements

For a ``Propel`` use, you will have to install [sfPropelORMPlugin](https://github.com/propelorm/sfPropelORMPlugin) instead of sfPropelPlugin.
You might need [sfGuardPlugin](http://www.symfony-project.org/plugins/sfGuardPlugin) (or [sfDoctrineGuardPlugin](http://www.symfony-project.org/plugins/sfDoctrineGuardPlugin)) for the user management.

## Screenshots

Preview of list:

![Preview of list](https://github.com/real-chocopanda/sfTwitterBootstrapPlugin/raw/master/doc/list.png)

Preview of edit:

![Preview of edit](https://github.com/real-chocopanda/sfTwitterBootstrapPlugin/raw/master/doc/edit.png)

Preview of login:

![Preview of login](https://github.com/real-chocopanda/sfTwitterBootstrapPlugin/raw/master/doc/login.png)

## How to setup

In ``config/ProjectConfiguration.class.php``

```php
class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfTwitterBootstrapPlugin');
    ...
```

In ``apps/backend/config/view.yml``

```yaml
default:
  stylesheets:
    - /sfTwitterBootstrapPlugin/bootstrap/bootstrap.css
    - /sfTwitterBootstrapPlugin/css/style.css
    - /sfTwitterBootstrapPlugin/css/jquery-ui-1.8.16.custom.css # For date pickers ...
    - main.css

  javascripts:
    - "http://code.jquery.com/jquery-1.7.min.js"
    - "/sfTwitterBootstrapPlugin/js/jquery.tablesorter.min.js"
    - "/sfTwitterBootstrapPlugin/js/google-code-prettify/prettify.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-dropdown.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-twipsy.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-scrollspy.js"
    - "/sfTwitterBootstrapPlugin/js/application.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-modal.js"
    - "/sfTwitterBootstrapPlugin/js/bootbox/bootbox.min.js"
    - "/sfTwitterBootstrapPlugin/js/jquery-ui-1.8.16.custom.min.js" # For date pickers ...


  layout:         %SF_PLUGINS_DIR%/sfTwitterBootstrapPlugin/templates/layout
```

In ``apps/backend/config/app.yml``

```yaml
all:
  sf_twitter_bootstrap:
    site:                   Your project name
    # if you want top links to fieldset legend in new/edit page (like "Admin & Content" in the edit screenshot)
    top_link_to_fieldset:   true
```

In ``apps/backend/config/settings.yml``

```yaml
all:
  .settings:
    enabled_modules: [default, sfTwitterBootstrap, ...]
```

Configure the form formatter :

In ``apps/backend/config/backendConfiguration.class.php``

```php
class backendConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
    sfWidgetFormSchema::setDefaultFormFormatterName('TwitterBootstrap');
  }
}
```

## The generator.yml

Change the theme value to :

```yaml
generator:
  ...
  param:
    ...
    theme:                 twitter
    ...
```

## Include a slot in all your screens :

Edit ``view.yml``

```yaml
default:
  components:
    sf_twitter_bootstrap_permanent_slot: [ Module, component ]
```

## Highlight required label

In your form class :

```php
$formatterObj = $this->widgetSchema->getFormFormatter();
$formatterObj->setValidatorSchema($this->getValidatorSchema());
```

Of course, if you are using an admin generator it's automatic !!

## sfGuard signin form

Overwrite the signinSuccess into ``apps/backend/modules/sfGuardAuth/templates/signinSuccess.php``

``` php
<?php include_partial('sfTwitterBootstrap/login', array('form' => $form)); ?>
```

## Setup the menu and the dashboard

You can follow _Step 3_ to  _Step 5_ from the [readme file of sfAdminDashPlugin](https://github.com/kbond/sfAdminDashPlugin/blob/master/README.md) to setup dashboard / menu items.
We use different icons in comparison to sfAdminDash. Check the folder ``images``.

## include partials on the right

```yaml
generator:
  ...
  config:
    ...
    edit:
      ...
      partial: ['module/partial']
```

Some partials are bundeled with the plugin :

### Propel behaviors

* versionable: ```propel_behaviors/versionable_version_list```
* auditable: ```propel_behaviors/auditable_log_list```

missing : Timestampable, Geocodable, I18n, Taggable, Ratable, Commentable, NestedSet, Sluggable

![Preview of extra partials](https://github.com/real-chocopanda/sfTwitterBootstrapPlugin/raw/master/doc/behavior-templates.png)
