<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>HTTP 500 - Internal Server Error</title>
        <link rel="stylesheet" href="/css/errors/error.css">
    </head>
    <body>
        <div class="overlay"></div>
        <div class="terminal">
            <h1>Error <span class="errorcode">500</span></h1>
            <p class="output">The server encounted an internail error or misconfiguration and was unable to complete your request</p>
            <p class="output">Please contact the server administrator to report this error</p>
            <p class="output">More information about this error may be available in the server error log</p>
            <p class="output">Please <a href="{{ route('pages.index') }}">Go Home</a> or <a href="{{ redirect()->back()->getTargetUrl() }}">Go Back</a></p>
            <p class="output">Connection Terminated</p>
        </div>
    </body>
</html>