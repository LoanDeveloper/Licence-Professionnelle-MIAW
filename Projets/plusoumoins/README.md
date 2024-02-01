# Hackathon React 2024

Bienvenue sur le *starter code* de ce hackathon React 2024 !

## Le sujet

Dans le monde actuel, mener des actions au quotidien pour limiter son impact environnemental n'est pas très gratifiant.

On entend rarement dans la rue quelqu'un dire "Haha ! J'ai moins pris l'avion que toi cette année  !" ou encore "Je t'ai battu au score des économies de CO2 !".

Parfois, trouver la motivation pour venir tous les jours à vélo à l'université n'est pas facile. Pourtant, vous êtes toutes et tous conscients de l'urgence écologique, et de la nécessité d'agir, collectivement certes, mais individuellement avant tout.

Alors comment trouver de la motivation pour mener ces actions ?

Une réponse possible est la *gamification* : l'idée de reprendre les éléments addictifs du jeu-vidéo, et de les appliquer à d'autres domaines, comme par exemple, l'écologie. Et si on marquait des points en venant à l'université à vélo, et qu'on pouvait s'en vanter sur les réseaux sociaux et devant ses amis ?

> Votre mission pour ce hackathon : créer une application *gamifiée* pour encourager ses utilisateurs à réduire leur empreinte environnementale.

Vous pouvez choisir de travailler sur un domaine en particulier, comme les transports par exemple, ou une solution d'ensemble. Voici quelques exemples de domaines spécifiques :

- Transports
- Tourisme
- Gestion des déchets
- Gestion de l'eau
- Sensibilisation
- Alimentation
- Énergie
- Biodiversité
- Numérique

Quelles sont les mécaniques de la *gamification* que vous pouvez utiliser ? Un chercheur a classifié ces mécaniques en huit sections que voici, accompagnées d'exemples :

1. Sens épique
    - Donner un sens héroique aux actions réalisées
    - Faire comprendre que l'utilisateur participe à quelque chose qui le dépasse
2. Accomplissement
    - Barres de progression
    - Badges, trophées
3. Créativité et retours de sensation
    - Personnalisation d'avatar
    - Donner la possibilité d'être créatif
4. Propriété et possession
    - Biens et argent virtuels
    - Boutique
5. Influence sociale
    - Partager sur les réseaux sociaux
    - Mécanique de compétition
    - Défis de groupe
6. Rareté et impatience
    - Mécanique de rendez-vous
    - Temps d'attente
7. Imprévisibilité et curiosité
    - Récompenses aléatoires
8. Perte et évitement
    - Perdre des points si on ne fait pas une action
    - Actions limitées dans le temps

Ces exemples égratignent à peine la surface de ce qu'il est imaginable de faire, et peuvent être combinés : par exemple, on peut combiner le 6 et le 8 en faisant perdre des points à l'utilisateur si il a oublié de faire quelque chose sur l'application à une date précise.

Si vous voulez en savoir plus ou avoir plus d'idées, vous pouvez vous rendre sur la [page wikipédia dédiée](https://en.wikipedia.org/wiki/Octalysis) ou encore sur le [site web de l'auteur de l'étude](https://yukaichou.com/gamification-examples/octalysis-complete-gamification-framework/).


## Le code de départ

Le code de départ (sur ce *repository*) est un projet créé avec *Create React App*, auquel a été ajouté un serveur d'API très simple, basé sur du JSON.

Vous êtes libres de faire un *fork* de ce projet directement sur Gitlab, ou encore de le cloner chez vous, de créer un projet vierge sur le Gitlab de l'université et de modifier l'adresse du *repository* distant chez vous. Par exemple :

```bash
git clone git@gitlab.com:lp-miaw-react/2024-hackathon-starter.git
cd 2024-hackathon-starter
git remote set-url --push origin <adresse-de-votre-repo>
```

Vous pourrez ensuite lancer le serveur de développement de Create React App comme à l'accoutumée :

```bash
npm run start
```

Votre application sera disponible à l'adresse suivante : [http://locahost:3000](http://locahost:3000).

