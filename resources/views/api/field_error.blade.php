<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<label for="rn"></label>
<input type="text" name="rekening_number"
       class="@error('rekening_number') is-invalid @enderror"
       id="rn">
{{-- check if error has rekening_number --}}
@error('rekening_number')
{{-- costume error message --}}
<span class="error text-danger">Please provide valid rekening number</span>
@enderror
<label for="rd"></label>
<input type="text" name="rekening_description"
       class=""
       id="rd">

<label for="ra"></label>
<input type="text" name="rekening_alias"
       class=""
       id="ra">

<label for="rt"></label>
<input type="text" name="rekening_type"
       class=""
       id="rt">
{{-- check if error has rekening_type --}}
@error('rekening_type')
{{-- costume error message --}}
<span class="error text-danger">Please provide valid rekening type</span>
@enderror
</body>

</html>
