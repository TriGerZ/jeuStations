L'idée est simple : un plan du métro, avec les lignes, mais sans les noms de station sert de fond de jeu.
Le jeu pose ensuite une série de questions successives : à chaque étape, il pointe une station de métro, et le joueur doit taper le nom de la station concernée. A chaque question une requête envoie la réponse du joueur au serveur, et récupèrent la question suivante.
Au bout de 10 questions un écran de résultat s'affiche. Le fond de carte sert alors à placer la correction de toutes les questions, en distinguant les bonnes des mauvaises réponses.
Pour être efficace, il ne faut pas recharger le fond de jeu à chaque fois, et il faut que le jeu dessine sur ce fond pour montrer la station à deviner. Tous les échanges avec le serveur, et la programmation du site se font en AJAX.
La solution préconisée pour dessiner est l'utilisation de Canvas 2D.
Pour les données, la ratp fournit sur son site un jeu de données avec les coordonnées géographiques de chaque station, un nom et un id, et aussi une table avec les coordonnées de chaque station dans le plan et l'id. Il est fortement conseillé de les utiliser !
L'utilisation d'un sgbd est interdite, vous devez stocker les données du jeu en utilisant des fichiers que vous fournirez. Vous pouvez utiliser les fichiers fournis par la RATP, ceux que je vous envoie, ou bien les adapter pour vous simplifier la vie. En tout
cas la création du jeu nécessite sans doute un calibrage de votre part pour l'utilisation des coordonnées.
Les stations à deviner sont tirées au sort à chaque fois.
L'interface et le confort de jeu sont importants.
Le serveur vérifie les réponses et compte les points. On ne doit pas pouvoir tricher en faisant des requêtes au serveur. En particulier l'écran de résultat ne doit pouvoir être obtenu que par une partie complète et correspondre à une réalité, c'est important.
Pour commencez, ne vous mettez pas à Canvas mais réfléchissez à l'architecture générale de votre programme et écrivez les scripts js et php qui serviront au jeu. Pour mercredi, commencez à regarder Canvas (vous avez juste besoin de dessiner une image de fond, puis de dessiner et effacer par dessus).
Prolongements possibles
1) Un mode de jeu « facile » pour permettre de s'entraîner en proposant à chaque fois 3 réponses possible, la sélection se fait alors en cliquant dessus.
2) Le serveur prend des inscriptions et conserve les scores.
3) Le jeu à l'envers l'utilisateur : doit cliquer a peu près au bon endroit.
4) Un timer oblige à répondre vite.
5) Le jeu commence à charger la question suivante pendant que l'utilisateur répond. 6) Le chargement de la question suivante pendant que l'utilisateur joue à une question.