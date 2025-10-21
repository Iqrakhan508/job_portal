 <!-- all element of array print -->
 <ul>
        @foreach($colors as $key => $value)
            <li><strong>{{ $key }}</strong> => {{ $value }}</li>
        @endforeach
    </ul>


<!-- single elemet of array print  -->
<p>Second Color: {{ $colors['second'] }}</p>  {{-- Output: green --}}