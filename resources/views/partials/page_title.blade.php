
@php
$page = Request::route()->getName();
@endphp

@switch($page)
    @case('home')
        Page d'accueil
    @break
    @case('register')
        Création de compte
    @break
    @case('login')
        Connectez-vous
    @break
    @case('createpost')
        Article
    @break
    @case('editpost')
        Article
    @break
    @case('post')
        Article
    @break
    @case('editcomment')
        Commentaire
    @break
    @default
        {{$page}}
@endswitch

