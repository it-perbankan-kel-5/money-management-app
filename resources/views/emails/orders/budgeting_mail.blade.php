<x-mail::message>
    
{{-- <x-mail::button :url="''">
Button Text
</x-mail::button>

<x-mail::panel>
This is the panel content.
</x-mail::panel> --}}

<x-mail::table>
    <table>
        <th  align="center" style="color: rgb(194, 0, 0)">Warning!!!</th>
    </table>
    <table>
        <tr>
          <td align="left" style="font-size: 20px"><p style="font-size: 20px">Your Budget Eat & Drink has reached 65% of the limit. <br> Rp 300.000-, Remaining.</p></td>
          <td align="right">
            <div role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="--value:65">65%</div>
          </td>
        </tr>
      </table>

      
</x-mail::table>

<div class="w3-light-grey w3-round">
        <div class="w3-container w3-round w3-blue" style="width:25%">25%</div>
      </div>

Thanks,<br>
FlexiFund
{{-- {{ config('app.name') }} --}}
</x-mail::message>
