@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;" >
@if (trim($slot) === 'Laravel')
<img src="public\assets\images\FlexiFund.png" class="logo" alt="FlexiFund">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
