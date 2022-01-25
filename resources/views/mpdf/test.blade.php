<!DOCTYPE html>
<html>
<head>
    <!-- <meta charset="utf-8"> -->
    <title>Pagebreak - Test</title>
    <style>
        /* optional styles */
        @page {
            /* size: auto; */
            margin-top: 4cm;
            margin-header: 2cm;
            margin-footer: 2cm;
            header: page-header;
            footer: page-footer;
        }
    </style>
</head>
<body>
<!-- optional -->
<htmlpageheader name="page-header">
    Your Header Content
</htmlpageheader>
<!-- optional -->
<htmlpagefooter name="page-footer">
    Your Footer Content
</htmlpagefooter>
{{ $visit }}
<!-- pagebreak -->
{{--<h1>Hola Mundo 1</h1>--}}
{{--<pagebreak />--}}
{{--<h1>Hola Mundo 2</h1>--}}
{{--<p>this is a example</p>--}}
{{--<pagebreak />--}}
{{--<h1>Hola Mundo 3</h1>--}}
{{--<p>Esto es un ejemplo</p>--}}
{{--<pagebreak />--}}
{{--<h1>Hola Mundo 4</h1>--}}
{{--<p>this is a example</p>--}}
</body>
</html>