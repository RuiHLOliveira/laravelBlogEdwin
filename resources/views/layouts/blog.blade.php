<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/886bf3cc12.js"></script>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/blogstyle.css') }}" rel="stylesheet">
</head>
<style>
.blogBoxPadding {
    box-sizing: border-box;
    padding: 15px;
}
.leftBar {
    /* border-right: 1px solid #00000055; */
    /* height: 100vh; */
    text-align: center;
}
.myLinkContainer {
    display: flex;
    flex-direction: column;

    padding: 15px 0px;
}
.myLinkContainer > a {
    display: inline-block;
    margin: 5px 0;
    font-weight: bold;
    font-size: 1.2em;
}
.iconContainer {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    margin: 20px 0;
}
.iconContainer > a {
    margin: 0 10px;
    font-size: 0.9em;
}
.searchContainer input[type=text] {
    border: 1px solid var(--textColor);
    border-radius: 20px;
    padding: 10px;
}
.searchContainer i {
    color: var(--textColor);
}
</style>
<body class="">

    <div class="flexRow">
        {{-- header --}}
        <header class="colXl12 colLg12 colMd12 colSm12 colXs12 textCenter">
            <h1><a class="link" href="">Blog Name or Logo</a></h1>
        </header>
    </div>

    <div class="flexRow">
        {{-- navbar --}}
        <nav class="colXl12 colLg12 colMd12 colSm12 colXs12 textCenter">
            @foreach ($categories as $category)
                <a class="btn btnLight" href="{{ route('categories.show',['category_id' => $category->id]) }}">{{ $category->name }}</a>
            @endforeach
        </nav>
    </div>

    <div class="flexRow">
        {{-- right sidebar --}}
        <div class="colXs12 colSm12 colMd12 colLg3 colXl3-fixed blogBoxPadding leftBar">
            <aside>
                <div class="myLinkContainer">
                    <a class="link" href="{{ route('posts.index') }}">blog</a>
                    <a class="link" href="">newsletter</a>
                    <a class="link" href="">contato</a>
                    <a class="link" href="">me apoie</a>
                    <a class="link" href="">sobre</a>
                </div>
                <div class="iconContainer">
                    <a class="link" href="">
                        <i class="fab fa-2x fa-facebook-square"></i>
                    </a>
                    <a class="link" href="">
                        <i class="fab fa-2x fa-youtube"></i>
                    </a>
                    <a class="link" href="">
                        <i class="fab fa-2x fa-twitter"></i>
                    </a>
                    <a class="link" href="">
                        <i class="fab fa-2x fa-instagram"></i>
                    </a>
                </div>
                <div class="searchContainer">
                    <input type="text" name="" id="" placeholder="search..."> <i class='fas fa-search'></i>
                </div>
            </aside>
        </div>
            
        {{-- content --}}
        <div class="colXs12 colSm12 colMd12 colLg9 colXl12-fixedComplement blogBoxPadding">
            @yield('content')
        </div>
    </div>

</body>
</html>
