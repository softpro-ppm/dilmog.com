// ... existing code ...
@if(isset($item) && $item->type == 'parcel')
    @if(isset($item->parcel) && isset($item->parcel->recipientName))<br>
        @if(isset($item->parcel->parcelType) && isset($item->parcel->parcelType->title))
            {{ $item->parcel->parcelType->title }}
        @endif
    @endif
@endif
// ... existing code ...