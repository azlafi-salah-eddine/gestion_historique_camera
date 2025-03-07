@extends('layouts.app')

@section('title', 'Ajouter une demande')

@section('main')
    <section class="container bg-white my-3 p-4 rounded shadow-sm">
        <h1 class="h4 font-weight-bold mb-3">Formulaire de Demande</h1>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erreur !</strong> Il y a un problème avec vos informations d'identification.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form action="{{ route('demandes.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="nom_demandeur" class="font-weight-medium">Employé :</label>
                <select id="nom_demandeur" name="Id_emp" class="form-control">
                    @foreach ($employes as $employe)
                        <option value="{{ $employe->Id_emp }}">{{ $employe->Nom_emp }} {{ $employe->Prenom_emp }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="objet" class="font-weight-medium">Objet:</label>
                <input type="text" id="objet" name="Objet" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="reference" class="font-weight-medium">Référence:</label>
                <input type="text" id="reference" name="Reff" class="form-control">
            </div>

            <div id="camera_container"></div>
            <div class="form-group mb-3">
                <button type="button" id="add_camera" class="btn btn-success">+ Ajouter une caméra</button>
            </div>

            <div class="form-group mb-3">
                <label class="font-weight-medium">Sauvegarde:</label>
                <div class="form-check form-check-inline">
                    <input type="radio" id="sauvegarde_oui" name="Sauvegarder" value="1" class="form-check-input" required>
                    <label for="sauvegarde_oui" class="form-check-label">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="sauvegarde_non" name="Sauvegarder" value="0" class="form-check-input" required>
                    <label for="sauvegarde_non" class="form-check-label">Non</label>
                </div>
            </div>

            <div class="form-group mb-3" id="but_section" style="display: none;">
                <label for="but" class="font-weight-medium">But:</label>
                <textarea id="but" name="But" class="form-control"></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="date_operation" class="font-weight-medium">Date d'opération:</label>
                <input type="datetime-local" id="date_operation" name="Date_operation" class="form-control">
            </div>
            @if (auth()->check())
                <input type="hidden" name="id_u" value="{{ auth()->user()->Id_u }}">
            @else
                <input type="hidden" name="id_u" value="">
                <p>Erreur: Utilisateur non authentifié.</p>
            @endif

            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </section>

    <script>
        function addCamera() {
            var cameraContainer = document.getElementById('camera_container');
            var cameras = {!! json_encode($cameras) !!}; // Récupération des caméras depuis le contrôleur Laravel

            var cameraDiv = document.createElement('div');
            cameraDiv.classList.add('mb-3', 'camera-section', 'd-flex', 'flex-column');

            // Ligne 1: Caméra, Début, Fin, Bouton Supp
            var row1Div = document.createElement('div');
            row1Div.classList.add('d-flex', 'align-items-center', 'mb-2');

            var cameraSelect = document.createElement('select');
            cameraSelect.id = 'nom_camera';
            cameraSelect.name = 'Id_c[]';
            cameraSelect.classList.add('form-control', 'mr-2');
            cameraSelect.required = true;

            cameras.forEach(camera => {
                if (camera.Nom_c && camera.Site) {
                    var option = document.createElement('option');
                    option.value = camera.Id_c;
                    option.textContent = `${camera.Nom_c} | ${camera.Site}`;
                    cameraSelect.appendChild(option);
                }
            });

            row1Div.appendChild(cameraSelect);

            var debutEnregistrementLabel = document.createElement('label');
            debutEnregistrementLabel.textContent = 'Début:';
            debutEnregistrementLabel.classList.add('mr-2');
            row1Div.appendChild(debutEnregistrementLabel);

            var debutEnregistrementInput = document.createElement('input');
            debutEnregistrementInput.type = 'datetime-local';
            debutEnregistrementInput.id = 'debut_enregistrement';
            debutEnregistrementInput.name = 'debut_enregistrement[]';
            debutEnregistrementInput.classList.add('form-control', 'mr-2', 'flex-grow-1');
            debutEnregistrementInput.required = true;
            row1Div.appendChild(debutEnregistrementInput);

            var finEnregistrementLabel = document.createElement('label');
            finEnregistrementLabel.textContent = 'Fin:';
            finEnregistrementLabel.classList.add('mr-2');
            row1Div.appendChild(finEnregistrementLabel);

            var finEnregistrementInput = document.createElement('input');
            finEnregistrementInput.type = 'datetime-local';
            finEnregistrementInput.id = 'fin_enregistrement';
            finEnregistrementInput.name = 'fin_enregistrement[]';
            finEnregistrementInput.classList.add('form-control', 'mr-2', 'flex-grow-1');
            finEnregistrementInput.required = true;
            row1Div.appendChild(finEnregistrementInput);

            var removeCameraButton = document.createElement('button');
            removeCameraButton.type = 'button';
            removeCameraButton.classList.add('btn', 'btn-danger', 'remove-camera');
            removeCameraButton.innerHTML = '&times;';
            removeCameraButton.addEventListener('click', function() {
                cameraDiv.remove();
            });
            row1Div.appendChild(removeCameraButton);

            cameraDiv.appendChild(row1Div);

            cameraContainer.appendChild(cameraDiv);

            // Gestion de l'affichage du champ "But"
            var sauvegardeRadios = document.querySelectorAll('.form-check-input');

            sauvegardeRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    var butSection = document.getElementById('but_section');

                    if (this.value === '1') { // Si "Oui" est sélectionné
                        butSection.style.display = 'block'; // Affiche la section "But"
                    } else {
                        butSection.style.display = 'none'; // Cache la section "But"
                    }
                });
            });
        }

        // Appel initial de la fonction pour ajouter une caméra par défaut
        addCamera();

        // Gestion du clic sur le bouton "Ajouter une caméra"
        document.getElementById('add_camera').addEventListener('click', addCamera);
    </script>
@endsection
