<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PCL CONNEXION</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>

    <style>
        body {
            background: linear-gradient(45deg, #4a56e2, #13b4c9);
            background-size: 0% 400%;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: gradientAnimation 60s ease infinite;
        }

        .animated-logo {
            position: absolute;
            top: 35%;  
            left: 50%;
            transform: translate(-50%, -30%);  
            width: 50%;  
            height: auto;
            object-fit: cover;
            z-index: -1;
            animation: logoAnimation 5s infinite alternate;
            filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.5));
        }

        @keyframes logoAnimation {
            0% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
            50% { transform: translate(-50%, -50%) scale(1.1); opacity: 0.8; }
            100% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .form-container {
            background: rgba(255, 255, 255, 0.1);  
            backdrop-filter: blur(5px);
            padding: 40px;
            width: 100%;
            max-width: 600px;  /* Augmenter la largeur maximale du formulaire */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        input[type="text"], input[type="email"], input[type="password"], select {
            background: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, select:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 86, 226, 0.5);
            transform: scale(1.02);
        }

        button[type="submit"] {
            background: linear-gradient(45deg, #4a56e2, #13b4c9);
            border: none;
            border-radius: 10px;
            color: white;
            padding: 12px 20px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        button[type="submit"]:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <!-- Image animée en arrière-plan -->
    <img src="{{ asset('images/Gabon1.jpeg') }}" alt="Logo du Trésor Public" class="animated-logo">

    <!-- Formulaire statique au premier plan -->
    <section class="form-container">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                Connexion
            </div>
            <div class="w-full rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Connectez-vous à votre compte
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="post" action="#">
                        @csrf
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Erreur!</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li><span class="block sm:inline">{{ $error }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Nom d'utilisateur -->
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Nom d'utilisateur</label>
                            <input type="text" name="username" id="username" class="text-gray-900 sm:text-sm block w-full" placeholder="Entrez votre nom d'utilisateur" required>
                        </div>

                        <!-- Identifiant -->
                        <div>
                            <label for="userId" class="block mb-2 text-sm font-medium text-gray-900">Identifiant</label>
                            <input type="text" name="userId" id="userId" class="text-gray-900 sm:text-sm block w-full" placeholder="Entrez votre identifiant" required>
                        </div>

                        <!-- Mot de passe -->
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Mot de passe</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="text-gray-900 sm:text-sm block w-full" required>
                        </div>

                        <!-- Profil utilisateur -->
                        <div>
                            <label for="userProfile" class="block mb-2 text-sm font-medium text-gray-900">Profil utilisateur</label>
                            <select name="userProfile" id="userProfile" class="text-gray-900 sm:text-sm block w-full" required>
                                <option value="" disabled selected>Choisissez votre profil</option>
                                <option value="admin">Administrateur</option>
                                <option value="user">Utilisateur</option>
                                <option value="guest">Invité</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-center">
                            <a href="#" class="text-sm font-medium text-primary-600 hover:underline">Mot de passe oublié?</a>
                        </div>
                        <button type="submit" class="flex w-full justify-center text-sm font-semibold leading-6">Se connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
