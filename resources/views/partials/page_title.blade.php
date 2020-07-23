
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
    @case('userarticles')
        Mes articles
    @break
    @case('usercomments')
        Mes commentaires
    @break
    @case('userarticles_comments')
        Commentaires de mes articles
    @break
    @default
        {{$page}}
@endswitch

