@php
if ($type === 'shops') {
    $path = '/shops/';
}
if ($type === 'products') {
    $path = '/products/';
}
@endphp

<div>
    @if(empty($filename))
        <img src="{{ asset('images/no_image.jpg') }}">
    @else
        <img src="{{ Storage::disk('s3')->url( $path . $filename) }}">
    @endif
</div>
