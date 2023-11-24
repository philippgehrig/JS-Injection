 # JavaScript-Injection 
 
Today I build an php form that uses the fact that JavaScript functions can be called with more parameters than the function actually has.   
  
  
## Setup
You need to install php for this to work. It doesn't really matter how, however I recomend usind brew:
```
$ brew install php
```
After installing php, you will have to start the server:
```php
php -S 0.0.0.0:[port]
```
You can now connect to http://localhost:[port] to play around.

## Injection

Looking at the developer tools (Console & ) in your browser you can first try to give the function 3 parameters by inserting
```
","
```
You can see in the elements-section of your browser that the function has 3 elements now.

When can now use this feature to try thing like an alert:
```
",location="javascript:alert(1)
```
or alternativly even a redirect:
```
",window.location="https://twitter.com/thisphilipp
```

### Injection without / ( [ ] ) '

To try this, you will need to uncomment line 8:
```php
$xss = preg_replace('/([\(\)`\'])/','',$xss);
```
This will replace / ( [ ] ) ' with an empty char so we don't cheat ourselves.

Fortunately we can use ASCII-Codes for the () which work the same way but won't get replaced.

```
( => \x28 
) => \x29
```
Using that, we can now use our alert-injection:
```
",location="javascript:alert\x281\x29
```

## Important to add
I know that most xss forms have measures against these kind of injections and this is purely for educational purposes.

## Credits

This was not my idea, but much rather I tried understanding a [tweet](https://twitter.com/Rhynorater/status/1696862832841916679) by Justin Gardner and some things I learned during a Web Engineering Class at my University. 
