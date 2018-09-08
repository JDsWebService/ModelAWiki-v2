<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>HTTP 403 - Forbidden</title>
        <link rel="stylesheet" href="/css/errors/error.css">
    </head>
    <body>
        <div class="overlay"></div>
        <div class="terminal">
            <h1>Error <span class="errorcode">403</span></h1>
            <p class="output">You do not have permission to access this page</p>
            <p class="output">Please <a href="{{ route('pages.index') }}">Go Home</a> or <a href="{{ redirect()->back()->getTargetUrl() }}">Go Back</a></p>
            <p class="output">Connection Terminated</p>
        </div>
    </body>
</html>