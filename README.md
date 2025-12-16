# CoachPro - Plateforme de Coaching Sportif

Une plateforme web moderne de mise en relation entre sportifs et coachs professionnels, développée en HTML, CSS et JavaScript natif.

## 📋 Table des Matières

- [Aperçu du Projet](#aperçu-du-projet)
- [Structure du Projet](#structure-du-projet)
- [Fonctionnalités](#fonctionnalités)
- [Technologies Utilisées](#technologies-utilisées)
- [Installation](#installation)
- [Pages Disponibles](#pages-disponibles)
- [Architecture CSS](#architecture-css)
- [JavaScript Utilities](#javascript-utilities)
- [Sécurité](#sécurité)
- [Personnalisation](#personnalisation)

## 🎯 Aperçu du Projet

CoachPro est une plateforme complète permettant aux sportifs de trouver et réserver des séances avec des coachs professionnels certifiés dans diverses disciplines sportives (Football, Tennis, Natation, Athlétisme, Sports de Combat, Préparation Physique).

### Caractéristiques Principales

- ✅ Design moderne et responsive
- ✅ Validation de formulaires avec Regex
- ✅ Système d'alertes SweetAlert-like
- ✅ Notifications Toast
- ✅ Modals dynamiques
- ✅ Gestion de sessions utilisateur
- ✅ Filtres et recherche en temps réel
- ✅ Interface multi-rôles (Sportif/Coach)

## 📁 Structure du Projet

```
coachpro/
├── css/
│   ├── variables.css       # Variables CSS (couleurs, espacements, etc.)
│   ├── global.css          # Styles globaux et reset
│   ├── header-footer.css   # Header et footer
│   ├── components.css      # Modals, alertes, toasts
│   ├── auth.css           # Pages d'authentification
│   ├── home.css           # Page d'accueil
│   ├── coaches.css        # Liste des coachs
│   └── dashboard.css      # Tableaux de bord
│
├── js/
│   ├── utils.js           # Utilities (validation, modals, alertes)
│   ├── navigation.js      # Navigation et session
│   ├── auth.js            # Authentification
│   ├── coaches.js         # Liste et filtres des coachs
│   └── dashboard.js       # Fonctionnalités dashboard
│
└── pages/
    ├── index.html         # Page d'accueil
    ├── login.html         # Connexion
    ├── register.html      # Inscription
    ├── coaches.html       # Liste des coachs
    └── sportif-dashboard.html  # Dashboard sportif
```

## ⚡ Fonctionnalités

### Pour les Sportifs

- ✅ Parcourir les profils des coachs
- ✅ Filtrer par discipline, expérience, prix
- ✅ Réserver des séances en ligne
- ✅ Gérer les réservations
- ✅ Consulter l'historique
- ✅ Laisser des avis
- ✅ Suivre la progression

### Pour les Coachs

- ✅ Gérer son profil professionnel
- ✅ Définir ses disponibilités
- ✅ Accepter/Refuser les réservations
- ✅ Consulter les statistiques
- ✅ Gérer les certifications

## 🛠️ Technologies Utilisées

- **HTML5** - Structure sémantique
- **CSS3** - Styles modernes avec variables CSS
- **JavaScript ES6+** - Code natif, pas de frameworks
- **Font imports** - Google Fonts (Bebas Neue, Montserrat, Inter)

## 🚀 Installation

1. **Télécharger le projet**
   ```bash
   # Extraire les fichiers dans un dossier
   ```

2. **Ouvrir avec un serveur local**
   
   **Option 1 : Live Server (VS Code)**
   - Installer l'extension "Live Server"
   - Clic droit sur `index.html` → "Open with Live Server"
   
   **Option 2 : Python**
   ```bash
   cd coachpro
   python -m http.server 8000
   # Ouvrir http://localhost:8000
   ```
   
   **Option 3 : Node.js**
   ```bash
   npx http-server coachpro -p 8000
   ```

3. **Ouvrir dans le navigateur**
   - Naviguer vers `pages/index.html`

## 📄 Pages Disponibles

### 1. Page d'Accueil (`index.html`)
- Hero section avec statistiques
- Liste des disciplines sportives
- Section "Comment ça marche"
- Fonctionnalités de la plateforme
- Call-to-action

### 2. Connexion (`login.html`)
- Formulaire de connexion
- Validation en temps réel
- Options "Se souvenir de moi"
- Connexion sociale (Google, Facebook)
- Lien vers inscription

### 3. Inscription (`register.html`)
- Sélection du rôle (Sportif/Coach)
- Formulaire avec validation Regex
- Champs conditionnels pour les coachs
- Confirmation de mot de passe
- Acceptation des conditions

### 4. Liste des Coachs (`coaches.html`)
- Recherche par nom/discipline
- Filtres multiples (discipline, expérience, prix)
- Tri personnalisable
- Cartes de profil des coachs
- Pagination

### 5. Dashboard Sportif (`sportif-dashboard.html`)
- Statistiques personnelles
- Prochaines séances
- Coachs favoris
- Activité récente
- Actions rapides

## 🎨 Architecture CSS

### Variables CSS (`variables.css`)
Toutes les valeurs de design sont centralisées :

```css
--primary-color: #FF6B35;
--secondary-color: #004E89;
--accent-color: #F7B801;
--font-display: 'Bebas Neue';
--font-heading: 'Montserrat';
--font-body: 'Inter';
--spacing-sm: 1rem;
--radius-md: 0.5rem;
--shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
```

### Structure des Styles

1. **Reset & Base** (`global.css`)
   - Reset CSS
   - Typographie de base
   - Classes utilitaires
   - Animations

2. **Composants** (`components.css`)
   - Boutons
   - Cartes
   - Formulaires
   - Modals
   - Alertes
   - Toasts

3. **Layout** (`header-footer.css`)
   - Header sticky
   - Navigation responsive
   - Footer

## 🔧 JavaScript Utilities

### 1. Validation (`utils.js`)

```javascript
// Validation d'un champ
const result = Validator.validateField(input);

// Validation de formulaire complet
const isValid = Validator.validateForm(form);

// Configuration de validation en temps réel
Validator.setupRealtimeValidation(form);
```

**Regex Patterns Disponibles:**
- `email` - Email valide
- `phone` - Téléphone marocain (ex: 0612345678)
- `password` - Min 8 caractères, majuscule, minuscule, chiffre, spécial
- `name` - Nom valide (2-50 caractères)
- `url` - URL valide

### 2. Modals (`utils.js`)

```javascript
// Ouvrir une modal
Modal.open('modalId');

// Fermer une modal
Modal.close('modalId');

// Fermer toutes les modals
Modal.closeAll();
```

### 3. Alertes (`utils.js`)

```javascript
// Alerte de succès
Alert.success('Titre', 'Message', callbackFn);

// Alerte d'erreur
Alert.error('Titre', 'Message');

// Alerte de confirmation
Alert.confirm('Titre', 'Message', onConfirm, onCancel);

// Alerte personnalisée
Alert.show({
    type: 'success',
    title: 'Opération réussie',
    message: 'Votre action a été effectuée',
    confirmText: 'OK',
    cancelText: 'Annuler',
    showCancel: true,
    onConfirm: () => {},
    onCancel: () => {}
});
```

### 4. Toasts (`utils.js`)

```javascript
// Toast de succès
Toast.success('Titre', 'Message', 3000);

// Toast d'erreur
Toast.error('Titre', 'Message');

// Toast personnalisé
Toast.show({
    type: 'info',
    title: 'Information',
    message: 'Votre message',
    duration: 3000
});
```

### 5. Gestion de Session (`navigation.js`)

```javascript
// Vérifier si connecté
UserSession.isLoggedIn();

// Obtenir l'utilisateur actuel
const user = UserSession.getUser();

// Connexion
UserSession.login(userData);

// Déconnexion
UserSession.logout();
```

## 🔒 Sécurité

### Mesures Implémentées

1. **Validation Côté Client**
   - Regex pour tous les champs sensibles
   - Validation en temps réel
   - Messages d'erreur clairs

2. **Protection XSS**
   - Les données utilisateur doivent être échappées côté serveur
   - Ne jamais utiliser `innerHTML` avec des données utilisateur non filtrées

3. **Mots de Passe**
   - Validation forte (8+ caractères, majuscules, minuscules, chiffres, spéciaux)
   - Confirmation de mot de passe
   - Type password masqué par défaut

4. **Sessions**
   - Stockage en localStorage (à remplacer par cookies HTTPOnly en production)
   - Expiration de session à implémenter côté serveur

### ⚠️ Important pour la Production

```javascript
// À IMPLÉMENTER CÔTÉ SERVEUR :
// 1. Hashage des mots de passe (bcrypt, Argon2)
// 2. Protection CSRF avec tokens
// 3. Requêtes préparées (SQL)
// 4. Validation serveur (ne jamais faire confiance au client)
// 5. HTTPS obligatoire
// 6. Rate limiting
// 7. Logs de sécurité
```

## 🎨 Personnalisation

### Changer les Couleurs

Modifier `css/variables.css`:

```css
:root {
    --primary-color: #VOTRE_COULEUR;
    --secondary-color: #VOTRE_COULEUR;
    --accent-color: #VOTRE_COULEUR;
}
```

### Changer les Polices

Dans `css/variables.css`:

```css
--font-display: 'Votre Police';
--font-heading: 'Votre Police';
--font-body: 'Votre Police';
```

Et importer dans `css/variables.css`:

```css
@import url('https://fonts.googleapis.com/css2?family=Votre+Police&display=swap');
```

### Ajouter une Page

1. Créer `nouvelle-page.html` dans `/pages`
2. Copier la structure d'une page existante
3. Ajouter les liens CSS nécessaires
4. Ajouter le lien dans la navigation
5. Créer le CSS spécifique si nécessaire

## 📱 Responsive Design

Le site est entièrement responsive avec des breakpoints:

- **Desktop**: > 1024px
- **Tablet**: 768px - 1024px
- **Mobile**: < 768px

### Media Queries

```css
@media (max-width: 1024px) { /* Tablette */ }
@media (max-width: 768px) { /* Mobile */ }
@media (max-width: 480px) { /* Petit mobile */ }
```

## 🐛 Debugging

### Console JavaScript

```javascript
// Activer le mode debug
localStorage.setItem('debug', 'true');

// Vérifier la session
console.log(UserSession.getUser());

// Tester la validation
console.log(Validator.validateField(input));
```

## 📝 Notes pour le Backend

### Endpoints API à Créer

```javascript
// Authentification
POST /api/auth/login
POST /api/auth/register
POST /api/auth/logout
POST /api/auth/refresh

// Utilisateurs
GET /api/users/profile
PUT /api/users/profile
GET /api/users/{id}

// Coachs
GET /api/coaches
GET /api/coaches/{id}
GET /api/coaches?discipline=football&experience=5-10

// Réservations
POST /api/reservations
GET /api/reservations
PUT /api/reservations/{id}
DELETE /api/reservations/{id}

// Avis
POST /api/reviews
GET /api/reviews/{coachId}
```

## 🤝 Contribuer

Pour contribuer au projet :

1. Forker le repository
2. Créer une branche (`git checkout -b feature/amelioration`)
3. Commiter les changements (`git commit -m 'Ajout fonctionnalité'`)
4. Pousser vers la branche (`git push origin feature/amelioration`)
5. Créer une Pull Request

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier LICENSE pour plus de détails.

## 👨‍💻 Support

Pour toute question ou problème :
- Email: contact@coachpro.ma
- GitHub Issues: [Créer une issue](#)

## 🎯 Prochaines Fonctionnalités

- [ ] Dashboard Coach complet
- [ ] Système de calendrier interactif
- [ ] Messagerie instantanée
- [ ] Paiement en ligne
- [ ] Application mobile
- [ ] Notifications push
- [ ] Export PDF des rapports
- [ ] Système de points/fidélité

---

**Version**: 1.0.0  
**Dernière mise à jour**: Décembre 2024  
**Auteur**: CoachPro Team