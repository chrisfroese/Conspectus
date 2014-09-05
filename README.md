Conspectus v1.0
==============================

A starting point for crafting living style guides.

![Screenshot](http://bjankord.github.io/Style-Guide-Boilerplate/assets/screenshot-1.jpg)

## Getting Started With Conspectus

### Requirements
**Conspectus** is written in PHP. Make sure your server has PHP installed and configured.

### Download Conspectus
Download the repo from GitHub.
Psst, you can clone it, too. Fork it if you're really cool.

### Upload the files to your web server
Unzip the archive and upload the folder to your web server.
Rename the folder something like, uh, style-guide.
Make sure the folder has the proper permissions. Something like 755 (or, -rwxr-xr-x) should do.

### Edit the config



### Check it out
You should be able to go to `yoursite.com/style-guide/` and see how your live site's CSS affects base elements.
The last step is creating your sites custom patterns/modules.

### Create custom patterns
To create custom patterns like buttons, breadcrumbs, alert messages, etc., create a new .html file and add your HTML markup into the file.

Save the file as `pattern-name.html` into the `markup/patterns` directory inside of your `style-guide` directory.

You should now be able to see the new patterns at `yoursite.com/style-guide/`

### Create personalized documentation
To create personalized documentation for your markup examples, create a new .html file and name it whatever your markup snippet is named.

Save the file as `markup-name.html` into the `doc/base` or `doc/patterns` directory inside of your `style-guide` directory.

For example, if you want to create doc for `markup/patterns/breadcrumbs.html`, create a file called `breadcrumbs.html` and save it into `doc/patterns`.

You should now be able to see the new doc at `yoursite.com/style-guide/`

## Browser Support
I've built **Conspectus** with progressive enhancement in mind to work on a wide range of browsers.

Known supported browsers include:

* Chrome
* Firefox
* Safari
* Opera
* IE6+
* Stock Android Browser (4.0+)
* Chrome for Android
* Firefox for Android
* Opera Mini
* Opera Mobile
* Safari for iOS
* Chrome for iOS

If you come across any bugs, or have any other issues with the boilerplate, please open an issue here on GitHub.


## Additional Resources
[Front-end Style Guides](http://24ways.org/2011/front-end-style-guides/)

[Front-end Style Guide Roundup](https://gimmebar.com/collection/4ecd439c2f0aaad734000022/front-end-styleguides)

[Future-Friendly Style Guides](https://speakerdeck.com/lukebrooker/future-friendly-style-guides)

[HTML KickStart](http://www.99lime.com/elements/)

[Oli.jp Style Guide](http://oli.jp/2011/style-guide/)

[Jeremy Keith's Pattern Primer](http://adactio.com/journal/5028/)

[Paul Robert Llyod's Style Guide](http://www.paulrobertlloyd.com/about/styleguide/)

[Pears](http://pea.rs/)

[Starbucks Style Guide](http://www.starbucks.com/static/reference/styleguide/)

## Credit
Thanks to:

Jeremy Keith for letting me build on top of [Pattern Primer](https://github.com/adactio/Pattern-Primer).

## Contributing to this project

Anyone and everyone is welcome to contribute. Please take a moment to
review the [guidelines for contributing](CONTRIBUTING.md).

* [Bug reports](CONTRIBUTING.md#bugs)
* [Feature requests](CONTRIBUTING.md#features)
* [Pull requests](CONTRIBUTING.md#pull-requests)



## Licensing
**Conspectus** is licensed under the [MIT License](http://en.wikipedia.org/wiki/MIT_License)

Use it, build upon it, make awesome shit with it.
