@include('layouts.header')

    <div class="show">
        <h1>Oya!!! Marvel characters are here below</h1>
    </div>

    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="file" name="import_file" />
      <button class="btn btn-primary">Assignment(2) Import XLS File</button>
    </form>

    <form action="{{route('search')}}" action="GET">
        <div class="form-group" style="width: 80%;margin:0 auto;">
            <input type="text" 
            name="name" 
            class="form-control" 
            style="width: 80%;" 
            placeholder="Enter name to search"
            value="<?= $_GET['name'] ?? '' ?>">            
            <button class="btn btn-light btn-sm" type="submit" style="margin-left: 5px;">Search</button>
        </div>
    </form>
   
    <div class='row '>     
            @foreach ($result as $r)
                <div class='col-lg-3'>
                    <h4>{{$r->name}}</h4>
                    <?= '<img src="'.$r->thumbnail->path.'.'.$r->thumbnail->extension.'" class="img"/>'; ?>
                    <br/>
                    <a href="{{ route('character', $r->id)}}" class="btn btn-danger btn-sm">View more</a>
                </div>
            @endforeach 
    </div>
    <div class="buttons">
        @if($offset != 0)
            <a href="{{route('index', $offset - 20)}}" class="btn btn-light">Previous</a>
        @else 
            <a href="{{route('index', $offset - 20)}}" class=""></a>
        @endif

        @if($total >= $offset + 20)
            <a href="{{route('index', $offset + 20)}}" class="btn btn-light">Next</a>
        @endif
    </div>
</body>
</html>
