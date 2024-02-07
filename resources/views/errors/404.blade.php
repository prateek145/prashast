<style>
    * {
        padding: 0;
        margin: 0;
        background: #f0f0f0;
    }

    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .btn1 {
        text-align: center;
    }

    .text {
        text-align: center;
        font-size: 20px;
        margin-bottom: 40px;
    }

    .error-text {
        text-align: center;
        padding: 20px;
        font-family: Cursive;
    }

    .error {
        font-family: 'Roboto', sans-serif;
        font-size: 1.5rem;
        text-decoration: none;
        padding: 15px;
        background: #6200ee;
        color: #fff;
        border-radius: 10px;
    }
</style>

<title>Page Not Found</title>
<img src="https://i.ibb.co/W6tgcKQ/softcodeon.gif">
<h1 class="error-text">Whoops, We can't seem to find the resource you're looking for.</h1>
<p class="text">Please check that the Web site address is spelled correctly.Or,</p>
<div class="btn1">
    <a class="error" href="{{route('frontend.home')}}">Go to Homepage</a>
    <a class="error" href="{{route('login')}}">Go to LoginPage</a>
</div>