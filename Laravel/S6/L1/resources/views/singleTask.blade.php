<!DOCTYPE html>
<html>
<head>
    <title>New View</title>
</head>
<body>
    <h1>Task {{ $id }}</h1>
    @switch($id)
        @case(1)
            <p>Complete the project</p>
            @break
        @case(2)
            <p>Write documentation</p>
            @break
        @case(3)
            <p>Test functionality</p>
            @break
        @default
            <p>Description not available</p>
    @endswitch
    <h2>Status</h2>
    @switch($status)
        @case(0)
            <p>not started</p>
            @break
        @case(1)
            <p>in progress</p>
            @break
        @case(2)
            <p>done</p>
            @break
        @default
            <p>Description not available</p>
    @endswitch
</body>
</html>