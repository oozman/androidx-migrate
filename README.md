# androidx-migrate
A simple PHP script which replaces files with the new AndroidX artifacts and class mappings.

![image](http://limping-planes.surge.sh/img.gif)

## Installation
Run composer install first:
```
  composer install
```

## Usage
To start the script, run this command:
```
  php index.php --root={ABSOLUTE_ROOT_FOLDER_PATH}
```
### Example
```
  php index.php --root="path/to/android/app"
```

If you want to chunk or break it into multiple processes, you can do this:
```
  php index.php --root={ABSOLUTE_ROOT_FOLDER_PATH} --chunks={CHUNK_COUNT} --processor={PROCESS_NO}
```

### Example

If you want to break it into 4 processes. You can do this:
```
  php index.php --root="path/to/android/app" --chunks=4 --processor=1
  php index.php --root="path/to/android/app" --chunks=4 --processor=2
  php index.php --root="path/to/android/app" --chunks=4 --processor=3
  php index.php --root="path/to/android/app" --chunks=4 --processor=4
```

## Parameters
The parameter definitions:

**{ABSOLUTE_ROOT_FOLDER_PATH}** - The absolute path to your root folder.

**{CHUNK_COUNT}** - The number of chunks to break / make.

**{PROCESS_NO}** - The process no. This should be between 1 and {CHUNK_COUNT}.

## More Info
For more info about how to migrate your existing Android app to use the new AndroidX libraries, see [Migrate to AndroidX](https://developer.android.com/topic/libraries/support-library/refactor)

## License
My Mom told be not to miss this before pushing it to the universe.

```text
MIT License

Copyright (c) [2018] [OOZMAN]

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```