<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">

        <title>{{ $post->title }}</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-blue.min.css">
        <link rel="stylesheet" href="{!! Theme::asset('css/style.css') !!}">
    </head>
    <body>
        <div class="demo-blog demo-blog--blogpost mdl-layout mdl-js-layout has-drawer is-upgraded">
            <main class="mdl-layout__content">
                <div class="demo-back">
                    <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" href="{{ URL::to('/') }}">
                        <i class="material-icons" role="presentation">home</i>
                    </a>
                    <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon"
                       href="{{ URL::previous() }}" title="go back" role="button">
                        <i class="material-icons" role="presentation">arrow_back</i>
                    </a>
                </div>
                <div class="demo-blog__posts mdl-grid">
                    <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
                        <div class="mdl-card__media mdl-color-text--grey-50">
                            <h3>{{ $post->title }}</h3>
                        </div>
                        <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
                            <div class="minilogo"></div>
                            <div>
                                <strong>{{ dd($post->author) }}</strong>
                                <span>2 days ago</span>
                            </div>
                            <div class="section-spacer"></div>
                            <div class="meta__favorites">
                                425 <i class="material-icons" role="presentation">favorite</i>
                                <span class="visuallyhidden">favorites</span>
                            </div>
                            <div>
                                <i class="material-icons" role="presentation">bookmark</i>
                                <span class="visuallyhidden">bookmark</span>
                            </div>
                            <div>
                                <i class="material-icons" role="presentation">share</i>
                                <span class="visuallyhidden">share</span>
                            </div>
                        </div>
                        <div class="mdl-color-text--grey-700 mdl-card__supporting-text">
                            <p>
                                Excepteur reprehenderit sint exercitation ipsum consequat qui sit id velit elit. Velit
                                anim eiusmod labore sit amet. Voluptate voluptate irure occaecat deserunt incididunt
                                esse in. Sunt velit aliquip sunt elit ex nulla reprehenderit qui ut eiusmod ipsum do.
                                Duis veniam reprehenderit laborum occaecat id proident nulla veniam. Duis enim deserunt
                                voluptate aute veniam sint pariatur exercitation. Irure mollit est sit labore est
                                deserunt pariatur duis aute laboris cupidatat. Consectetur consequat esse est sit veniam
                                adipisicing ipsum enim irure.
                            </p>
                            <p>
                                Qui ullamco consectetur aute fugiat officia ullamco proident Lorem ad irure. Sint eu ut
                                consectetur ut esse veniam laboris adipisicing aliquip minim anim labore commodo.
                                Incididunt eu enim enim ipsum Lorem commodo tempor duis eu ullamco tempor elit occaecat
                                sit. Culpa eu sit voluptate ullamco ad irure. Anim commodo aliquip cillum ea nostrud
                                commodo id culpa eu irure ut proident. Incididunt cillum excepteur incididunt mollit
                                exercitation fugiat in. Magna irure laborum amet non ullamco aliqua eu. Aliquip
                                adipisicing dolore irure culpa aute enim. Ullamco quis eiusmod ipsum laboris quis qui.
                            </p>
                            <p>
                                Cillum ullamco eu cupidatat excepteur Lorem minim sint quis officia irure irure sint
                                fugiat nostrud. Pariatur Lorem irure excepteur Lorem non irure ea fugiat adipisicing
                                esse nisi ullamco proident sint. Consectetur qui quis cillum occaecat ullamco veniam et
                                Lorem cupidatat pariatur. Labore officia ex aliqua et occaecat velit dolor deserunt
                                minim velit mollit irure. Cillum cupidatat enim officia non velit officia labore. Ut
                                esse nisi voluptate et deserunt enim laborum qui magna sint sunt cillum. Id exercitation
                                labore sint ea labore adipisicing deserunt enim commodo consectetur reprehenderit enim.
                                Est anim nostrud quis non fugiat duis cillum. Aliquip enim officia ad commodo id.
                            </p>
                        </div>
                    </div>
                    <nav class="demo-nav mdl-color-text--grey-50 mdl-cell mdl-cell--12-col">
                        <a href="index.html" class="demo-nav__button">
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white mdl-color-text--grey-900"
                                    role="presentation">
                                <i class="material-icons">arrow_back</i>
                            </button>
                            Newer
                        </a>
                        <div class="section-spacer"></div>
                        <a href="index.html" class="demo-nav__button">
                            Older
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white mdl-color-text--grey-900"
                                    role="presentation">
                                <i class="material-icons">arrow_forward</i>
                            </button>
                        </a>
                    </nav>
                </div>
                <footer class="mdl-mini-footer">
                    <div class="mdl-mini-footer--left-section">
                        <button class="mdl-mini-footer--social-btn social-btn social-btn__twitter">
                            <span class="visuallyhidden">Twitter</span>
                        </button>
                        <button class="mdl-mini-footer--social-btn social-btn social-btn__blogger">
                            <span class="visuallyhidden">Facebook</span>
                        </button>
                        <button class="mdl-mini-footer--social-btn social-btn social-btn__gplus">
                            <span class="visuallyhidden">Google Plus</span>
                        </button>
                    </div>
                    <div class="mdl-mini-footer--right-section">
                        <button class="mdl-mini-footer--social-btn social-btn__share">
                            <i class="material-icons" role="presentation">share</i>
                            <span class="visuallyhidden">share</span>
                        </button>
                    </div>
                </footer>
            </main>
            <div class="mdl-layout__obfuscator"></div>
        </div>
        <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    </body>
</html>