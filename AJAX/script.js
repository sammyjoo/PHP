function formatMontant(m) {
    // L'objet 'Intl.NumberFormat' est un constructeur(fonction) permettant de créer des objets pour formater des nombres
        let intLn = new Intl.NumberFormat();
        return intLn.format(m);
    }
    
    //------------- Récupération des données de cours de Bitcoin -------------//
    function getCours() {
    
        // L'objet XMLHttpRequest définit le type d'appel et de données à envoyer, détecte les différentes étapes de l'appel et reçoit la réponse du serveur
        let ajax = new XMLHttpRequest();
    
        console.log("ReadyState après new: " + ajax.readyState);
    
        // Détection de l'avancement de l'appel AJAX
        ajax.onreadystatechange = function() {
    
            console.log("ReadyState a changé et vaut: " + ajax.readyState);
    
        }
        /*
            L'objet possède trois propriétés renseignées au fur et à mesure de l'avancement de la requête
                - readyState est un entier entre 0 et 4 qui indique l'avancement de la requête
                    -- 0: Objet 'ajax' non initialisé
                    -- 1: Objet 'ajax' initialisé avec la fonction open()
                    -- 2: En-têtes de réponses disponibles
                    -- 3: Données reçues mais accessibles EN PARTIE
                    -- 4: Données COMPLETEMENT accessibles dans la propriété 'response'
    
                - response est le contenu de la réponse envoyée par le serveur
                - status est le code retour du serveur à l'issue de la requête
        */
    
        ajax.onload = function() {
            console.log("Appel AJAX terminé");
            console.log("Status: " + this.status);
            console.log("Response: " + this.response);
    
            if(this.status == 200) {
    
                let json = JSON.parse(this.response);
                let eur = formatMontant(json.EUR);
                let dt = new Date();
                document.getElementById('cours').innerHTML = eur + " &euro;";
                document.getElementById('horo').innerHTML = "Maj " + dt.toLocaleString();
    
            }
        }
    
        // La fonction ontimeout est exécutée quand le délai accordé pour finaliser la requête est expirée
        ajax.ontimeout = function() {
            console.log("Le service n'a pas répondu à temps: nouvel essai dans 5sec");
            setTimeout("getCours()", 5000);
        }
    
    
        /*
            Ici, l'appel AJAX vers l'API de récupération se fait en mode GET et via l'URL
            RAPPEL: une API (Application Programming Interface) permet de connecter un service ou un logiciel à un autre service ou logiciel afin d'échanger des données ou des fonctionnalités
        */
        let url = "https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=EUR";
        ajax.open("GET", url, true);
        ajax.send();
    
        /*
            Un objet 'ajax' de type XMLJHttpRequest démarre une requête AJAX avec la méthode open(). Trois paramètres viennent s'ajouter à la méthode: 
                - "GET",
                - la variable URL, c'est-à-dire l'adresse web à appeler
                - un BOOLEAN asynchrone
        */
    }
    
    window.onload = function() {
        getCours();
        setInterval("getCours()", 100); 
    }
    // La fonction 'setInterval()' retourne un objet pointant sur le minuteur créé. Elle déclenche une fonction à chaque intervalle de temps exprimée en millisecondes
    