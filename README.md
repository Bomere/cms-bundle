# CMS Bundle for Symfony2
#### EARLY ALPHA! --- Work in Progress!

## Status
#### Done
 - German Translation
 - Show menus in Twig-Templates
 - Menu-, MenuItem-, Page-Entity
 - Sonata Admins

### Open
 - English Translation
 - Multi-Language DB Content
 - Make menu templates more dynamic
 - Stuff... :)

## Installation
``` bash
$ composer require --dev devtronic/cms-bundle
```

```php
<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Devtronic\CmsBundle\CmsBundle(),
        );
        // ...
        return $bundles;
    }
    // ...
}

```
## Configuration
```yml
# app/config/routing.yml
devtronic_cms_bundle:
    resource: "@CmsBundle/Controller/"
    type:     annotation
    prefix:   /cms # OR WHAT EVER YOU WANT (links goes example.com/cms/{page-slug})    
```
## Usage
#### Show a menu in twig-template
```twig
{# anything.html.twig #}
{{ cms_menu("MENU SLUG GOES HERE") | raw }}

{# or with a custom Menu Template #}
{{ cms_menu("MENU SLUG GOES HERE", "AnyBundle:Path:menu_template.html.twig") | raw }}
```
### Templates
#### Menu Template
```twig
{# app/Resources/CmsBundle/views/menu.html.twig #}
{# Types: 0: CMS Page, 1: Hyperlink, 2: Route #}

{# Top-Level Menu Entries #}
{% if menu.items is defined %}
    <ul class="nav navbar-nav">
        {% for item in menu.items %}
            {% if item.parentItem is null %}
                    {% if item.subItems | length %}
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ item.title }} <span class="caret"></span></a>
                            {% include 'CmsBundle::menu.html.twig' with {'menu': item} %}
                        </li>
                    {% else %}
                        <li>
                            {%  if item.type == 0 %}
                                <a href="{{ path('cms_page', {'slug': item.targetPage.slug}) }}">{{ item.title }}</a>
                            {% elseif item.type == 2 %}
                                <a href="{{ path(item.targetUrl) }}">{{ item.title }}</a>
                            {% else %}
                                <a href="{{ item.targetUrl }}">{{ item.title }}</a>
                            {% endif %}
                        </li>
                    {% endif %}
            {% endif %}
        {% endfor %}
    </ul>
{# Sub-Entries #}
{% elseif menu.subItems is defined %}
    <ul class="dropdown-menu">
        {% for item in menu.subItems %}
            {% if item.subItems | length %}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ item.title }} <span class="caret"></span></a>
                    {% include 'CmsBundle::menu.html.twig' with {'menu': item} %}
                </li>
            {% else %}
                <li>
                    {%  if item.type == 0 %}
                        <a href="{{ path('cms_page', {'slug': item.targetPage.slug}) }}">{{ item.title }}</a>
                    {% elseif item.type == 2 %}
                        <a href="{{ path(item.targetUrl) }}">{{ item.title }}</a>
                    {% else %}
                        <a href="{{ item.targetUrl }}">{{ item.title }}</a>
                    {% endif %}
                </li>
            {% endif %}
        {% endfor %}
    </ul>
{% endif %}
```

#### Page Template
```twig
{# app/Resources/CmsBundle/views/Page/page.html.twig #}

{% extends "::base.html.twig" %}

{% block title %}{{ page.title }}{% endblock %}

{% block body %}
    <h1>{{ page.title }}</h1>
    {{ page.content | raw }}
{% endblock %}

```

## How to contribute?
> Translate the Bundle (send ``messages.LOCALE.xlf`` and your user-/name to <admin@developer-heaven.de>

## Translation status 
| Language      | Translator                                        | Status |
| ------------- | :-----------------------------------------------: | ------:|
| German        | [Devtronic](mailto:admin@developer-heaven.de)     |   100% |
| English       |   ---                                             |     0% |