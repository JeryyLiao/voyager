<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Max and his little friends">
  <meta name="description" content="menu and sub menu from Voyager">
  <meta name="color-scheme" content="dark">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dashboard</title>
</head>
<body>
  <div class="dashboard">
<ul>
  @foreach($items as $menu_item)
  <li><a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li>
    @if ($menu_item->children)
      @foreach ($menu_item->children as $sub_menu_item)
         <ul>
          <li>
            <a href="{{ $sub_menu_item->link() }}">{{ $sub_menu_item->title }}</a>
          </li>
        </ul>
      @endforeach
    @endif
  @endforeach

</ul>

<style>
.dashboard{
margin-right: 80%;
outline:1px solid;
text-align:left;
}
</style>
</body>
</html>
