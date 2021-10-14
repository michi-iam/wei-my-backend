# Simple CMS for laravel-apps

## install
* composer install
* setup env and migrate
* create a user from the console **or** refer to ***config/fortify*** ***//Features::registration(),***
* either way set $user->is_active = true;
* login, done

## urls
* admin: /dashboard

## categories
* default categories are created in **Models\Backend\BusinessHours**, when no categories exist yet.
* If you change the category names, you have to take a look at the includes in the view.
* in Models\Backend\BusinessHours there is also an instance of Post-Model created, which is used to show businesshours.




## images
* images can be uploaded from the frontend, **but** depending on your server-access-permissions/db-settings, that is not always possible. So I decided to upload static files in ***public\images*** and then create by running:
    * use App\Models\Backend\Image;
    * $files = Storage::disk("staticimages")->allfiles();
    * foreach($files as $file){ $img = new Image(); $img->title="titel"; $img->alt="alt"; $img->src=$file; $img->save();  }
* image src in view is: src="{{ URL::to('/') }}{{ '/images/'.$img->src }}"
* you have to edit the path, if you want to use images from user upload. 

## views
* layout: ***backend/layouts/main.blade.php***
* admin-stuff: ***backend/***
* visible: ***frontend/*** - when you put the rout out of the Route::middleware-auth-group in ***routes/web***

## miscellaneous
* features like register in ***config/fortify*** are commented out


## TODO
* image path for both, static files and user uploads
* admin-user groups
