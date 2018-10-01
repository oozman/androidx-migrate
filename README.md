# androidx-migrate
A simple PHP script which replaces files with the new AndroidX artifacts and class mappings.

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