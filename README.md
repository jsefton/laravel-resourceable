# Laravel Resourceabe

This package allows you to load instances of any model by a unique reference. The purpose is to allow dynamic passing around of data without not needing to know the exact model throughout the codebase as it will be stored in the databse attched with its ID.

It also allows creating relationships from a model to any other model without having to define the specific relationship.

## Resourceable Trait

The trait can be attached to any eloquent model and gives access to the below methods which powers resourceable.

### Resource Reference

This method is how you convert the current instance into a Resourceable string.

The resource reference is used throughout Endor as a way to easily identify the item when passing through different features.
The resourceReference is made up of the class name and the ID of the current item.
An example of this is:
```php
App\Post::204
```
Usage:
```php
// If we have an App\Post instance with record ID 204 loaded.
$resource = $post->resourceReference();
// returns App\Post::204
```


### UUID
A uuid can be generated to be a simple hash string based on the resource. This uses the `resourceReference` to make it unique. The UUID is available as an
attributes against the model:
```php
$post->uuid;
```
For some features you might need a uuid for the resource and then group it with additional postfixes. This can be done using the uuid as a function and will return a uuid for the individual resource and the passed in `key`.
```php
$postt->uuid('<string>');
```

## Resource Class

### Load

You can call the load method against the main Resource class that will use the unique resourceReference and load the instance of the target class with the data record included.

If we have a model for `App\Post` and a record ID of 1, then we can load that through resource such as:

```php
$post = Resource::load('App\Post::1');
// returns an instance of App\Post with record ID 1 loaded.
```


## TODO

- Adding in relationship methods into package from split out of core.
