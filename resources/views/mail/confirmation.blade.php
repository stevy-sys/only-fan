<h1>Bonjour {{ $user->name }}</h1>

<p>Bienvenue dans notre communauter</p> 

<a href="{{env('BASE').'/confirm-compte?encrypt='.$user->encrypt}}">Confirmer votre identite</a>