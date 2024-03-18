<h1>@yield('title')</h1>
<div class="hr">
    <div class="orange-hr"></div>
    <div class="silver-hr"></div>
</div>
<br>
<div class="sort-block">
    <form method="get" action="">
        Дата: від
        <input type="date" class="form-control" name="date_from" value="">
        до
        <input type="date" class="form-control" name="date_to" value="">
        <button type="submit" name="gAction" value="date_filter" class="btn btn-warning" style="margin-bottom: 5px;">Фільтрувати</button>
        <input class="btn btn-primary" style="margin-bottom: 5px;" type="reset" value="Скинути">
    </form>
</div>
