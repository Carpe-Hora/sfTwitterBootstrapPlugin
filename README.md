# sfTwitterBootstrapPlugin

Is an admin theme for symfony1 include an admingenerator theme for propel

## Requirements

For a ``Propel`` use, you will have to install [sfPropelORMPlugin](https://github.com/propelorm/sfPropelORMPlugin) instead of sfPropelPlugin.

## Screenshots

![Preview of list](https://github.com/real-chocopanda/sfTwitterBootstrapPlugin/raw/master/doc/list.png)

![Preview of login](https://github.com/real-chocopanda/sfTwitterBootstrapPlugin/raw/master/doc/login.png)

## How to setup

In config/ProjectConfiguration.class.php

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
  stylesheets:
    - /sfTwitterBootstrapPlugin/bootstrap/bootstrap.css
    - /sfTwitterBootstrapPlugin/css/style.css
    - /sfTwitterBootstrapPlugin/css/jquery-ui-1.8.16.custom.css # For date pickers ...
    - main.css

  javascripts:
    - "http://code.jquery.com/jquery-1.5.2.min.js"
    - "http://autobahn.tablesorter.com/jquery.tablesorter.min.js"
    - "/sfTwitterBootstrapPlugin/js/google-code-prettify/prettify.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-dropdown.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-twipsy.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-scrollspy.js"
    - "/sfTwitterBootstrapPlugin/js/application.js"
    - "/sfTwitterBootstrapPlugin/bootstrap/js/bootstrap-dropdown.js"
    - "/sfTwitterBootstrapPlugin/js/jquery-ui-1.8.16.custom.min.js" # For date pickers ...


  layout:         %SF_PLUGINS_DIR%/sfTwitterBootstrapPlugin/templates/layout
```

In apps/backend/config/app.yml

```yaml
all:
  sf_twitter_bootstrap:
    site:  Your project name
```

Configure the form formatter :

In acpps/backend/config/backendConfiguration.class.php

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

```php
theme:                 twitter
```

## Include a slot in all your screens :

Edit view.yml

```yaml
default:
  sf_twitter_bootstrap_permanent_slot: [ Module, component ]
```

## Highlight required label

In your form class :

```php
$formatterObj = $this->widgetSchema->getFormFormatter();
$formatterObj->setValidatorSchema($this->getValidatorSchema());
```

Of course, if you are using an admingenerator it's automatic !!

## sfGuard signin form

Overwrite the signinSuccess into apps/backend/modules/sfGuardAuth/templates/signinSuccess.php

``` php
<div class="mod login">
    <div class="inner">
        <div class="hd center"></div>
        <div class="bd">
            <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
                <?php echo $form->renderHiddenFields(); ?>
                <fieldset class="loginFieldset">
                    <legend><?php echo sfTwitterBootstrap::getProperty('site'); ?></legend>
                    <div class="clearfix <?php echo $form['username']->hasError() ? 'error': '' ?>">
                        <?php echo $form['username']->renderRow() ?>
                    </div>
                    <div class="clearfix <?php echo $form['password']->hasError() ? 'error': '' ?>">
                        <?php echo $form['password']->renderRow() ?>
                    </div>

                    <div class="actions">
                        <input type="submit" class="btn primary" value="sign in" />
                    </div>
                </fieldset>
                </form>
        </div>
    </div>
</div>
```
