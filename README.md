Generators-Views
================

This package provides complete CRUD views for Way/Generators.

##Installation
1. Add "way/generators": "2.*" to your composer.json file (this is only required if you haven't installed it yet)
2. composer update
3. Add 'Way\Generators\GeneratorsServiceProvider' to the providers in app/config/app.php
4. php artisan  generate:publish-templates 
5. cd app/templates
6. rm -rf *
7. git clone git@github.com:wmbetts/Generators-Views.git .
8. Move every directory, but the scaffolding directory to the public directory
9. Move BaseModel.php to app/models
10. Move layout.blade.php to app/views
11. Generate the scafoldding with artisan.
12. Make your model extend BaseModel.
13. Done!



LICENSE
=======
The MIT License (MIT)

Copyright (c) 2013 - Vincent Gabriel

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
