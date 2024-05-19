<div class="files">
    <div class="silver-hr"></div>
    <h2 class="files_h2">Файли:</h2><br>
    @foreach($files as $file)
        <div class="news-photo">
            <i class="fa-regular fa-file fa-lg"></i> <a
                href="{{ route('file.download', ['filename' => basename($file->path)]) }}"
                download>{{ basename($file->path) }}</a>
        </div>
    @endforeach
</div>
