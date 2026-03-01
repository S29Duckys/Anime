@extends('layouts.app')

@section('title', 'Conditions Générales d\'Utilisation — TryAnime')

@push('styles')
    @vite(['resources/css/pages/cgu.css'])
@endpush

@section('content')
<div class="cgu-wrapper">

    <div class="cgu-header">
        <h1>Conditions Générales d'Utilisation</h1>
        <p class="cgu-subtitle">Dernière mise à jour : 1er mars 2026</p>
        <p class="cgu-intro">
            Bienvenue sur <strong>TryAnime</strong>. En accédant à notre plateforme ou en créant un compte,
            vous acceptez sans réserve les présentes Conditions Générales d'Utilisation (CGU).
            Veuillez les lire attentivement avant toute utilisation du service.
        </p>
    </div>

    <div class="cgu-body">

        <aside class="cgu-nav">
            <p class="cgu-nav-title">Sommaire</p>
            <ol>
                <li><a href="#article-1">Présentation du service</a></li>
                <li><a href="#article-2">Accès au service</a></li>
                <li><a href="#article-3">Création de compte</a></li>
                <li><a href="#article-4">Règles d'utilisation</a></li>
                <li><a href="#article-5">Propriété intellectuelle</a></li>
                <li><a href="#article-6">Données personnelles</a></li>
                <li><a href="#article-7">Responsabilité</a></li>
                <li><a href="#article-8">Suspension et résiliation</a></li>
                <li><a href="#article-9">Modifications des CGU</a></li>
                <li><a href="#article-10">Contact</a></li>
            </ol>
        </aside>

    <div class="cgu-content">

        <article id="article-1">
            <h2><span class="art-num">01</span> Présentation du service</h2>
            <p>
                TryAnime est une plateforme de streaming et de gestion de contenu animé (anime) accessible via le site web
                <strong>tryanime.fr</strong>. Elle permet aux utilisateurs de :
            </p>
            <ul>
                <li>Consulter un catalogue d'animes classés par genre, saison et popularité.</li>
                <li>Créer et gérer une liste personnelle d'animes (watchlist).</li>
                <li>Accéder aux tendances hebdomadaires et aux nouvelles sorties.</li>
                <li>Interagir avec la communauté via des fonctionnalités sociales.</li>
            </ul>
            <p>
                TryAnime est un projet à vocation personnelle et éducative. Il n'est pas affilié à des studios d'animation
                ou à des diffuseurs officiels. Aucun contenu protégé ne sera hébergé directement sur nos serveurs sans
                accord préalable des ayants droit.
            </p>
        </article>

        <article id="article-2">
            <h2><span class="art-num">02</span> Accès au service</h2>
            <p>
                L'accès à TryAnime est réservé aux personnes âgées d'au moins <strong>13 ans</strong>.
                Les mineurs de moins de 18 ans doivent bénéficier de l'autorisation de leurs parents ou tuteurs légaux
                pour utiliser le service.
            </p>
            <p>
                Certaines fonctionnalités (watchlist, notation, commentaires) nécessitent la création d'un compte.
                La consultation du catalogue peut être possible sans inscription, selon les paramètres de la plateforme.
            </p>
            <p>
                TryAnime se réserve le droit de restreindre ou de suspendre l'accès au service à tout moment,
                notamment pour des raisons de maintenance, de sécurité ou de mise à jour.
            </p>
        </article>

        <article id="article-3">
            <h2><span class="art-num">03</span> Création de compte</h2>
            <p>
                Pour créer un compte sur TryAnime, l'utilisateur doit fournir les informations suivantes :
            </p>
            <ul>
                <li>Un <strong>pseudonyme</strong> unique (visible par la communauté).</li>
                <li>Un <strong>prénom</strong> et un <strong>nom</strong> (utilisés uniquement à des fins d'identification interne).</li>
                <li>Une <strong>adresse e-mail</strong> valide.</li>
                <li>Un <strong>mot de passe</strong> sécurisé d'au moins 8 caractères.</li>
            </ul>
            <p>
                L'utilisateur s'engage à fournir des informations exactes, complètes et à jour.
                Tout compte créé avec de fausses informations pourra être supprimé sans préavis.
            </p>
            <p>
                L'utilisateur est seul responsable de la confidentialité de ses identifiants de connexion.
                Toute activité réalisée depuis son compte lui est imputable. En cas de compromission de son compte,
                il doit en informer immédiatement TryAnime via les coordonnées de contact disponibles en bas de page.
            </p>
            <div class="cgu-note">
                <strong>Note :</strong> Les mots de passe sont stockés de manière chiffrée (bcrypt) et ne sont jamais lisibles,
                même par les administrateurs de la plateforme.
            </div>
        </article>

        <article id="article-4">
            <h2><span class="art-num">04</span> Règles d'utilisation</h2>
            <p>En utilisant TryAnime, vous vous engagez à respecter les règles suivantes :</p>
            <h3>Ce qui est autorisé</h3>
            <ul>
                <li>Consulter le catalogue et les fiches d'animes.</li>
                <li>Ajouter des animes à votre liste personnelle.</li>
                <li>Partager vos recommandations et avis de manière respectueuse.</li>
                <li>Signaler tout contenu inapproprié ou bug via les canaux prévus.</li>
            </ul>
            <h3>Ce qui est interdit</h3>
            <ul>
                <li>Créer plusieurs comptes pour contourner une suspension.</li>
                <li>Usurper l'identité d'un autre utilisateur ou d'un membre de l'équipe TryAnime.</li>
                <li>Publier des contenus à caractère haineux, discriminatoire, pornographique ou illégal.</li>
                <li>Utiliser des robots, scripts ou tout système automatisé pour scraper ou abuser du service.</li>
                <li>Tenter de pirater, compromettre ou déstabiliser l'infrastructure technique de TryAnime.</li>
                <li>Partager, redistribuer ou revendre tout contenu issu de la plateforme sans autorisation.</li>
            </ul>
            <p>
                Tout manquement à ces règles peut entraîner la suspension ou la suppression définitive du compte,
                sans remboursement ni préavis.
            </p>
        </article>

        <article id="article-5">
            <h2><span class="art-num">05</span> Propriété intellectuelle</h2>
            <p>
                L'ensemble des éléments constituant TryAnime (logo, design, code source, textes, interface)
                est la propriété exclusive de TryAnime et est protégé par les lois françaises et internationales
                relatives à la propriété intellectuelle.
            </p>
            <p>
                Les noms, visuels, personnages et œuvres d'animes présents sur la plateforme restent la propriété
                de leurs auteurs et studios respectifs. TryAnime ne revendique aucun droit sur ces contenus tiers.
            </p>
            <p>
                Toute reproduction, copie, distribution ou utilisation commerciale des éléments de TryAnime
                sans autorisation écrite préalable est strictement interdite.
            </p>
        </article>

        <article id="article-6">
            <h2><span class="art-num">06</span> Données personnelles</h2>
            <p>
                TryAnime collecte et traite des données personnelles dans le respect du
                <strong>Règlement Général sur la Protection des Données (RGPD)</strong> et de la loi Informatique et Libertés.
            </p>
            <h3>Données collectées</h3>
            <ul>
                <li>Informations d'inscription : pseudonyme, prénom, nom, e-mail, mot de passe chiffré.</li>
                <li>Données d'utilisation : animes consultés, watchlist, notes et avis.</li>
                <li>Données techniques : adresse IP, type de navigateur, horodatage des connexions.</li>
            </ul>
            <h3>Finalités du traitement</h3>
            <ul>
                <li>Gestion des comptes utilisateurs et authentification.</li>
                <li>Personnalisation de l'expérience (recommandations, historique).</li>
                <li>Sécurité et prévention des abus.</li>
                <li>Amélioration du service via des statistiques anonymisées.</li>
            </ul>
            <h3>Vos droits</h3>
            <p>
                Conformément au RGPD, vous disposez des droits suivants : accès, rectification, suppression,
                portabilité et opposition au traitement de vos données. Pour exercer ces droits, contactez-nous
                à l'adresse indiquée en section 10.
            </p>
            <div class="cgu-note">
                TryAnime ne vend ni ne loue vos données personnelles à des tiers. Elles ne sont pas utilisées
                à des fins publicitaires sans votre consentement explicite.
            </div>
        </article>

        <article id="article-7">
            <h2><span class="art-num">07</span> Responsabilité</h2>
            <p>
                TryAnime met tout en œuvre pour assurer la disponibilité et la fiabilité du service,
                mais ne peut garantir un accès ininterrompu à la plateforme.
            </p>
            <p>TryAnime décline toute responsabilité en cas de :</p>
            <ul>
                <li>Interruption du service due à des opérations de maintenance ou à des incidents techniques.</li>
                <li>Perte de données résultant d'une défaillance technique indépendante de notre volonté.</li>
                <li>Dommages directs ou indirects liés à l'utilisation ou à l'impossibilité d'utiliser le service.</li>
                <li>Contenus publiés par des utilisateurs qui enfreindraient les présentes CGU.</li>
            </ul>
            <p>
                L'utilisateur utilise le service sous sa propre responsabilité. TryAnime n'est pas responsable
                des liens externes vers lesquels la plateforme pourrait rediriger.
            </p>
        </article>

        <article id="article-8">
            <h2><span class="art-num">08</span> Suspension et résiliation</h2>
            <p>
                TryAnime se réserve le droit de suspendre ou résilier tout compte utilisateur,
                à tout moment et sans préavis, dans les cas suivants :
            </p>
            <ul>
                <li>Non-respect des présentes CGU.</li>
                <li>Comportement frauduleux ou abusif.</li>
                <li>Fourniture d'informations fausses lors de l'inscription.</li>
                <li>Inactivité prolongée du compte (plus de 24 mois).</li>
                <li>Demande expresse de l'utilisateur (suppression du compte).</li>
            </ul>
            <p>
                L'utilisateur peut à tout moment demander la suppression de son compte en se rendant dans
                ses paramètres ou en contactant l'équipe TryAnime. La suppression entraîne l'effacement
                irréversible de toutes les données associées au compte dans un délai de 30 jours.
            </p>
        </article>

        <article id="article-9">
            <h2><span class="art-num">09</span> Modifications des CGU</h2>
            <p>
                TryAnime se réserve le droit de modifier les présentes CGU à tout moment.
                Les utilisateurs seront informés de toute modification significative par e-mail ou
                via une notification sur la plateforme.
            </p>
            <p>
                La poursuite de l'utilisation du service après notification des modifications vaut acceptation
                des nouvelles CGU. Si l'utilisateur n'accepte pas les nouvelles conditions, il doit cesser
                d'utiliser le service et supprimer son compte.
            </p>
            <p>
                Les CGU en vigueur sont toujours consultables sur cette page avec leur date de dernière mise à jour.
            </p>
        </article>

        <article id="article-10">
            <h2><span class="art-num">10</span> Contact</h2>
            <p>
                Pour toute question relative aux présentes CGU, à votre compte ou à l'utilisation de vos données personnelles,
                vous pouvez nous contacter :
            </p>
            <ul>
                <li><strong>E-mail :</strong> contact@tryanime.fr</li>
                <li><strong>Via le site :</strong> <a href="#">Formulaire de contact</a></li>
            </ul>
            <p>
                Nous nous engageons à répondre à toute demande dans un délai de <strong>7 jours ouvrés</strong>.
            </p>
        </article>

    </div>

    </div>{{-- fin .cgu-body --}}

    <div class="cgu-footer-note">
        <p>En utilisant TryAnime, vous confirmez avoir lu, compris et accepté l'intégralité des présentes Conditions Générales d'Utilisation.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Retour à l'accueil</a>
    </div>

</div>
@endsection
