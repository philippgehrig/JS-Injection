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

Looking at the developer tools (Console & ) in your browser you can first try to give the funtion 3 parameters by inserting
```
","
```
You can see in the emelemts-section of your browser that the function has 3 elements now.

Whe can now use this feature to try thing like an alert:
```
",location="javascript:alert(1)
```
or alternativly even a redirect:
```
",window.location="https://twitter.com/thisphilipp
```

## Important to add
I know that most xss forms have measures against these kind of injections and this is purely for educational purposes.

## Credits

This was not my idea, but much rather I tried understanding a [tweet](https://twitter.com/Rhynorater/status/1696862832841916679) by Justin Gardner. 
