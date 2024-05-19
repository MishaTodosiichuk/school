<div class="photos">
    <div class="silver-hr"></div>
    <h2 class="files_h2">Фотографії:</h2><br>
    @foreach($photos as $photo)
        <div class="news-photo">
            <img src="{{url('storage/' . $photo->path)}}" alt="{{$photo->path}}" class="mb-3">
        </div>
    @endforeach
</div>
