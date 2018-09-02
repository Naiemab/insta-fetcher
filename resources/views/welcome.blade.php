@extends('layouts.app')

@section('css')

    <style>
        .icon {
            display: flex;
            justify-content: center;
            align-content: center;
        }
    </style>

@endsection

@section('content')
    <div class="container-fluid col-xs-12 col-md-12 col-lg-12 ">
        <p class="serif text text-muted" style="font-size: 60px" align="center"><b>insta Fetcher</b></p>
        <p class="serif text text-primary" style="font-size: 20px" align="center"><b>A Instagram Service To Provide
                Media With Specific Tag</b></p><br><br><br><br>
        <p class="serif text text-success" style="font-size: 30px" align="center"><b>Contact Us With</b></p>
        <div class="col-xs-12 col-md-12 col-lg-12 icon hidden-xs">
            <a href="mailto:developfetcher@gmail.com"><i class="fa fa-envelope"
                                                         style="font-size:48px;color: springgreen;"></i></a>
            <a href="http://gitlab.hinzaco.com/open-source/insta-fetcher"><i class="fa fa-gitlab"
                                                                             style="font-size:48px; margin-left: 20px; color: darkorange;"></i></a>
            <a href="https://www.instagram.com/fetcher_developer/"><i class="fa fa-instagram"
                                                                      style="font-size:48px; margin-left: 20px; color: #cc0085;"></i></a>
            <a href="https://www.linkedin.com/in/naiem-abdollahi-8b8224167/"><i class="fa fa-linkedin-square"
                                                                                style="font-size:48px; margin-left: 20px; color: #4875B4;"></i></a>
            <a href="https://twitter.com/Naiem13245256"><i class="fa fa-twitter"
                                                           style="font-size:48px; margin-left: 20px; color: #33CCFF;"></i></a>
            <a href="https://github.com/Naiemab/insta-fetcher"><i class="fa fa-github"
                                                                  style="font-size:48px; margin-left: 20px; color: black;"></i></a>
        </div>

        <div class="col-xs-12 icon hidden-md hidden-lg hidden-sm">
            <a href="mailto:developfetcher@gmail.com"><i class="fa fa-envelope"
                                                         style="font-size:48px;color: springgreen;"></i></a>
            <a href="http://gitlab.hinzaco.com/open-source/insta-fetcher"><i class="fa fa-gitlab"
                                                                             style="font-size:48px; margin-left: 20px; color: darkorange;"></i></a>
            <a href="https://www.instagram.com/fetcher_developer/"><i class="fa fa-instagram"
                                                                      style="font-size:48px; margin-left: 20px; color: #cc0085;"></i></a>
        </div>
        <div class="col-xs-12 icon hidden-md hidden-lg hidden-sm">
            <a href="https://www.linkedin.com/in/naiem-abdollahi-8b8224167/"><i class="fa fa-linkedin-square"
                                                                                style="font-size:48px; margin-left: 20px; color: #4875B4;"></i></a>
            <a href="https://twitter.com/Naiem13245256"><i class="fa fa-twitter"
                                                           style="font-size:48px; margin-left: 20px; color: #33CCFF;"></i></a>
            <a href="https://github.com/Naiemab/insta-fetcher"><i class="fa fa-github"
                                                                  style="font-size:48px; margin-left: 20px; color: black;"></i></a>
        </div>
    </div>
@endsection
