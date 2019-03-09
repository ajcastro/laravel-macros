# Laravel Macros

Reusable laravel macros.

# Test Response Macros

### dd

Helpful for inspecting the response and output of your controllers during phpunit testing.

```php
$response = $this->post(...);

$response
    ->dd() // prints the json response or the error response if any.
    ->assertOk()
    ->assertJson(...);
```

### ddO

Similar to `$response->dd()` but it dump the original content instead.

```php
$response = $this->post(...);

$response
    ->ddO() // prints the original content of the response.
    ->assertOk()
    ->assertJson(...);
```


# Query Builder Macros


### toRawSql

Return the mysql raw query. Include the parsed sql bindings. Also available to eloquent model.

```php
DB::table('users')->whereRaw('active = ?', [1])->toRawSql(); // select * from users where active = 1
User::whereRaw('active = ?', [1])->toRawSql(); // select * from users where active = 1
```

### dd

Dd the raw sql. Helpful for debugging in between query method calls.
Enabled in `local` and `testing` environments only because you don't want to `dd` your queries and let other people see it.

```
User::where('active', 1)
    ->dd() // dd here will print "select * from users where active = 1"
    ->whereNotNull('email')
    ->dd() // dd here will print "select * from users where active = 1 and email is not null"
    ->get();
```

### log

For logging mysql queries.

```
User::where('active', 1)
    ->whereNotNull('email')
    ->log() // will log "select * from users where active = 1 and email is not null"
    ->get();
```

# Request Macros

### bool

Cast input to boolean.

```php
$request->input('keep_me_logged_in'); // "false"
$request->bool('keep_me_logged_in'); // false
```

### int

Cast input to integer.

```php
$request->input('quantity'); // "1,000"
$request->int('quantity'); // 1000
```

### float

Cast input to float.

```php
$request->input('price'); // "1,000.50"
$request->float('price'); // 1000.50
```

### Merging the casted input into the request permanently.

```php
$request->merge($request->float(['price', 'cost', 'vat', 'discount']));
```
