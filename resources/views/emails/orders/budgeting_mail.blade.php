<x-mail::message>
    
{{-- <x-mail::button :url="''">
Button Text
</x-mail::button>

<x-mail::panel>
This is the panel content.
</x-mail::panel> --}}

<x-mail::table>
    <table style="background-color: #4747A1">
        <th  align="center" style="color: rgb(255, 251, 0)">Warning!!!</th>
    </table>
    <table>
        <tr>
          <td align="left" style="font-size: 20px"><p style="font-size: 20px">Your <b>Budget Eat & Drink<b> has reached 65% of the limit. <br> Rp 300.000-, Remaining.</p></td>
          <td align="right">
            <div role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="--value:65">65%</div>
          </td>
        </tr>
      </table>

      
</x-mail::table>



Thanks,<br>
FlexiFund
{{-- {{ config('app.name') }} --}}
</x-mail::message>
