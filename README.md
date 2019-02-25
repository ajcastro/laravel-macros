# Laravel Macros

Reusable laravel macros.

# Request Macros

## bool

Cast input to boolean.

```php
$request->input('keep_me_logged_in'); // "false"
$request->bool('keep_me_logged_in'); // false
```

## int

Cast input to integer.

```php
$request->input('quantity'); // "1,000"
$request->int('quantity'); // 1000
```

## float

Cast input to float.

```php
$request->input('price'); // "1,000.50"
$request->float('price'); // 1000.50
```

## Merging the casted input into the request permanently.

```php
$request->merge($request->float(['price', 'cost', 'vat', 'discount']));
```

# Query Builder Macros

Enabled in `local` and `testing` environments only.

## toRawSql

Return the mysql raw query. Include the parsed sql bindings. Also available to eloquent model.

```php
DB::table('users')->whereRaw('active = ?', [1])->toRawSql(); // select * from users where active = 1
User::whereRaw('active = ?', [1])->toRawSql(); // select * from users where active = 1
```

## dd

Dd the raw sql. Helpful for debugging in between query method calls.

```
User::where('active', 1)
    ->dd() // dd here will print "select * from users where active = 1"
    ->whereNotNull('email')
    ->dd() // dd here will print "select * from users where active = 1 and email is not null"
    ->get();
```

## log

For logging mysql queries.

```
User::where('active', 1)
    ->whereNotNull('email')
    ->log() // will log "select * from users where active = 1 and email is not null"
    ->get();
```
