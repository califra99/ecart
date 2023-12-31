# E-cart

## Introduzione
Questo progetto è un'applicazione di e-commerce sviluppata utilizzando il framework Laravel, il framework CSS Tailwind, il framework JavaScript Vue.js e Inertia.js. La combinazione di queste tecnologie è stata scelta per garantire un'esperienza utente fluida, un backend robusto e una gestione efficiente dello stato dell'applicazione.

## Criticità della struttura fornita
Ci sono alcune criticità potenziali nella struttura fornita. Di seguito sono elencati alcuni punti che potrebbero causare problemi o possono essere migliorati:

1. **Nomi delle tabelle in PascalCase invece di snake_case:**
   La convenzione comune è utilizzare nomi di tabelle in snake_case. L'attuale utilizzo di PascalCase potrebbe causare confusione con le pratiche di denominazione comuni nei framework come Laravel.
     
2. **Uso di TEXT per il nome del prodotto:**
   Utilizzare il tipo di dato `TEXT` per il campo `Name` del prodotto potrebbe essere eccessivo. Ho preferito usare `VARCHAR` con una lunghezza massima appropriata.

3. **Campo `AssociatedProductIds` come TEXT:**
  Il campo `AssociatedProductIds` nella tabella dei coupon è dichiarato come `TEXT`. Ho preferito normalizzare i dati utilizzando una tabella di collegamento (coupons_products).

4. **Campo `Active` come bit(1):**
   L'uso di `bit(1)` per rappresentare un campo booleano (`Active`) può portare a complessità nella gestione dei dati. Ho trovato più chiaro utilizzare `TINYINT(1)`.

5. **Assenza di indici sugli attributi di ricerca:**
  L'assenza di indici potrebbe influire sulle prestazioni delle query. In questo esempio, non effettuando quasi mai delle query di ricerca non ho inserito molti indici, però sarebbe vantaggioso aggiungerne sui campi coinvolti nelle query.

## Scelte delle tecnologie

### Laravel
Ho scelto Laravel come framework backend per la sua sintassi espressiva, la facilità di sviluppo, il supporto integrato per l'ORM Eloquent e la gestione semplificata delle route. La sua comunità attiva e le numerose librerie disponibili lo rendono una scelta solida per sviluppare applicazioni web complesse. Non essendo stata richiesta tutta la parte della gestione dell'utente e delle sessioni, ho usato lo starter kit Laravel Breeze. Il suo utilizzo offre un punto di partenza solido per la gestione delle sessioni e dell'autenticazione, accelerando lo sviluppo di funzionalità legate agli utenti.

### Tailwind CSS
Ho utilizzato Tailwind per la sua metodologia "utility-first" che facilita la creazione di interfacce utente personalizzate con facilità. Inoltre, la sua configurazione facile e flessibile si adatta bene al processo di sviluppo.

### Vue.js e Inertia.js
Ho utilizzato Vue.js per la gestione dinamica delle interfacce utente e per creare componenti riutilizzabili. Ho integrato Inertia.js per semplificare il passaggio dei dati tra il frontend e il backend, migliorando l'esperienza di sviluppo e la performance dell'applicazione.

## Deploy della soluzione

### Infrastruttura/Hosting

Per il deploy della soluzione, consiglio l'utilizzo di una piattaforma cloud come Microsoft Azure o AWS. Le seguenti sono opzioni consigliate per l'infrastruttura:

- **Sito**: Utilizzare Azure App Service o AWS S3 per il deployment.
- **Database**: Utilizzare un servizio gestito come Azure Database for MySQL o Amazon RDS per la gestione del database MySQL.

## Pipeline CI/CD

### CI (Continuous Integration)

Per la CI, consiglio l'utilizzo di servizi come GitHub Actions. La pipeline di CI dovrebbe includere le seguenti fasi:

1. **Build**: Compilazione del frontend e del backend.
2. **Test Unitari e di Integrazione**: Esecuzione di test automatici per garantire la stabilità del sistema.
3. **Analisi Statica del Codice**: Utilizzo di strumenti come PHPStan per il backend e ESLint per il frontend.
4. **Controllo della Qualità del Codice**: Verifica della conformità alle linee guida del codice.

### CD (Continuous Deployment)

Per la CD, consiglio l'utilizzo di uno strumento come Laravel Envoyer o Azure DevOps. La pipeline di CD dovrebbe comprendere i seguenti passaggi:

1. **Deployment su Ambiente di Test**: Distribuzione automatica su un ambiente di test per ulteriori verifiche.
2. **Deployment su Ambiente di Produzione**: Se i test sono superati con successo, distribuzione automatica sull'ambiente di produzione.

## Configurazione Locale

1. Clonare il repository.
2. Installare le dipendenze del frontend: `npm install`.
3. Installare le dipendenze del backend: `composer install`.
4. Creare un file di ambiente: `.env` e configurare le variabili (per comodità, ho copiato il mio file .env su .env.example, così potete prendere le variabili da lì ).
5. Eseguire le migrazioni del database e popolarlo con dati fake: `php artisan migrate --seed`.
6. Avviare il server: `php artisan serve`.
7. Avviare il frontend: `npm run dev` o `npm run build`.

## Conclusioni
Questo progetto offre una solida base per lo sviluppo di un'applicazione di e-commerce scalabile e performante. La scelta di tecnologie moderne e la configurazione per il deploy su una piattaforma cloud contribuiranno a garantire una gestione efficiente e sicura dell'applicazione. La pipeline CI/CD automatizzata assicura una distribuzione continua e affidabile delle nuove funzionalità.