### Le *backend*

Ce *backend* est construit autour du paquet [`json-server`](https://github.com/typicode/json-server/tree/v0), qui permet de créer une API REST complète à partir d'un simple fichier JSON, ici le fichier `db/db.json`.

Actuellement, ce fichier ne contient que deux utilisateurs d'exemple, et des données de démonstration. À vous de l'alimenter avec vos propres structures de données.

N'hésitez pas à en éplucher la [documentation](https://github.com/typicode/json-server/tree/v0) pour bien comprendre les différentes possibilités offertes par l'API.

#### Utilisation

Pour démarrer le *backend*, il suffit de taper la commande suivante dans un terminal :

```bash
npm run server
```

Vous pourrez ensuite effectuer des requêtes :

* directement depuis votre application à l'adresse `/api/<route>`
* depuis votre navigateur ou autre à l'adresse `http://locahost:8080/api/<route>`

#### Modèles de données

Pour tous les modèles de données du fichier `db/db.json`, un certain nombre de fonctionnalités sont à votre disposition par l'API.

Voici les verbes HTTP utilisables sur les modèles :

* `GET /api/<model>` : liste des éléments pour le modèle
* `POST /api/<model>` : ajout d'un élément à la liste
* `PUT /api/<model>/<id>` : modification complète d'un élément existant
* `PATCH /api/<model>/<id>` : modification partielle d'un élément existant
* `DELETE /api/<model>/<id>` : suppression d'un élément

Il existe en plus de nombreux paramètres vous permettant de modifier le résultat de votre requête. Par exemple, vous pouvez obtenir la liste des utilisateurs dont le role vaut `admin` avec la requête suivante :

`GET /api/users?role=admin`

> Astuce utile : vous pouvez récupérer des données relationelles, essayez par exemple :
> - GET /api/posts?_expand=user
> - GET /api/posts?_embed=comments

Vous pouvez découvrir le reste de ces fonctionnalités dans la [documentation de json-server](https://github.com/typicode/json-server/tree/v0).

#### Authentification

Le système d'authentification est le même que celui du [`TP4 : Gallery`](https://lpmiaw-react.napkid.dev/tp4/react-gallery-part1#lauthentification).

Il est tout à fait fonctionnel, mais n'est couplé ici à aucun système d'autorisation : toutes les actions de l'API peuvent être effectuées par n'importe quelle personne, authentifiée ou non.

Pour rappel, en voici les points de terminaison :

* `GET /api/me` : Obtenir l'utilisateur actuellement connecté
* `POST /api/login` : Se connecter
* `POST /api/logout` : Se déconnecter

Pour ajouter un utilisateur depuis l'application, il suffit de faire une requête de type `POST` sur le point de terminaison des utilisateurs `/api/users`.

#### *Upload* de fichiers

Pour vous faire gagner du temps, un système d'*upload* de fichier est intégré à ce *backend*, ce qui pourrait vous servir suivant ce que vous souhaitez implémenter.

Il fonctionne de manière similaire à celui du [`TP4 : Gallery`](https://lpmiaw-react.napkid.dev/tp4/react-gallery-part1#le-formulaire-de-t%C3%A9l%C3%A9versement).

Vous pouvez donc utiliser une fonction de téléversement de la forme suivante :

```js
const uploadForm = (maDonnee, monFichier) => {
    const formData = new FormData()
    formData.append('monChamps', maDonnee)
    formData.append('monChamps', maDonnee)
    // ...
    formData.append('monUpload', monFichier)

    return fetch('/api/<model>', {
        method: 'POST',
        body: formData,
        credentials: 'same-origin'
    })
    .then(res => {
        if(!res.ok){
            throw new Error('Upload failed !')
        }
        return res.json()
    })
}
```

Une entrée sera ajoutée à la base de données contenant tous les champs renseignés dans l'objet `formData`, et une propriété portant le nom du champs fichier dans l'objet `formData` préfixée de `Url` contenant l'URL du fichier téléversé.

