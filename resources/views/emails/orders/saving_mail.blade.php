<x-mail::message>
    
{{-- <x-mail::button :url="''">
Button Text
</x-mail::button>

<x-mail::panel>
This is the panel content.
</x-mail::panel> --}}

<x-mail::table>
    <table style="background-color: #4747A1">
        <th  align="center" style="color: rgb(255, 255, 255)">Reminder</th>
    </table>
    <table>
        <tr>
          <td align="center" style="font-size: 20px">Your saving plan of <b>Beli Skin Free Fire</b> <br>is Rp 250.000-, remaining to reach the target</td>
        </tr>
        <tr>
          <td>
              <div class="w3-light-grey w3-round-xlarge">
                <div class="w3-container w3-purple w3-round-xlarge" style="width:75%">75%</div>
              </div>
          </td>
        </tr>
      </table>

      
</x-mail::table>



Thanks,<br>
FlexiFund
{{-- {{ config('app.name') }} --}}
</x-mail::message>
