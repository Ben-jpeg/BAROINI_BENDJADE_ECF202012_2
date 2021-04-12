# MVC = Model Vue Controller;


Ces éléments sont interdépendants. Quand le Model permet la conservation des données (présentes en bdd) 
il permet aussi de protéger l'accès des tables avec de certaines conditions par exemple.
Vue constitue l'affichage du contenu que l'on souhaite présenter comme visible sur le navigateur (html/php). 
Le Controller quant à lui est en relation avec les deux cocnept (Modele et Vue). C'est lui qui contient et 
applique les fonctions codés, destiné à faire fonctionner correctement les fonctionnalités présentes dans Vue,
à l'aide de sa lisaison avec la base de données grace au Model, mais aussi permets de modifier le contenu du Model ou de la Vue.


Laravel possede aussi plusieurs autres fonctionnalité qui permettent une meilleur sécurité comme le CSRF qui sont 
générés automatiquement par le framework, à placer apres l'ouvreture d'un form. 
________________________________________________________________________________________
#CSRF


le @csrf représente des tokens(jetons) qui sont générés par laravel pour chaque sessions active. Il compare le token avec celui 
requis pour la page en question et le valide. Si le token n est pas généré ou pas le meme, laravel affiche une page 
d'erreur (419) pour éviter des attaques csrf (qui eux sont des requettes http envoyé a un utilisateur à 
son insu, lui faisant faire activer des choses malgré lui par ex) .

________________________________________________________________________________________
#Laravel - avis

La documentation laravel est très fourni et très riche, mais semble être aussi très complète et explicative, avec 
beaucoup d'exemple pour chaque concept. La documentation etant complètement en anglais, ca peux devenir difficile
de passer beaucoup de temps dessus, mais est nécéssaire pour bien voir les différents aspect du fonctionnement du
framewokr et son écriture spécifique (genre ex: Auth::table(user)
                                                ->join(id, user_id)  )
                                                
 Il est plus facile aussi d'utiliser laravel lorsque l'on comprend au fur et a mesure les concept de 
 model conceptuel de données ou modele logique de donnees, ca permet une vue général du système et personnellement
 de pouvoir vérifier mon code en cas d'erreur et y remédier plus rapidement et facilement.
                                                
