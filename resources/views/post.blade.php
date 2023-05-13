@foreach ($post as $item)
<h1>{{$item->title}}</h1>
    @foreach($item->comment as $key)
        <p>{{$key->ctitle}}</p>
    @endforeach
    
@endforeach